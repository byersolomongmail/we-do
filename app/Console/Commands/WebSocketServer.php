<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\WebSocket\ChatServer;

class WebSocketServer extends Command
{
    protected $signature = 'websocket:serve';
    protected $description = 'Start the WebSocket server';

    public function handle()
    {
        $this->info('Starting WebSocket server...');
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new ChatServer()
                )
            ),
            8080
        );

        $this->info('WebSocket server running on ws://127.0.0.1:8080');
        $server->run();
    }
}
