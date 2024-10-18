<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The tasks that belong to the category.
     */
    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }
}
