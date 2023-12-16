<?php

namespace Controllers;

use Core\Controller;
use Core\Exceptions\CSRFException;
use Models\Task;
use Models\User;
use Utils\CSRF;
use Utils\OldFormData;
use Utils\Request;
use Utils\Response;
use Utils\FlashMassages;

class AuthController extends Controller
{
    public function show()
    {
        $this->render('auth/login', [
            'csrf' => (new CSRF)->token(),
            'oldData' => (new OldFormData)->get()
        ]);
    }

    public function login()
    {
        $request = new Request();

        if (!(new CSRF)->check($request->find('csrf_token'))) {
            throw new CSRFException();
        }

        $credentials = $request->only(['username', 'password']);

        $user = new User;

        if (!$user->attempt($credentials)) {

            FlashMassages::push(FlashMassages::ERROR, 'Invalid credentials.');
            OldFormData::save($credentials);

            (new Response)->back();
        }

        (new User)->login($credentials);

        (new Response)->redirect('/');
    }

    public function logout()
    {
        (new User)->logout();
        (new Response)->redirect('/');
    }
}