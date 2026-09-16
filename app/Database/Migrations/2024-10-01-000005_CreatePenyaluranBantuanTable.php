<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyaluranBantuanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengajuan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_penyaluran' => [
                'type' => 'DATE',
            ],
            'jumlah_bantuan' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Rupiah',
            ],
            'metode_penyaluran' => [
                'type'       => 'ENUM',
                'constraint' => ['Tunai', 'Transfer', 'Barang'],
                'default'    => 'Tunai',
            ],
            'bukti_penyaluran' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_penyaluran' => [
                'type'       => 'ENUM',
                'constraint' => ['Tersalurkan', 'Tertunda', 'Dibatalkan'],
                'default'    => 'Tersalurkan',
            ],
            'disalurkan_oleh' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pengajuan_id', 'pengajuan_bantuan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('disalurkan_oleh', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('penyaluran_bantuan');
    }

    public function down()
    {
        $this->forge->dropTable('penyaluran_bantuan');
    }
}
