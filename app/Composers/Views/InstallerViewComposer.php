<?php


namespace App\Composers\Views;


use App\Libraries\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Libraries\Theme;
use App\Models\Block;

class InstallerViewComposer implements ViewComposer
{
    public function compose(View $view)
    {
        if($view->name() == 'installer.site')
        {
            $timezones = array();
            $mail_drivers = ['smtp' => 'SMTP', 'mail' => 'PHP Mail function', 'mailgun' => 'Mailgun', 'mandrill' => 'Mandrill'];
            $mail_encryption = ['ssl' => 'SSL (Secure Socket Layer)', 'tls' => 'TLS (Transport Layer Security)'];
            foreach (timezone_identifiers_list() as $timezone)
            {
                $timezones[$timezone] = $timezone;
            }
            $view->with('timezones', $timezones)
                ->with('mail_drivers', $mail_drivers)
                ->with('mail_encryption', $mail_encryption);
        }
        else
        {
            //Create generic view details
        }
    }
}