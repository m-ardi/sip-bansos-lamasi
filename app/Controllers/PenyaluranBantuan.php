<?php

namespace App\Controllers;

use App\Models\PenyaluranBantuanModel;
use App\Models\PengajuanBantuanModel;

class PenyaluranBantuan extends BaseController
{
    protected PenyaluranBantuanModel $model;

    public function __construct()
    {
        $this->model = new PenyaluranBantuanModel();
    }

    public function index()
    {
        $filters = [
            'keyword'        => $this->request->getGet('keyword'),
            'bulan'          => $this->request->getGet('bulan'),
            'tahun'          => $this->request->getGet('tahun'),
            'jenis_bantuan_id' => $this->request->getGet('jenis_bantuan_id'),
        ];

        return view('penyaluran/index', [
            'title'      => 'Data Penyaluran Bantuan',
            'penyaluran' => $this->model->getAllWithDetails(array_filter($filters)),
            'filters'    => $filters,
        ]);
    }

    public function create()
    {
        $pengajuanModel = new PengajuanBantuanModel();

        // Only show approved pengajuan that haven't been distributed yet
        $pengajuanDisetujui = $pengajuanModel->db->table('pengajuan_bantuan pb')
            ->select('pb.id, p.nama_lengkap, p.nik, jb.nama_bantuan')
            ->join('penerima_bantuan p', 'p.id = pb.penerima_id', 'left')
            ->join('jenis_bantuan jb', 'jb.id = pb.jenis_bantuan_id', 'left')
            ->where('pb.status', 'Disetujui')
            ->whereNotIn('pb.id', function($builder) {
                $builder->select('pengajuan_id')->from('penyaluran_bantuan');
            })
            ->get()->getResultArray();

        return view('penyaluran/form', [
            'title'              => 'Tambah Data Penyaluran',
            'penyaluran'         => null,
            'pengajuan_disetujui'=> $pengajuanDisetujui,
        ]);
    }

    public function store()
    {
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file   = $this->request->getFile('bukti_penyaluran');
        $bukti  = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/bukti/', $newName);
            $bukti = $newName;
        }

        $this->model->insert([
            'pengajuan_id'      => $this->request->getPost('pengajuan_id'),
            'tanggal_penyaluran'=> $this->request->getPost('tanggal_penyaluran'),
            'jumlah_bantuan'    => $this->request->getPost('jumlah_bantuan'),
            'satuan'            => $this->request->getPost('satuan'),
            'metode_penyaluran' => $this->request->getPost('metode_penyaluran'),
            'bukti_penyaluran'  => $bukti,
            'keterangan'        => $this->request->getPost('keterangan'),
            'status_penyaluran' => 'Tersalurkan',
            'disalurkan_oleh'   => session()->get('user_id'),
        ]);

        return redirect()->to('/penyaluran')->with('success', 'Data penyaluran berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $penyaluran = $this->model->getAllWithDetails(['id' => $id]);

        if (!$penyaluran) {
            return redirect()->to('/penyaluran')->with('error', 'Data tidak ditemukan.');
        }

        return view('penyaluran/detail', ['title' => 'Detail Penyaluran', 'penyaluran' => $penyaluran[0] ?? []]);
    }

    public function delete(int $id)
    {
        $penyaluran = $this->model->find($id);

        if (!$penyaluran) {
            return redirect()->to('/penyaluran')->with('error', 'Data tidak ditemukan.');
        }

        if ($penyaluran['bukti_penyaluran'] && file_exists(FCPATH . 'uploads/bukti/' . $penyaluran['bukti_penyaluran'])) {
            unlink(FCPATH . 'uploads/bukti/' . $penyaluran['bukti_penyaluran']);
        }

        $this->model->delete($id);
        return redirect()->to('/penyaluran')->with('success', 'Data penyaluran berhasil dihapus.');
    }
}
