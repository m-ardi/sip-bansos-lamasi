<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanBantuanModel extends Model
{
    protected $table            = 'pengajuan_bantuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'penerima_id', 'jenis_bantuan_id', 'tanggal_pengajuan',
        'keterangan', 'status', 'catatan_verifikasi',
        'diajukan_oleh', 'diverifikasi_oleh',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'penerima_id'    => 'required|integer',
        'jenis_bantuan_id' => 'required|integer',
        'tanggal_pengajuan' => 'required|valid_date',
    ];
    protected $skipValidation = false;

    // ---------------------------------------------------------------
    // Custom Methods
    // ---------------------------------------------------------------

    /**
     * Get all pengajuan with JOIN penerima and jenis_bantuan
     */
    public function getAllWithDetails(array $filters = []): array
    {
        $builder = $this->db->table('pengajuan_bantuan pb')
            ->select('pb.*, p.nama_lengkap, p.nik, jb.nama_bantuan, u1.nama as nama_pengaju, u2.nama as nama_verifikator')
            ->join('penerima_bantuan p', 'p.id = pb.penerima_id', 'left')
            ->join('jenis_bantuan jb', 'jb.id = pb.jenis_bantuan_id', 'left')
            ->join('users u1', 'u1.id = pb.diajukan_oleh', 'left')
            ->join('users u2', 'u2.id = pb.diverifikasi_oleh', 'left');

        if (!empty($filters['status'])) {
            $builder->where('pb.status', $filters['status']);
        }

        if (!empty($filters['keyword'])) {
            $builder->groupStart()
                ->like('p.nama_lengkap', $filters['keyword'])
                ->orLike('p.nik', $filters['keyword'])
                ->orLike('jb.nama_bantuan', $filters['keyword'])
                ->groupEnd();
        }

        return $builder->orderBy('pb.tanggal_pengajuan', 'DESC')->get()->getResultArray();
    }

    /**
     * Get detail pengajuan by ID
     */
    public function getDetailById(int $id): ?array
    {
        return $this->db->table('pengajuan_bantuan pb')
            ->select('pb.*, p.nama_lengkap, p.nik, p.alamat, p.no_hp, jb.nama_bantuan, jb.kategori, jb.sumber_bantuan, u1.nama as nama_pengaju, u2.nama as nama_verifikator')
            ->join('penerima_bantuan p', 'p.id = pb.penerima_id', 'left')
            ->join('jenis_bantuan jb', 'jb.id = pb.jenis_bantuan_id', 'left')
            ->join('users u1', 'u1.id = pb.diajukan_oleh', 'left')
            ->join('users u2', 'u2.id = pb.diverifikasi_oleh', 'left')
            ->where('pb.id', $id)
            ->get()->getRowArray();
    }

    /**
     * Count by status
     */
    public function countByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }
}
