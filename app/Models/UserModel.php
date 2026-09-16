<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'username', 'password', 'role'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules      = [
        'nama'     => 'required|min_length[3]|max_length[100]',
        'username' => 'required|min_length[5]|max_length[50]|is_unique[users.username,id,{id}]',
        'role'     => 'required|in_list[admin,petugas,lurah]',
    ];
    protected $validationMessages   = [
        'username' => ['is_unique' => 'Username sudah digunakan.'],
    ];
    protected $skipValidation       = false;

    // ---------------------------------------------------------------
    // Custom Methods
    // ---------------------------------------------------------------

    /**
     * Find a user by username for authentication
     */
    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Get users list excluding passwords
     */
    public function getAllUsers(): array
    {
        return $this->select('id, nama, username, role, created_at, updated_at')->findAll();
    }
}
