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
        $maxSize = 1 * 1024 * 1024; // 2MB in bytes

        $contentLength = (int) $request->header('Content-Length');
        if ($contentLength > $maxSize) {
            return response()->json(['error' => 'File size exceeds 1MB'], 413); // HTTP 413 Payload Too Large
        }

        return $next($request);
    }
}
