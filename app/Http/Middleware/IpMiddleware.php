<?php

namespace App\Http\Middleware;

use Closure;
use App\Ip;
class IpMiddleware
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


        $ip=Ip::where("name",$request->ip())->first();


        // ipが含まれていない時の処理
        if (!$ip) {

            abort(403);
        }
        // ipが含まれていればリクエストが通る

        return $next($request);
    }
}
