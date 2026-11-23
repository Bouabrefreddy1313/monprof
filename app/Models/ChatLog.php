<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatLog extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'response_type', 'confidence', 'ip'];

    protected $casts = [
        'confidence' => 'float',
    ];
}
