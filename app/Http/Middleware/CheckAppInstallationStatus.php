<?php

namespace App\Http\Middleware;

use Closure;

class CheckAppInstallationStatus
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
        $installed = true;
        try
        {
            $tables = \DB::select('SHOW TABLES');
            if(empty($tables))
            {
                $installed = false;
            }
        }
        catch(\Exception $ex)
        {
            $installed = false;
            logger('Warning: Application is not installed');
        }

        if(!$installed)
        {
            if ($request->url() == route('install.index'))
            {
                return $next($request);
            }
        }

        return ($installed) ? $next($request) : redirect()->route('install.index');
    }
}
