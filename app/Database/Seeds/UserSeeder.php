<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       => 'Administrator',
                'username'   => 'admin',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Petugas Kelurahan',
                'username'   => 'petugas',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'petugas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Kepala Kelurahan Lamasi',
                'username'   => 'lurah',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'lurah',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
