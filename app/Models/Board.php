<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'active',
        'birthday',
        'age',
        'gender',
        'interest',
        'description'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
