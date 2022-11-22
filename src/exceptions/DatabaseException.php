<?php
class DatabaseException extends exception {

    public function __construct($msg)
    {
        parent::__construct($msg);
    }
}