<?php

namespace App\Controllers;

use App\Models\PenyaluranBantuanModel;
use App\Models\PengajuanBantuanModel;
use App\Models\PenerimaBantuanModel;
use App\Models\JenisBantuanModel;

class Laporan extends BaseController
{
    public function index()
    {
        $jenisBantuanModel = new JenisBantuanModel();
        return view('laporan/index', [
            'title'      => 'Laporan Bantuan Sosial',
            'list_jenis' => $jenisBantuanModel->findAll(),
        ]);
    }

    /**
     * Generate & display laporan (view/cetak)
     */
    public function cetak()
    {
        $filters = [
            'bulan'          => $this->request->getGet('bulan'),
            'tahun'          => $this->request->getGet('tahun'),
            'jenis_bantuan_id' => $this->request->getGet('jenis_bantuan_id'),
        ];

        $penyaluranModel = new PenyaluranBantuanModel();
        $jenisBantuanModel = new JenisBantuanModel();

        $data = $penyaluranModel->getAllWithDetails(array_filter($filters));

        $jenis = null;
        if (!empty($filters['jenis_bantuan_id'])) {
            $jenis = $jenisBantuanModel->find($filters['jenis_bantuan_id']);
        }

        return view('laporan/cetak', [
            'title'    => 'Laporan Penyaluran Bantuan',
            'data'     => $data,
            'filters'  => $filters,
            'jenis'    => $jenis,
            'bulan_list' => $this->getBulanList(),
        ]);
    }

    /**
     * Export ke Excel menggunakan PhpSpreadsheet
     */
    public function exportExcel()
    {
        $filters = [
            'bulan'          => $this->request->getGet('bulan'),
            'tahun'          => $this->request->getGet('tahun'),
            'jenis_bantuan_id' => $this->request->getGet('jenis_bantuan_id'),
        ];

        $penyaluranModel = new PenyaluranBantuanModel();
        $data = $penyaluranModel->getAllWithDetails(array_filter($filters));

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Penyaluran');

        // ---- HEADER STYLE ----
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '1B4F72']],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ];

        // ---- JUDUL ----
        $sheet->mergeCells('A1:I1');
        $sheet->setCellValue('A1', 'LAPORAN PENYALURAN BANTUAN SOSIAL');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('A2:I2');
        $sheet->setCellValue('A2', 'Kelurahan Lamasi - Kabupaten Luwu');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // ---- KOLOM HEADER ----
        $headers = ['No', 'Tanggal', 'NIK', 'Nama Penerima', 'Jenis Bantuan', 'Jumlah', 'Satuan', 'Metode', 'Status'];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '4', $header);
            $sheet->getStyle($col . '4')->applyFromArray($headerStyle);
            $col++;
        }

        // ---- DATA ----
        $row = 5;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item['tanggal_penyaluran']);
            $sheet->setCellValue('C' . $row, $item['nik']);
            $sheet->setCellValue('D' . $row, $item['nama_lengkap']);
            $sheet->setCellValue('E' . $row, $item['nama_bantuan']);
            $sheet->setCellValue('F' . $row, $item['jumlah_bantuan']);
            $sheet->setCellValue('G' . $row, $item['satuan']);
            $sheet->setCellValue('H' . $row, $item['metode_penyaluran']);
            $sheet->setCellValue('I' . $row, $item['status_penyaluran']);
            $row++;
        }

        // ---- AUTO WIDTH ----
        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // ---- OUTPUT ----
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Laporan_Penyaluran_Bansos_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    /**
     * Laporan per penerima
     */
    public function perPenerima()
    {
        $penerimaModel = new PenerimaBantuanModel();

        return view('laporan/per_penerima', [
            'title'    => 'Laporan Per Penerima',
            'penerima' => $penerimaModel->findAll(),
        ]);
    }

    // ---------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------
    private function getBulanList(): array
    {
        return [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
    }
}
