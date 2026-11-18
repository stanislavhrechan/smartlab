<?php

namespace App\Http\Controllers\Network;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Partner;

class OnboardingController extends Controller
{
    public function index()
    {
        return view('onboarding.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'logo'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'website_url' => ['nullable', 'url', 'max:255'],
        ]);

        $logoPath = null;
        $user = auth()->user();
        try {
            if($request->hasFile('logo'))
            {
                $logoPath = $request->file('logo')->store('partners', 'public');
            }
            $partner = DB::transaction(function () use ($validated, $logoPath, $user) {
                return Partner::create([
                    'user_id'     => $user->id,
                    'name'        => $validated['name'],
                    'slug'        => Str::slug($validated['name']),
                    'description' => $validated['description'] ?? null,
                    'logo'        => $logoPath,
                    'website_url' => $validated['website_url'] ?? null,
                    'is_active'   => true,
                    'sort_order'  => 0,
                ]);
            });
            $user->utype = 'PARTNER';
            $user->save();
            return response()->json([
            'success'  => true,
            'message'  => 'Partner bol úspešne vytvorený.',
            'redirect' => route('dashboard.partner'),
        ]);
        } catch (\Throwable $e) {

            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }

            report($e);

            return response()->json([
                'message' => 'Niečo sa pokazilo. Skúste to, prosím, znova.',
            ], 500);
        }
    }
}
