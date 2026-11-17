<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectActivity extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'sort_order',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(
            Partner::class,
            'activity_partner',
            'activity_id',
            'partner_id'
        )->withTimestamps();
    }
}
