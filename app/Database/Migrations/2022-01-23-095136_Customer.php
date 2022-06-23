<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_customer'       => [
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
            'created_at'       => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at'       => [
                'type'       => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('customer_id', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
