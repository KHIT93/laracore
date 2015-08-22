<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LogEntry extends Model
{
    protected $fillable = ['uid', 'url', 'type', 'hostname', 'message'];

    protected $table = 'log';

    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'uid');
    }

    public static function exception(\Exception $ex)
    {
        if($ex instanceof HttpException)
        {
            self::create([
                'uid' => ((auth()->check()) ? \Auth::user()->uid : 0),
                'type' => $ex->getStatusCode(),
                'url' => \Request::getRequestUri(),
                'hostname' => \Request::getClientIp(),
                'message' => $ex->getMessage()
            ]);
        }
        else
        {
            self::create([
                'uid' => ((auth()->check()) ? \Auth::user()->uid : 0),
                'type' => $ex->getCode(),
                'url' => \Request::getRequestUri(),
                'hostname' => \Request::getClientIp(),
                'message' => $ex->getMessage()
            ]);
        }
    }
}
