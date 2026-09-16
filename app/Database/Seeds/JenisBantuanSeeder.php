<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisBantuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_bantuan' => 'PKH (Program Keluarga Harapan)', 'kategori' => 'Bantuan Sosial Reguler', 'sumber_bantuan' => 'Pusat', 'keterangan' => 'Bantuan tunai bersyarat untuk KPM PKH', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama_bantuan' => 'BLT Dana Desa', 'kategori' => 'Bantuan Langsung Tunai', 'sumber_bantuan' => 'Daerah', 'keterangan' => 'Bantuan Langsung Tunai bersumber dari Dana Desa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama_bantuan' => 'BPNT Sembako', 'kategori' => 'Bantuan Pangan Non-Tunai', 'sumber_bantuan' => 'Pusat', 'keterangan' => 'Bantuan pangan berupa sembako melalui e-warung', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama_bantuan' => 'Bantuan Lansia', 'kategori' => 'Bantuan Sosial Khusus', 'sumber_bantuan' => 'Pusat', 'keterangan' => 'Bantuan untuk warga lanjut usia tidak produktif', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama_bantuan' => 'Beras Cadangan Pemerintah (CPP)', 'kategori' => 'Bantuan Pangan', 'sumber_bantuan' => 'Pusat', 'keterangan' => 'Bantuan beras dari cadangan pemerintah (Bulog)', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('jenis_bantuan')->insertBatch($data);
    }
}
