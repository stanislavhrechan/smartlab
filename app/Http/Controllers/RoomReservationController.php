<?php

namespace App\Http\Controllers;

use App\Models\RoomReservationRequest;
use Carbon\CarbonImmutable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RoomReservationController extends Controller
{
    public function create(): View
    {
        return view('pages.reservations', [
            'roomFloors' => config('smartlab.room_floors'),
        ]);
    }

    public function availability(Request $request): JsonResponse
    {
        $rooms = $this->rooms();
        $data = $request->validate([
            'room' => ['required', Rule::in(array_keys($rooms))],
            'date' => ['required', 'date', 'after_or_equal:today'],
        ]);

        $weekday = CarbonImmutable::parse($data['date'])->dayOfWeekIso;
        $reservedTimes = config("smartlab.availability_demo.{$data['room']}.{$weekday}", []);
        $slots = [];

        for ($hour = 9; $hour < 17; $hour++) {
            $start = sprintf('%02d:00', $hour);
            $end = sprintf('%02d:00', $hour + 1);
            $occupied = false;

            foreach ($reservedTimes as $reservedTime) {
                if ($reservedTime['start'] < $end && $reservedTime['end'] > $start) {
                    $occupied = true;
                    break;
                }
            }

            $slots[] = [
                'start' => $start,
                'end' => $end,
                'status' => $occupied ? 'occupied' : 'free',
            ];
        }

        return response()->json([
            'room' => $data['room'],
            'date' => $data['date'],
            'demo' => true,
            'slots' => $slots,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $rooms = $this->rooms();

        $data = $request->validate([
            'room' => ['required', Rule::in(array_keys($rooms))],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:160'],
            'attendees' => ['required', 'integer', 'min:1', 'max:100'],
            'purpose' => ['nullable', 'string', 'max:5000'],
        ]);

        $room = $rooms[$data['room']];
        if ($room['capacity'] !== null && $data['attendees'] > $room['capacity']) {
            return back()
                ->withInput()
                ->withErrors([
                    'attendees' => "Táto miestnosť má kapacitu {$room['capacity']} osôb.",
                ]);
        }

        $startsAt = CarbonImmutable::parse(
            "{$data['date']} {$data['start_time']}",
            config('app.timezone')
        );
        $endsAt = CarbonImmutable::parse(
            "{$data['date']} {$data['end_time']}",
            config('app.timezone')
        );

        RoomReservationRequest::create([
            'room_key' => $data['room'],
            'room_name' => $room['name'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'organization' => $data['organization'] ?? null,
            'attendees' => $data['attendees'],
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'purpose' => $data['purpose'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('reservations.create')
            ->with('status', 'Vaša žiadosť bola odoslaná a čaká na potvrdenie tímom SmartLab.');
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function rooms(): array
    {
        return collect(config('smartlab.room_floors'))
            ->flatMap(fn (array $floor): array => $floor['rooms'])
            ->all();
    }
}
