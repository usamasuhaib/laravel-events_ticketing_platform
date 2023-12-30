<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AttendeeAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('attendee')->check()) {
                return $this->auth->shouldUse('attendee');
            }

        $this->unauthenticated($request, ['attendee']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('attendee.login');
    }
}
