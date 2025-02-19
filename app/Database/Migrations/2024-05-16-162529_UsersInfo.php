<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersInfo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '120',
                'null'       => false,
            ],
            'surname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'id_country' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null'           => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        
            
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_country', 'countries', 'id_country', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users_info');
    }

    public function down()
    {
        $this->forge->dropTable('users_info');
    }
}
