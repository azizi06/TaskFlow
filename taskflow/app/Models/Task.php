<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'priority',
        'status',
        'user_id',
        'category_id',
    ];

    // Une tâche appartient à un utilisateur
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Une tâche appartient à une catégorie
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

}