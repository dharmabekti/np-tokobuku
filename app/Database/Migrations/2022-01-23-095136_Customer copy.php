<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'gender'       => [
                'type'       => 'ENUM("L","P")',
            ],
            'address'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'level_id'       => [
                'type'       => 'ENUM("1","2")',
            ],
            'created_at'       => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at'       => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
            'deleted_at'       => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('employee_id', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
