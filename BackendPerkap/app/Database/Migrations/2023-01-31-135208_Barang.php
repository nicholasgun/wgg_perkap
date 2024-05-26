<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'varchar',
                'constraint' => 11
            ],
            'id_jenis_barang' => [
                'type' => 'varchar',
                'constraint' => 5
            ],
            'peminjam' => [
                'type' => 'varchar',
                'constraint' => 9,
                'null' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ]
            
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_jenis_barang', 'jenis_barang', 'id', onDelete: 'cascade');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
