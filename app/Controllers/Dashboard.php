<?php

namespace App\Controllers;

use App\Models\PenerimaBantuanModel;
use App\Models\PengajuanBantuanModel;
use App\Models\PenyaluranBantuanModel;
use App\Models\JenisBantuanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $penerimaModel   = new PenerimaBantuanModel();
        $pengajuanModel  = new PengajuanBantuanModel();
        $penyaluranModel = new PenyaluranBantuanModel();
        $jenisBantuanModel = new JenisBantuanModel();

        $data = [
            'title'              => 'Dashboard - SIP Bansos Kelurahan Lamasi',
            'total_penerima'     => $penerimaModel->countAll(),
            'penerima_aktif'     => $penerimaModel->countAktif(),
            'pengajuan_pending'  => $pengajuanModel->countByStatus('Menunggu'),
            'pengajuan_disetujui'=> $pengajuanModel->countByStatus('Disetujui'),
            'pengajuan_ditolak'  => $pengajuanModel->countByStatus('Ditolak'),
            'penyaluran_bulan_ini' => $penyaluranModel->countThisMonth(),
            'total_jenis_bantuan'=> $jenisBantuanModel->countAll(),
            'total_anggaran'     => $penyaluranModel->getTotalValue(),
            'pengajuan_terbaru'  => $pengajuanModel->getAllWithDetails(['limit' => 5]),
            'penyaluran_terbaru' => $penyaluranModel->getAllWithDetails(['limit' => 5]),
        ];

        return view('dashboard/index', $data);
    }
}
