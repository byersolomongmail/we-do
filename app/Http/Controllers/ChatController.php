<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatRoom($id = null)
    {
        $rooms = Room::all(); // Assuming you have a `Room` model
        $currentRoom = $id ? Room::find($id) : null;

        return view('chat', compact('rooms', 'currentRoom'));
    }
}
