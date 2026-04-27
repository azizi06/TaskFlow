<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    // Une catégorie appartient à un utilisateur
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Une catégorie a plusieurs tâches
    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }

}