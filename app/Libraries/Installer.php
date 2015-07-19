<?php


namespace App\Libraries;


use Illuminate\Http\Request;

class Installer
{
    public function environment($final = false)
    {
        $data = [];
        if(!$final)
        {
            $data = [
                'APP_ENV=local',
                'APP_DEBUG=false',
                'APP_URL=http://'.app('request')->getHttpHost(),
                'APP_TIMEZONE='.((app('request')->session()->has('APP_TIMEZONE')) ? session('APP_TIMEZONE'): date_default_timezone_get()),
                'APP_LOCALE='.((app('request')->session()->has('APP_LOCALE')) ? session('APP_LOCALE'): 'en'),
                '',
                'DB_DRIVER='.session('DB_DRIVER'),
                'DB_HOST='.((app('request')->session()->has('DB_HOST')) ? session('DB_HOST'): 'null'),
                'DB_DATABASE='.((app('request')->session()->has('DB_DATABASE')) ? session('DB_DATABASE'): 'null'),
                'DB_USERNAME='.((app('request')->session()->has('DB_USERNAME')) ? session('DB_USERNAME'): 'null'),
                'DB_PASSWORD='.((app('request')->session()->has('DB_PASSWORD')) ? session('DB_PASSWORD'): 'null'),
                '',
                'CACHE_DRIVER=file',
                'SESSION_DRIVER=file',
                'QUEUE_DRIVER=sync',
                '',
                'MAIL_DRIVER='.session('MAIL_DRIVER'),
                'MAIL_HOST='.((app('request')->session()->has('MAIL_HOST')) ? session('MAIL_HOST'): 'null'),
                'MAIL_PORT='.((app('request')->session()->has('MAIL_PORT')) ? session('MAIL_PORT'): 'null'),
                'MAIL_USERNAME='.((app('request')->session()->has('MAIL_USERNAME')) ? session('MAIL_USERNAME'): 'null'),
                'MAIL_PASSWORD='.((app('request')->session()->has('MAIL_PASSWORD')) ? session('MAIL_PASSWORD'): 'null'),
                'MAIL_ENCRYPTION='.((app('request')->session()->has('MAIL_ENCRYPTION')) ? session('MAIL_ENCRYPTION'): 'null'),
                ''
            ];
        }
        else
        {
            $data = [
                'APP_ENV=production',
                'APP_DEBUG=false',
                'APP_KEY=eHFJmgcnGqu4fNeMRrC2kwcGlWwkUDnb',
                'APP_URL=http://'.app('request')->getHttpHost(),
                'APP_TIMEZONE='.((app('request')->session()->has('APP_TIMEZONE')) ? session('APP_TIMEZONE'): date_default_timezone_get()),
                'APP_LOCALE='.((app('request')->session()->has('APP_LOCALE')) ? session('APP_LOCALE'): 'en'),
                '',
                'DB_DRIVER='.session('DB_DRIVER'),
                'DB_HOST='.((app('request')->session()->has('DB_HOST')) ? session('DB_HOST'): 'null'),
                'DB_DATABASE='.((app('request')->session()->has('DB_DATABASE')) ? session('DB_DATABASE'): 'null'),
                'DB_USERNAME='.((app('request')->session()->has('DB_USERNAME')) ? session('DB_USERNAME'): 'null'),
                'DB_PASSWORD='.((app('request')->session()->has('DB_PASSWORD')) ? session('DB_PASSWORD'): 'null'),
                '',
                'CACHE_DRIVER=database',
                'SESSION_DRIVER=database',
                'QUEUE_DRIVER=sync',
                '',
                'MAIL_DRIVER='.session('MAIL_DRIVER'),
                'MAIL_HOST='.((app('request')->session()->has('MAIL_HOST')) ? session('MAIL_HOST'): 'null'),
                'MAIL_PORT='.((app('request')->session()->has('MAIL_PORT')) ? session('MAIL_PORT'): 'null'),
                'MAIL_USERNAME='.((app('request')->session()->has('MAIL_USERNAME')) ? session('MAIL_USERNAME'): 'null'),
                'MAIL_PASSWORD='.((app('request')->session()->has('MAIL_PASSWORD')) ? session('MAIL_PASSWORD'): 'null'),
                'MAIL_ENCRYPTION='.((app('request')->session()->has('MAIL_ENCRYPTION')) ? session('MAIL_ENCRYPTION'): 'null'),
                ''
            ];
        }

        $file = implode("\n", $data);
        if(file_put_contents(public_path().'/../.env', $file) != false)
        {
            chmod(public_path().'/../.env', 0775);
            return true;
        }
        else
        {
            return false;
        }
    }
}