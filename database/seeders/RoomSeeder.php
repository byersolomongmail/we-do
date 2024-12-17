<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create(['name' => 'General', 'description' => 'A public room for everyone']);
        Room::create(['name' => 'Random', 'description' => 'A casual space for random chats']);
    }
}
