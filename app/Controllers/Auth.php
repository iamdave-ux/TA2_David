<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $model->where('email', $email)->first();

        // Supports both hashed and plain-text passwords to prevent login errors
        if ($user && (password_verify($password, $user['password']) || $password === $user['password'])) {
            $session->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'email'      => $user['email']
            ]);
            return redirect()->to('/tasks');
        }

        $session->setFlashdata('msg', 'Invalid email or password.');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}