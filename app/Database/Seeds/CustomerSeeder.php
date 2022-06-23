<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'name' => $faker->name,
                'no_customer'    => $faker->nik,
                'gender' => $faker->title == 'Ms' || $faker->title == 'Miss' ? 'P' : 'L',
                'address' => $faker->address,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'created_at' => Time::createFromTimestamp($faker->unixTime),
                'updated_at' => Time::createFromTimestamp($faker->unixTime),
            ];
            $this->db->table('customer')->insert($data);
        }
        // $data = [
        //     [
        //         'name' => 'Bekti Suratmanto',
        //         'no_customer'    => '1122334455',
        //         'gender' => 'L',
        //         'address' => 'Jalan Babarsari 44',
        //         'email' => 'kianom@mail.com',
        //         'phone' => '0857420000',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        //     [
        //         'name' => 'Agus Muchammad',
        //         'no_customer'    => '1122334455',
        //         'gender' => 'L',
        //         'address' => 'Jalan Babarsari 44',
        //         'email' => 'kianom@mail.com',
        //         'phone' => '0857420000',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        //     [
        //         'name' => 'Agus Muchammad',
        //         'no_customer'    => '1122334455',
        //         'gender' => 'L',
        //         'address' => 'Jalan Babarsari 44',
        //         'email' => 'kianom@mail.com',
        //         'phone' => '0857420000',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ]
        // ];

        // Simple Queries
        // $this->db->query("INSERT INTO customer (name, no_customer) VALUES(:name:, :no_customer:)", $data);

        // Using Query Builder
        // $this->db->table('customer')->insertBatch($data);
    }
}
