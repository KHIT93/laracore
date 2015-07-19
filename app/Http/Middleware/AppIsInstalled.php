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
        $tables = DB::select('SHOW TABLES');
        if(!empty($tables))
        {
            return view('installer.alreadyinstalled');
        }
        return $next($request);
    }
}
