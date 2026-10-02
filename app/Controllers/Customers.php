<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@email.com',
                'phone' => '09171234567'
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@email.com',
                'phone' => '09181234567'
            ],
            [
                'name' => 'Pedro Reyes',
                'email' => 'pedro@email.com',
                'phone' => '09191234567'
            ],
            [
                'name' => 'Ana Garcia',
                'email' => 'ana@email.com',
                'phone' => '09201234567'
            ],
            [
                'name' => 'Luis Mendoza',
                'email' => 'luis@email.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers', $data);
    }
}