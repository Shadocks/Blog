<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 19/10/2017
 * Time: 21:55
 */

namespace Core;


class Session
{
    private $messages = [];
    private $session;

    public function start()
    {
        if (empty($this->session)) {
            $this->session = session_start();
        }
    }

    public function destroy()
    {
        session_destroy();
    }

    public function addMessage($key, $message)
    {
        $this->messages[$key] = $message;
    }

    public function hasMessage()
    {
        return true ? !empty($this->messages) : false;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getMessage($key)
    {
        return $this->messages[$key];
    }
}