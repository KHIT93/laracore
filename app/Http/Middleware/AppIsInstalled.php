<?php namespace App\Http\Middleware;

use Closure;
use DB;

class AppIsInstalled
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
        try
        {
            $tables = DB::select('SHOW TABLES');
            if(!empty($tables))
            {
                return view('installer.alreadyinstalled');
            }
        }
        catch(\Exception $ex)
        {
            logger('Warning: Application is not installed');
        }
        return $next($request);
    }
}
