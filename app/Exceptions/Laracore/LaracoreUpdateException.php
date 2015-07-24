<?php


namespace App\Exceptions\Laracore;


class LaracoreUpdateException extends LaracoreException
{
    public function __construct($message = LaracoreException::GENERIC_UPDATE_ERROR)
    {
        parent::__construct($message);
    }
}