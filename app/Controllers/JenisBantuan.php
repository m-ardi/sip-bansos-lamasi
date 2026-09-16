<?php

namespace App\Controllers;

use App\Models\JenisBantuanModel;

class JenisBantuan extends BaseController
{
    protected JenisBantuanModel $model;

    public function __construct()
    {
        $this->model = new JenisBantuanModel();
    }

    public function index()
    {
        return view('jenis_bantuan/index', [
            'title'       => 'Data Jenis Bantuan',
            'jenis_bantuan' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('jenis_bantuan/form', ['title' => 'Tambah Jenis Bantuan', 'jenis' => null]);
    }

    public function store()
    {
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->insert([
            'nama_bantuan'  => $this->request->getPost('nama_bantuan'),
            'kategori'      => $this->request->getPost('kategori'),
            'sumber_bantuan'=> $this->request->getPost('sumber_bantuan'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/jenis-bantuan')->with('success', 'Jenis bantuan berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $jenis = $this->model->find($id);

        if (!$jenis) {
            return redirect()->to('/jenis-bantuan')->with('error', 'Data tidak ditemukan.');
        }

        return view('jenis_bantuan/form', ['title' => 'Edit Jenis Bantuan', 'jenis' => $jenis]);
    }

    public function update(int $id)
    {
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'nama_bantuan'  => $this->request->getPost('nama_bantuan'),
            'kategori'      => $this->request->getPost('kategori'),
            'sumber_bantuan'=> $this->request->getPost('sumber_bantuan'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/jenis-bantuan')->with('success', 'Jenis bantuan berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $jenis = $this->model->find($id);

        if (!$jenis) {
            return redirect()->to('/jenis-bantuan')->with('error', 'Data tidak ditemukan.');
        }

        $this->model->delete($id);
        return redirect()->to('/jenis-bantuan')->with('success', 'Jenis bantuan berhasil dihapus.');
    }
}
