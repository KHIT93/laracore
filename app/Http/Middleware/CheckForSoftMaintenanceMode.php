<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckForSoftMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Schema::hasTable('settings'))
        {
            if (Setting::get('site_maintenance') == 1 && !has_permission('access_maintenance')) {
                throw new HttpException(503);
            }
        }
        return $next($request);
    }
}
