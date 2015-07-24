<?php


namespace app\Exceptions\Laracore;


class LaracoreUpdateException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}