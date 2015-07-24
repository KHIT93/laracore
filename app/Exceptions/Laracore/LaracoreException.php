<?php


namespace App\Exceptions\Laracore;


class LaracoreException extends \Exception
{
    public function __construct($message = LaracoreException::UNKNOWN_ERROR)
    {
        parent::__construct($message);
    }

    /**
     * Error codes
     */
    const UNKNOWN_ERROR = 'An unkown error occurred';
    const GENERIC_UPDATE_ERROR = 'An error occurred during the update process';
}