<?php

namespace App\Http\Middleware;

use App\Models\Error;
use Closure;
use Illuminate\Http\Request;

class NoSessionForBotsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ((new \Jaybizzle\CrawlerDetect\CrawlerDetect)->isCrawler()) {
            try {
                $error = Error::create([
                    'message' => 'Bot detected',
                    'file' => '',
                    'line' => 0
                ]);
            } catch (\Exception $e) {
            }
            \Config::set('session.driver', 'array');
        }
        return $next($request);
    }
}
