<?php namespace Bantenprov\StatusTransaksiEtendering\Http\Middleware;

use Closure;

/**
 * The StatusTransaksiEtenderingMiddleware class.
 *
 * @package Bantenprov\StatusTransaksiEtendering
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEtenderingMiddleware
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
        return $next($request);
    }
}
