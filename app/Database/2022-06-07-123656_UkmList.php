<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UkmList extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ukm' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ketua' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ukm_list');
    }

    public function down()
    {
        //
    }
}
