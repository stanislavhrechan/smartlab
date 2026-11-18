<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReservationRequest extends Model
{
    protected $fillable = [
        'room_key',
        'room_name',
        'name',
        'email',
        'phone',
        'organization',
        'attendees',
        'starts_at',
        'ends_at',
        'purpose',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'attendees' => 'integer',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }
}
