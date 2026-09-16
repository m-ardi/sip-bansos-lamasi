<?php

namespace App\Controllers;

use App\Models\PengajuanBantuanModel;
use App\Models\PenerimaBantuanModel;
use App\Models\JenisBantuanModel;

class PengajuanBantuan extends BaseController
{
    protected PengajuanBantuanModel $model;

    public function __construct()
    {
        $this->model = new PengajuanBantuanModel();
    }

    public function index()
    {
        $filters = [
            'keyword' => $this->request->getGet('keyword'),
            'status'  => $this->request->getGet('status'),
        ];

        return view('pengajuan/index', [
            'title'     => 'Data Pengajuan Bantuan',
            'pengajuan' => $this->model->getAllWithDetails(array_filter($filters)),
            'filters'   => $filters,
        ]);
    }

    public function create()
    {
        $penerimaModel = new PenerimaBantuanModel();
        $jenisBantuanModel = new JenisBantuanModel();

        return view('pengajuan/form', [
            'title'          => 'Tambah Pengajuan Bantuan',
            'pengajuan'      => null,
            'list_penerima'  => $penerimaModel->select('id, nik, nama_lengkap')->findAll(),
            'list_jenis'     => $jenisBantuanModel->getForDropdown(),
        ]);
    }

    public function store()
    {
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->insert([
            'penerima_id'     => $this->request->getPost('penerima_id'),
            'jenis_bantuan_id'=> $this->request->getPost('jenis_bantuan_id'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'keterangan'      => $this->request->getPost('keterangan'),
            'status'          => 'Menunggu',
            'diajukan_oleh'   => session()->get('user_id'),
        ]);

        return redirect()->to('/pengajuan')->with('success', 'Pengajuan bantuan berhasil diajukan.');
    }

    public function edit(int $id)
    {
        $pengajuan = $this->model->find($id);

        if (!$pengajuan) {
            return redirect()->to('/pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        if ($pengajuan['status'] !== 'Menunggu') {
            return redirect()->to('/pengajuan')->with('error', 'Pengajuan yang sudah diproses tidak dapat diedit.');
        }

        $penerimaModel = new PenerimaBantuanModel();
        $jenisBantuanModel = new JenisBantuanModel();

        return view('pengajuan/form', [
            'title'         => 'Edit Pengajuan Bantuan',
            'pengajuan'     => $pengajuan,
            'list_penerima' => $penerimaModel->select('id, nik, nama_lengkap')->findAll(),
            'list_jenis'    => $jenisBantuanModel->getForDropdown(),
        ]);
    }

    public function update(int $id)
    {
        $pengajuan = $this->model->find($id);

        if (!$pengajuan || $pengajuan['status'] !== 'Menunggu') {
            return redirect()->to('/pengajuan')->with('error', 'Data tidak dapat diubah.');
        }

        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'penerima_id'     => $this->request->getPost('penerima_id'),
            'jenis_bantuan_id'=> $this->request->getPost('jenis_bantuan_id'),
            'tanggal_pengajuan' => $this->request->getPost('tanggal_pengajuan'),
            'keterangan'      => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/pengajuan')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Verifikasi pengajuan (Setujui / Tolak) - hanya admin/lurah
     */
    public function verifikasi(int $id)
    {
        $pengajuan = $this->model->find($id);

        if (!$pengajuan) {
            return redirect()->to('/pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('pengajuan/verifikasi', [
            'title'    => 'Verifikasi Pengajuan',
            'pengajuan'=> $this->model->getDetailById($id),
        ]);
    }

    public function prosesVerifikasi(int $id)
    {
        $status = $this->request->getPost('status');
        $catatan = $this->request->getPost('catatan_verifikasi');

        if (!in_array($status, ['Disetujui', 'Ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $this->model->update($id, [
            'status'             => $status,
            'catatan_verifikasi' => $catatan,
            'diverifikasi_oleh'  => session()->get('user_id'),
        ]);

        return redirect()->to('/pengajuan')->with('success', "Pengajuan berhasil di-{$status}.");
    }

    public function show(int $id)
    {
        $pengajuan = $this->model->getDetailById($id);

        if (!$pengajuan) {
            return redirect()->to('/pengajuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('pengajuan/detail', ['title' => 'Detail Pengajuan', 'pengajuan' => $pengajuan]);
    }

    public function delete(int $id)
    {
        $pengajuan = $this->model->find($id);

        if (!$pengajuan || $pengajuan['status'] !== 'Menunggu') {
            return redirect()->to('/pengajuan')->with('error', 'Data tidak dapat dihapus.');
        }

        $this->model->delete($id);
        return redirect()->to('/pengajuan')->with('success', 'Pengajuan berhasil dihapus.');
    }
}
