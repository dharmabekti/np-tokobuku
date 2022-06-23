<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'nip' => '101010',
            'gender' => 'L',
            'address' => 'Jalan Babarsari 44',
            'email' => 'example@mail.com',
            'phone' => '0274125632',
            'username' => 'admin',
            'password' => 'b456f30873e3fbbe70dbb2e6775843d90eb5a8fb471b1b42698de889783a4d10b95f1f8114e31f970d9b71439e5ff0d281a131f0a4d061e7a81b4c69f279325f',
            'level_id' => "1",
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];
        $this->db->table('employee')->insert($data);
    }
}
