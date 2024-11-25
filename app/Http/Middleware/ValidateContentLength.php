<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateContentLength
{
    const MAX_FILE_SIZE = 10; // 1GB in bytes

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the Content-Length header
        $contentLength = $request->header('Content-Length');

        if ($contentLength && (int) $contentLength > self::MAX_FILE_SIZE) {
            return response()->json(['error' => 'File size exceeds 1GB limit'], Response::HTTP_REQUEST_ENTITY_TOO_LARGE);
        }

        return $next($request);
    }
}
