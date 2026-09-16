<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengajuanBantuanTable extends Migration
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
            'penerima_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jenis_bantuan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_pengajuan' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Menunggu', 'Disetujui', 'Ditolak'],
                'default'    => 'Menunggu',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'catatan_verifikasi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'diajukan_oleh' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'diverifikasi_oleh' => [
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
        $this->forge->addForeignKey('penerima_id', 'penerima_bantuan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jenis_bantuan_id', 'jenis_bantuan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('diajukan_oleh', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('diverifikasi_oleh', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('pengajuan_bantuan');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_bantuan');
    }
}
