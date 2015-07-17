<?php


namespace App\Libraries;


class Installer
{
    public function environment()
    {
        $data = [
            'APP_ENV=production',
            'APP_DEBUG=false',
            'APP_KEY=123456',
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

        $file = implode('\n', $data);
        if(file_put_contents('/.env', $file))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}