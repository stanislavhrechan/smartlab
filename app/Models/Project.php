<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'image',
        'status',
        'start_date',
        'end_date',
        'type',
        'reward_type',
        'reward_amount',
        'reward_currency',
        'accepts_applications',
        'short_description',
        'full_description',
        'requirements_analysis',
        'solution_design',
        'data_collection_evaluation',
        'published_at',
    ];
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'published_at' => 'datetime',

            'reward_amount' => 'decimal:2',

            'accepts_applications' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class)
            ->withTimestamps();
    }

    public function activities(): HasMany
    {
        return $this->hasMany(ProjectActivity::class)
            ->orderBy('sort_order');
    }


    public function goals(): HasMany
    {
        return $this->hasMany(ProjectGoal::class, 'project_id', 'id')->orderBy('sort_order');
    }

    public function outputs(): HasMany
    {
        return $this->hasMany(ProjectOutput::class)
            ->orderBy('sort_order');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)
            ->orderBy('sort_order');
    }
}
