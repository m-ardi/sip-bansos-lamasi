<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyaluranBantuanModel extends Model
{
    protected $table            = 'penyaluran_bantuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pengajuan_id', 'tanggal_penyaluran', 'jumlah_bantuan',
        'satuan', 'metode_penyaluran', 'bukti_penyaluran',
        'keterangan', 'status_penyaluran', 'disalurkan_oleh',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'pengajuan_id'     => 'required|integer',
        'tanggal_penyaluran' => 'required|valid_date',
        'jumlah_bantuan'   => 'required|decimal',
        'metode_penyaluran'=> 'required|in_list[Tunai,Transfer,Barang]',
    ];
    protected $skipValidation = false;

    // ---------------------------------------------------------------
    // Custom Methods
    // ---------------------------------------------------------------

    /**
     * Get all penyaluran with full JOIN details
     */
    public function getAllWithDetails(array $filters = []): array
    {
        $builder = $this->db->table('penyaluran_bantuan ps')
            ->select('ps.*, p.nama_lengkap, p.nik, jb.nama_bantuan, jb.kategori, u.nama as nama_petugas')
            ->join('pengajuan_bantuan pg', 'pg.id = ps.pengajuan_id', 'left')
            ->join('penerima_bantuan p', 'p.id = pg.penerima_id', 'left')
            ->join('jenis_bantuan jb', 'jb.id = pg.jenis_bantuan_id', 'left')
            ->join('users u', 'u.id = ps.disalurkan_oleh', 'left');

        if (!empty($filters['keyword'])) {
            $builder->groupStart()
                ->like('p.nama_lengkap', $filters['keyword'])
                ->orLike('p.nik', $filters['keyword'])
                ->orLike('jb.nama_bantuan', $filters['keyword'])
                ->groupEnd();
        }

        if (!empty($filters['bulan'])) {
            $builder->where('MONTH(ps.tanggal_penyaluran)', $filters['bulan']);
        }

        if (!empty($filters['tahun'])) {
            $builder->where('YEAR(ps.tanggal_penyaluran)', $filters['tahun']);
        }

        if (!empty($filters['jenis_bantuan_id'])) {
            $builder->where('pg.jenis_bantuan_id', $filters['jenis_bantuan_id']);
        }

        return $builder->orderBy('ps.tanggal_penyaluran', 'DESC')->get()->getResultArray();
    }

    /**
     * Count penyaluran this month
     */
    public function countThisMonth(): int
    {
        return $this->where('MONTH(tanggal_penyaluran)', date('m'))
                    ->where('YEAR(tanggal_penyaluran)', date('Y'))
                    ->countAllResults();
    }

    /**
     * Get total value distributed
     */
    public function getTotalValue(): float
    {
        $result = $this->selectSum('jumlah_bantuan', 'total')->where('status_penyaluran', 'Tersalurkan')->first();
        return $result ? (float)$result['total'] : 0;
    }
}
