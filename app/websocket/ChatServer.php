<?php

namespace App\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface
{
    protected $clients;
    protected $rooms;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->rooms = [];
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection: ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        switch ($data['type']) {
            case 'join':
                $this->rooms[$from->resourceId] = $data['room'];
                echo "User joined room: {$data['room']} ({$from->resourceId})\n";
                break;

            case 'message':
                $roomId = $this->rooms[$from->resourceId] ?? null;
                if ($roomId) {
                    foreach ($this->clients as $client) {
                        if ($this->rooms[$client->resourceId] === $roomId) {
                            $client->send(json_encode([
                                'room' => $roomId,
                                'user' => $data['user'],
                                'message' => $data['message'],
                            ]));
                        }
                    }
                }
                break;
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        unset($this->rooms[$conn->resourceId]);
        echo "Connection closed: ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}
