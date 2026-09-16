<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaBantuanModel extends Model
{
    protected $table            = 'penerima_bantuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'rt', 'rw', 'kelurahan',
        'kecamatan', 'kabupaten', 'no_hp', 'foto_ktp',
        'kategori_miskin', 'status_aktif',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nik'          => 'required|exact_length[16]|numeric|is_unique[penerima_bantuan.nik,id,{id}]',
        'nama_lengkap' => 'required|min_length[3]|max_length[100]',
        'jenis_kelamin'=> 'required|in_list[L,P]',
        'alamat'       => 'required',
        'kelurahan'    => 'required|max_length[100]',
        'kecamatan'    => 'required|max_length[100]',
    ];
    protected $validationMessages = [
        'nik' => ['is_unique' => 'NIK sudah terdaftar dalam sistem.'],
    ];
    protected $skipValidation = false;

    // ---------------------------------------------------------------
    // Custom Methods
    // ---------------------------------------------------------------

    /**
     * Get with search, filter, pagination
     */
    public function getWithFilter(array $filters = []): array
    {
        $builder = $this->builder();

        if (!empty($filters['keyword'])) {
            $keyword = $filters['keyword'];
            $builder->groupStart()
                ->like('nik', $keyword)
                ->orLike('nama_lengkap', $keyword)
                ->orLike('alamat', $keyword)
                ->groupEnd();
        }

        if (!empty($filters['status_aktif'])) {
            $builder->where('status_aktif', $filters['status_aktif']);
        }

        if (!empty($filters['kategori_miskin'])) {
            $builder->where('kategori_miskin', $filters['kategori_miskin']);
        }

        $builder->orderBy('nama_lengkap', 'ASC');

        return $builder->get()->getResultArray();
    }

    /**
     * Count total penerima
     */
    public function countTotal(): int
    {
        return $this->countAll();
    }

    /**
     * Count aktif penerima
     */
    public function countAktif(): int
    {
        return $this->where('status_aktif', 'Aktif')->countAllResults();
    }
}
