<?php

namespace App\Http\Middleware;

use Closure;

class TerminateMiddleware
{
    public function handle($request, Closure $next)
    {
        // Executing statements before the request is handled.
        echo "Executing statements of handle method of TerminateMiddleware.";
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Executing statements after the response is sent.
        echo "<br>Executing statements of terminate method of TerminateMiddleware.";
    }
}
