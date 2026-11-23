<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        if (in_array('superadmin', $guards)) {
            throw new \Illuminate\Auth\AuthenticationException(
                'Unauthenticated.',
                $guards,
                route('superadmin.login.form')
            );
        }

        if (in_array('admin', $guards)) {
            throw new \Illuminate\Auth\AuthenticationException(
                'Unauthenticated.',
                $guards,
                route('admin.login.form')
            );
        }

        throw new \Illuminate\Auth\AuthenticationException(
            'Unauthenticated.',
            $guards,
            $this->redirectTo($request)
        );
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
