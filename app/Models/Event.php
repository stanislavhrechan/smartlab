<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'slug', 'short_description', 'full_description',
        'start_date', 'start_time', 'end_date', 'end_time', 'location',
        'map_link', 'organizer', 'target_group', 'format', 'partner',
        'categories', 'image',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'categories' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
