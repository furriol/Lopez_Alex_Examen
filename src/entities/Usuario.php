<?php

class Usuario {

    private $email;
    private $pass;

    public function __construct($email, $pass) {
        $this->email = $email;
        $this->pass = $pass;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function toArray() {
        return [
            'email' => $this->getEmail(),
            'pass' => $this->getPass()
        ];
    }
}