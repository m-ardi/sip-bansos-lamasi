<?php

namespace App\Controllers;

use App\Models\PenerimaBantuanModel;

class PenerimaBantuan extends BaseController
{
    protected PenerimaBantuanModel $model;

    public function __construct()
    {
        $this->model = new PenerimaBantuanModel();
    }

    public function index()
    {
        $filters = [
            'keyword'       => $this->request->getGet('keyword'),
            'status_aktif'  => $this->request->getGet('status_aktif'),
            'kategori_miskin' => $this->request->getGet('kategori_miskin'),
        ];

        $data = [
            'title'    => 'Data Penerima Bantuan',
            'penerima' => $this->model->getWithFilter(array_filter($filters)),
            'filters'  => $filters,
        ];

        return view('penerima/index', $data);
    }

    public function create()
    {
        return view('penerima/form', ['title' => 'Tambah Penerima Bantuan', 'penerima' => null]);
    }

    public function store()
    {
        $rules = $this->model->validationRules;

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file    = $this->request->getFile('foto_ktp');
        $fotoKtp = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/ktp/', $newName);
            $fotoKtp = $newName;
        }

        $this->model->insert([
            'nik'            => $this->request->getPost('nik'),
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'alamat'         => $this->request->getPost('alamat'),
            'rt'             => $this->request->getPost('rt'),
            'rw'             => $this->request->getPost('rw'),
            'kelurahan'      => $this->request->getPost('kelurahan'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'kabupaten'      => $this->request->getPost('kabupaten'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'foto_ktp'       => $fotoKtp,
            'kategori_miskin'=> $this->request->getPost('kategori_miskin'),
            'status_aktif'   => $this->request->getPost('status_aktif') ?? 'Aktif',
        ]);

        return redirect()->to('/penerima')->with('success', 'Data penerima berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $penerima = $this->model->find($id);

        if (!$penerima) {
            return redirect()->to('/penerima')->with('error', 'Data tidak ditemukan.');
        }

        return view('penerima/form', ['title' => 'Edit Penerima Bantuan', 'penerima' => $penerima]);
    }

    public function update(int $id)
    {
        $penerima = $this->model->find($id);

        if (!$penerima) {
            return redirect()->to('/penerima')->with('error', 'Data tidak ditemukan.');
        }

        // Temporarily skip NIK unique check for this ID
        $this->model->skipValidation(false);
        $rules = $this->model->validationRules;
        $rules['nik'] = "required|exact_length[16]|numeric|is_unique[penerima_bantuan.nik,id,{$id}]";

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file    = $this->request->getFile('foto_ktp');
        $fotoKtp = $penerima['foto_ktp'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old photo
            if ($fotoKtp && file_exists(FCPATH . 'uploads/ktp/' . $fotoKtp)) {
                unlink(FCPATH . 'uploads/ktp/' . $fotoKtp);
            }
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/ktp/', $newName);
            $fotoKtp = $newName;
        }

        $this->model->update($id, [
            'nik'            => $this->request->getPost('nik'),
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'alamat'         => $this->request->getPost('alamat'),
            'rt'             => $this->request->getPost('rt'),
            'rw'             => $this->request->getPost('rw'),
            'kelurahan'      => $this->request->getPost('kelurahan'),
            'kecamatan'      => $this->request->getPost('kecamatan'),
            'kabupaten'      => $this->request->getPost('kabupaten'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'foto_ktp'       => $fotoKtp,
            'kategori_miskin'=> $this->request->getPost('kategori_miskin'),
            'status_aktif'   => $this->request->getPost('status_aktif'),
        ]);

        return redirect()->to('/penerima')->with('success', 'Data penerima berhasil diperbarui.');
    }

    public function show(int $id)
    {
        $penerima = $this->model->find($id);

        if (!$penerima) {
            return redirect()->to('/penerima')->with('error', 'Data tidak ditemukan.');
        }

        return view('penerima/detail', ['title' => 'Detail Penerima', 'penerima' => $penerima]);
    }

    public function delete(int $id)
    {
        $penerima = $this->model->find($id);

        if (!$penerima) {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        // Delete photo if exists
        if ($penerima['foto_ktp'] && file_exists(FCPATH . 'uploads/ktp/' . $penerima['foto_ktp'])) {
            unlink(FCPATH . 'uploads/ktp/' . $penerima['foto_ktp']);
        }

        $this->model->delete($id);

        return redirect()->to('/penerima')->with('success', 'Data penerima berhasil dihapus.');
    }
}
