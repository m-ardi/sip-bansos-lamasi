<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBantuanModel extends Model
{
    protected $table            = 'jenis_bantuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_bantuan', 'kategori', 'sumber_bantuan', 'keterangan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama_bantuan'  => 'required|min_length[3]|max_length[100]',
        'kategori'      => 'required|max_length[100]',
        'sumber_bantuan'=> 'required|in_list[Pusat,Daerah,Swasta,Lainnya]',
    ];

    protected $skipValidation = false;

    /**
     * Get list for dropdown
     */
    public function getForDropdown(): array
    {
        $rows = $this->select('id, nama_bantuan')->findAll();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['id']] = $row['nama_bantuan'];
        }
        return $result;
    }
}
