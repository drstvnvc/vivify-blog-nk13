<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
    $age = $request->input('age');

    if ($age >= 18) {
      return $next($request);
    }
    return response()->view('auth.forbidden-under-18');
  }
}
