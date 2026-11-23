<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'nom',
        'is_active',
        'subscribed_at',
        'last_visited_page',
        'interest_category',
        'last_campaign_sent_at',
        'campaigns_sent_count',
        'preferences',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'subscribed_at' => 'datetime',
        'last_campaign_sent_at' => 'datetime',
        'campaigns_sent_count' => 'integer',
        'preferences' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeNeedsCampaign($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('last_campaign_sent_at')
                    ->orWhere('last_campaign_sent_at', '<', now()->subDays(10));
            });
    }
}
