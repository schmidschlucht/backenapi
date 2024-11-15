<?php

namespace Core;

class RequestMessage {
    public $message = "";
    public $error = false;
    public $data = [];

    public static function write(string $msg, bool $err, array $data = []): RequestMessage {
        $message = new RequestMessage();
        $message->message = $msg;
        $message->error = $err;
        $message->data = $data;
        return $message;
    }

}