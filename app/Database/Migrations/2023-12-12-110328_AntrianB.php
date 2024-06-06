<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AntrianB extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nomer' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'pasien_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'status' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'pengambilan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => TRUE,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => TRUE,
            ],

        ]);
        $this->forge->addKey('nomer', false);
        $this->forge->createTable('AntrianB');
    }

    public function down()
    {
        $this->forge->dropTable('AntrianB');
    }
}
