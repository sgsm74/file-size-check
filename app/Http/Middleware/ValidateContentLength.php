<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateContentLength
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maxSize = 10; // 1GB in bytes
        $contentLength = $request->header('Content-Length');

        if ($contentLength && $contentLength > $maxSize) {
            return response()->json(['error' => 'File too large!'], 413);
        }

        return $next($request);
    }
}
