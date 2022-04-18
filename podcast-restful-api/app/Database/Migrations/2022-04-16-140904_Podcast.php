<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Podcast extends Migration
{
	public function up(){
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'title' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'category' => [
                'type' => 'TEXT'
            ],
            'image' => [
                'type' => 'TEXT'
            ],
            'voice' => [
                'type' => 'TEXT'
            ],
            'created_at' =>[
                'type' => 'DATETIME',
            ],
            'updated_at' =>[
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('podcast');
    }

    public function down()
    {
        $this->forge->dropTable('podcast');
    }
}