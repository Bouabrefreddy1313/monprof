<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;

    protected $table = 'knowledge_base';

    protected $fillable = ['category', 'title', 'content', 'keywords', 'priority', 'is_active'];

    protected $casts = [
        'keywords' => 'array',
        'is_active' => 'boolean',
    ];
}
