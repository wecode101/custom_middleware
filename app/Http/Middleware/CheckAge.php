<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->input('age') < 24) {
            session()->flash('error', 'you are not of age');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
