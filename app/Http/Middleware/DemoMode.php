<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (env('DEMO_MODE') && $request->isMethod('post')) {
            // return response()->json(['error' => 'Not allowed in demo'], 422);
            return response()->json(validationError('Not allowed in demo'), 422);
        }
        return $next($request);
    }
}
