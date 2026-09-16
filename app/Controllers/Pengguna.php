<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pengguna extends BaseController
{
    protected UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        return view('pengguna/index', [
            'title'    => 'Manajemen Pengguna',
            'pengguna' => $this->model->getAllUsers(),
        ]);
    }

    public function create()
    {
        return view('pengguna/form', ['title' => 'Tambah Pengguna', 'pengguna' => null]);
    }

    public function store()
    {
        $rules = [
            'nama'     => 'required|min_length[3]|max_length[100]',
            'username' => 'required|min_length[5]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'role'     => 'required|in_list[admin,petugas,lurah]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->insert([
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $pengguna = $this->model->find($id);

        if (!$pengguna) {
            return redirect()->to('/pengguna')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('pengguna/form', ['title' => 'Edit Pengguna', 'pengguna' => $pengguna]);
    }

    public function update(int $id)
    {
        $rules = [
            'nama'     => 'required|min_length[3]|max_length[100]',
            'username' => "required|min_length[5]|max_length[50]|is_unique[users.username,id,{$id}]",
            'role'     => 'required|in_list[admin,petugas,lurah]',
        ];

        if (!empty($this->request->getPost('password'))) {
            $rules['password'] = 'min_length[8]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'role'     => $this->request->getPost('role'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $this->model->update($id, $updateData);
        return redirect()->to('/pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        // Prevent deleting own account
        if ($id === (int) session()->get('user_id')) {
            return redirect()->to('/pengguna')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $pengguna = $this->model->find($id);

        if (!$pengguna) {
            return redirect()->to('/pengguna')->with('error', 'Pengguna tidak ditemukan.');
        }

        $this->model->delete($id);
        return redirect()->to('/pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
