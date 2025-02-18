<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Define relationship to chats.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
