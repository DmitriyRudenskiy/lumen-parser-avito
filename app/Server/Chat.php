<?php
namespace App\Server;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    protected $user = [];

    protected $history = [];

    const LIMIT_HISTORY = 15;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $conn->send(json_encode(['history' => $this->history]));

        // echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $response = $this->getResponse($msg, $from->resourceId);

        if ($response === null) {
            return;
        }

        foreach ($this->clients as $client) {
            //if ($from !== $client) {
                $client->send($response);
            //}
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        // echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    protected function getResponse($stream, $uid)
    {
        $obj = json_decode($stream);

        if (empty($obj->method)) {
            return null;
        }

        if ($obj->method == "message" && !empty($obj->params->text)) {
            $data = [
                'user' => $obj->params->name,
                'message' => $this->filter($obj->params->text),
                'timestamp' => time()
            ];

            $this->addHistory($data);

            return json_encode($data);
        }

        if ($obj->method == "init" && !empty($obj->params->name)) {

            if (!isset($this->user[$obj->params->name])) {
                $this->user[$obj->params->name] = strtotime("+15 minutes");

                $data = [
                    'user' => null,
                    'message' => $obj->params->name . ' присоединился к чату',
                    'timestamp' => time()
                ];

                $this->addHistory($data);

                return json_encode($data);
            }
        }
    }

    protected function filter($text)
    {
        $text = strip_tags($text);
        $text = trim($text);

        return $text;
    }

    protected function addHistory($data)
    {
        if (sizeof($this->history) > self::LIMIT_HISTORY) {
            array_shift($this->history);
        }

        $this->history[] = $data;
    }
}