<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBarang extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'varchar',
                'constraint' => 5
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => false
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('jenis_barang');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_barang');
    }
}
