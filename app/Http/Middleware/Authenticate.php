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
                route('particuliers.superadmin.login.form')
            );
        }

        if (in_array('admin', $guards)) {
            throw new \Illuminate\Auth\AuthenticationException(
                'Unauthenticated.',
                $guards,
                route('particuliers.admin.login.form')
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
        if ($request->expectsJson()) {
            return null;
        }

        // Espace entreprises : page de connexion des comptes entreprise
        if ($request->is('entreprises', 'entreprises/*')) {
            return route('entreprises.login');
        }

        return route('particuliers.login');
    }
}
