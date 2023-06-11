<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}