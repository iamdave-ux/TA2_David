<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            [
                'username' => 'admin',
                'name' => 'Admin User',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier1',
                'name' => 'Carlo Ramos',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier2',
                'name' => 'Bea Cruz',
                'role' => 'Cashier'
            ],
            [
                'username' => 'manager1',
                'name' => 'Dina Flores',
                'role' => 'Manager'
            ],
            [
                'username' => 'staff1',
                'name' => 'Erik Tan',
                'role' => 'Staff'
            ]
        ];

        return view('users', $data);
    }
}