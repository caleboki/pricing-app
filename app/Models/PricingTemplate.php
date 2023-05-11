<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'configuration',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
