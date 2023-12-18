<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_level' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_level', true);
        $this->forge->createTable('tb_level');
    }

    public function down()
    {
        $this->forge->dropTable('tb_level');
    }
}
