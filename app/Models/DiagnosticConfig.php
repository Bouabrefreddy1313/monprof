<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class DiagnosticConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'cle',
        'valeur',
        'type',
        'description',
    ];

    public static function get(string $cle, $default = null)
    {
        return Cache::remember("diagnostic_config_{$cle}", 3600, function () use ($cle, $default) {
            $config = static::where('cle', $cle)->first();
            if (!$config) {
                return $default;
            }

            return match ($config->type) {
                'boolean' => filter_var($config->valeur, FILTER_VALIDATE_BOOLEAN),
                'integer' => (int)$config->valeur,
                'json' => json_decode($config->valeur, true) ?? $default,
                default => $config->valeur ?? $default,
            };
        });
    }

    public static function set(string $cle, $valeur, string $type = 'string', ?string $description = null)
    {
        $valeurStr = ($type === 'json' && is_array($valeur)) ? json_encode($valeur) : (string)$valeur;

        $config = static::updateOrCreate(
            ['cle' => $cle],
            [
                'valeur' => $valeurStr,
                'type' => $type,
                'description' => $description ?? $cle,
            ]
        );

        Cache::forget("diagnostic_config_{$cle}");
        return $config;
    }
}
