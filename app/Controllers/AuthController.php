<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {

        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);
        return redirect()->to('/login')->with('message', 'Registration successful. Please log in.');
    }

    //rnadom function test for github
    public function random() {}
}
