<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    /**
     * Halaman Utama Landing Page Kelurahan Lamasi
     */
    public function index(): string
    {
        $data = [
            'title'      => 'Kelurahan Lamasi — Kabupaten Luwu',
            'activeMenu' => 'beranda',
        ];

        return view('publik/beranda', $data);
    }

    /**
     * Halaman Profil Wilayah & Tata Kelola
     */
    public function profil(): string
    {
        $data = [
            'title'      => 'Profil Wilayah & Tata Kelola — Kelurahan Lamasi',
            'activeMenu' => 'profil',
        ];

        return view('publik/profil', $data);
    }

    /**
     * Halaman Statistik & Data Kependudukan
     */
    public function kependudukan(): string
    {
        $data = [
            'title'      => 'Data & Statistik Kependudukan — Kelurahan Lamasi',
            'activeMenu' => 'kependudukan',
        ];

        return view('publik/kependudukan', $data);
    }

    /**
     * Halaman Fasilitas & Sarana Pendidikan
     */
    public function pendidikan(): string
    {
        $data = [
            'title'      => 'Sarana & Fasilitas Pendidikan — Kelurahan Lamasi',
            'activeMenu' => 'pendidikan',
        ];

        return view('publik/pendidikan', $data);
    }

    /**
     * Halaman Layanan & Pos Kesehatan Warga
     */
    public function kesehatan(): string
    {
        $data = [
            'title'      => 'Fasilitas & Layanan Kesehatan — Kelurahan Lamasi',
            'activeMenu' => 'kesehatan',
        ];

        return view('publik/kesehatan', $data);
    }

    /**
     * Halaman Potensi Pertanian & Lumbung Pangan
     */
    public function pertanian(): string
    {
        $data = [
            'title'      => 'Potensi Pertanian & Ketahanan Pangan — Kelurahan Lamasi',
            'activeMenu' => 'pertanian',
        ];

        return view('publik/pertanian', $data);
    }
}
