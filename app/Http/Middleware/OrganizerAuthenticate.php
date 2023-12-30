<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class OrganizerAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('organizer')->check()) {
                return $this->auth->shouldUse('organizer');
            }

        $this->unauthenticated($request, ['organizer']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('organizer.login');
    }
}
