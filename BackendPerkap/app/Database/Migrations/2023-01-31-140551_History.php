<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class History extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_barang' => [
                'type' => 'varchar',
                'constraint' => 11
            ],
            'peminjam' => [
                'type' => 'varchar',
                'constraint' => 9
            ],
            'admin_pinjam' => [
                'type' => 'varchar',
                'constraint' => 9
            ],
            'waktu_pinjam' => [
                'type' => 'timestamp',
                'default' => new RawSql('current_timestamp')
            ],
            'admin_kembali' => [
                'type' => 'varchar',
                'constraint' => 9,
                'null' => true
            ],
            'waktu_kembali' => [
                'type' => 'timestamp',
                'null' => true
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_barang', 'barang', 'id', onDelete: 'cascade');
        $this->forge->createTable('history');
    }

    public function down()
    {
        $this->forge->dropTable('history');
    }
}
