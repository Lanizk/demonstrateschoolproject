<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $subdomain=explode('.',$request->getHost())[0];
        $school=School::Where('subdomain',$subdomain. '.localhost')->first();
        if(!$school){
            abort(404,'Not Found');
        }

        app()->instance('school',$school);
        return $next($request);
    }
}
