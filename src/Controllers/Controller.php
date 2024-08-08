<?php

namespace EvolutionCMS\Authforms\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function redirectIfAuthenticated()
    {
        if (app('evouser')->do('user', ['web'])) {
            return redirect('/');
        }
    }

    public function login()
    {
        return view('authforms.login');
    }

    public function register()
    {
        $this->redirectIfAuthenticated();
        return view('authforms.register');
    }

    public function resetPassword()
    {
        $this->redirectIfAuthenticated();
        return view('authforms.reset-password');
    }
}
