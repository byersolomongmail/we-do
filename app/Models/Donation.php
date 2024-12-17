<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    // Relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
