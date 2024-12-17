@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat Rooms</title>
    <style>
        .room-list {
            height: 100vh;
            overflow-y: auto;
        }

        .chat-window {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background: #f9f9f9;
        }

        .message-input {
            display: flex;
        }

        .message-input input {
            flex: 1;
            padding: 10px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Room List -->
            <div class="col-md-4 room-list border-end">
                <h3 class="text-center mt-3">Rooms</h3>
                <ul class="list-group">
                    @foreach ($rooms as $room)
                        <li class="list-group-item">
                            <a href="javascript:void(0);" class="text-decoration-none room-link" data-room-id="{{ $room->id }}">
                                {{ $room->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Chat Room -->
            <div class="col-md-8">
                <div class="chat-window">
                    <div id="chat-room-header" class="text-center bg-light py-2 mb-2">
                        <h4>Select a room to start chatting</h4>
                    </div>
                    <div class="messages" id="messages">
                        <!-- Messages will appear here -->
                    </div>
                    <form id="chat-form" class="message-input border-top">
                        <input type="text" id="message" class="form-control" placeholder="Type a message" disabled>
                        <button type="submit" class="btn btn-primary" disabled>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const messagesElement = document.getElementById('messages');
        const form = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');
        const chatRoomHeader = document.getElementById('chat-room-header');

        let roomId = null;
        const userName = "{{(Auth::check())?Auth::user()->name:'guest' }}";

        // Replace with your WebSocket connection logic
        const ws = new WebSocket("ws://your-websocket-server-url");

        ws.onopen = () => {
            console.log('Connected to WebSocket');
        };

        ws.onmessage = (event) => {
            const data = JSON.parse(event.data);

            if (data.room === roomId) {
                const messageDiv = document.createElement('div');
                messageDiv.textContent = `${data.user}: ${data.message}`;
                messagesElement.appendChild(messageDiv);
                messagesElement.scrollTop = messagesElement.scrollHeight;
            }
        };

        document.querySelectorAll('.room-link').forEach(link => {
            link.addEventListener('click', () => {
                roomId = link.dataset.roomId;
                chatRoomHeader.innerHTML = `<h4>Room: ${link.textContent}</h4>`;
                messageInput.disabled = false;
                form.querySelector('button').disabled = false;

                messagesElement.innerHTML = ''; // Clear previous messages
                ws.send(JSON.stringify({ type: "join", room: roomId, user: userName }));
            });
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const message = messageInput.value;
            if (message.trim() !== '' && roomId) {
                ws.send(JSON.stringify({ type: "message", room: roomId, user: userName, message }));
                messageInput.value = '';
            }
        });
    </script>
@endsection
