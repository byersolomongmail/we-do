<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Define relationship to the room.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Define relationship to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
