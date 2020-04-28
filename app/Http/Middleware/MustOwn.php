<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Response;

class MustOwn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $object, string $rls = 'user_id')
    {
        if ($request->$object->$rls != $request->user()->id) {
            return Response::failure([
                $object => 'You are not allowed to do that!'
            ], [], 403);
        }

        return $next($request);
    }
}
