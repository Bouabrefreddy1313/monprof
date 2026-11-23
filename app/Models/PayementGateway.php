<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayementGateway extends Model
{
    use HasFactory;
    protected $guarded = [];
protected $fillable = [
    'admin_id',
    'api_key',
    'site_id',
    'secret_key',
];
}
