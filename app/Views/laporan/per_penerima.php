<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-md">
    <!-- Toolbar Preview Controls (Hidden on Print) -->
    <div class="bg-surface-card px-space-md py-space-sm rounded-xl shadow-sm border border-border-default flex flex-wrap items-center justify-between gap-space-sm no-print">
        <div class="flex items-center gap-space-sm text-text-secondary font-label-md text-label-md">
            <span class="material-symbols-outlined text-primary text-[22px]">contact_page</span>
            <div>
                <span class="text-text-primary font-bold block">Pratinjau Laporan Data Induk Penerima Bansos</span>
                <span class="text-text-muted font-body-sm text-[12px]">Format Dokumen Registrasi Warga • Siap Cetak Fisik A4</span>
            </div>
        </div>
        <div class="flex items-center gap-1.5 sm:gap-2">
            <button onclick="window.print()" type="button"
                    class="inline-flex items-center gap-1.5 bg-primary hover:bg-primary-container text-on-primary px-3 sm:px-4 py-1.5 rounded font-label-md text-xs sm:text-sm shadow-xs transition-colors cursor-pointer"
                    title="Cetak Dokumen">
                <span class="material-symbols-outlined text-[16px]">print</span>
                <span class="hidden sm:inline">Cetak Dokumen</span>
            </button>
            <a href="<?= base_url('laporan') ?>"
               class="inline-flex items-center gap-1 bg-surface-subtle hover:bg-surface-card text-text-secondary px-2.5 sm:px-3 py-1.5 rounded font-label-md text-xs sm:text-sm transition-colors border border-border-default ml-1"
               title="Kembali">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                <span class="hidden sm:inline">Kembali</span>
            </a>
        </div>
    </div>

    <!-- A4 Paper Visual Sheet Container -->
    <div class="bg-surface-subtle/50 border border-border-default p-space-md md:p-space-xl rounded-xl shadow-sm flex justify-center overflow-x-auto print:border-none print:p-0 print:bg-white">
        <div class="bg-surface-card text-text-primary w-full max-w-[860px] shadow-lg rounded-lg p-8 md:p-12 transition-all select-none border border-border-default print:border-none print:shadow-none print:p-0">
            <!-- Kop Surat Resmi -->
            <div class="flex items-center justify-between gap-space-md pb-space-sm text-center relative">
                <div class="w-20 h-24 shrink-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-[56px]">account_balance</span>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center">
                    <h3 class="font-label-lg text-[14px] uppercase tracking-wider text-text-primary leading-tight font-bold">PEMERINTAH KABUPATEN LUWU</h3>
                    <h2 class="font-headline-md text-[18px] uppercase tracking-wide text-text-primary font-bold leading-tight mt-0.5">KECAMATAN LAMASI</h2>
                    <h1 class="font-headline-lg text-[22px] uppercase tracking-widest text-primary font-black leading-tight mt-0.5">KANTOR KELURAHAN LAMASI</h1>
                    <p class="font-body-sm text-[11px] text-text-secondary mt-1 leading-snug">
                        Alamat: Jl. Trans Sulawesi No. 45, Lamasi, Kab. Luwu, Sulawesi Selatan 91952<br/>
                        Laman Resmi: kelurahan-lamasi.luwukab.go.id &bull; Pos-el: info@lamasi.desa.id
                    </p>
                </div>
                <div class="w-20 h-24 shrink-0 flex flex-col items-center justify-center">
                    <div class="w-16 h-16 rounded-full bg-surface-subtle flex flex-col items-center justify-center text-center p-1 border border-border-default">
                        <span class="material-symbols-outlined text-primary text-[20px]">policy</span>
                        <span class="font-label-sm text-[8px] uppercase text-text-muted leading-tight mt-0.5 font-bold">RESMI</span>
                    </div>
                </div>
            </div>

            <!-- Double Horizontal Rule -->
            <div class="w-full mt-1 mb-space-md">
                <div class="w-full h-[3px] bg-text-primary"></div>
                <div class="w-full h-[1px] bg-text-primary mt-0.5"></div>
            </div>

            <!-- Document Title -->
            <div class="text-center my-space-md">
                <h4 class="font-label-lg text-label-lg uppercase tracking-wide text-text-primary font-bold">DAFTAR INDUK PENERIMA BANTUAN SOSIAL (KPM)</h4>
                <p class="font-label-sm text-label-sm uppercase tracking-wider text-text-secondary mt-0.5">
                    WILAYAH ADMINISTRASI KELURAHAN LAMASI &bull; TAHUN <?= date('Y') ?>
                </p>
                <p class="font-code-tabular text-code-tabular text-text-muted mt-1 text-[12px]">
                    Nomor Register Berkas: 460 / <?= count($penerima) ?> / KEL-LMS / <?= date('m') ?> / <?= date('Y') ?>
                </p>
            </div>

            <div class="mb-space-md text-justify font-body-sm text-body-sm text-text-secondary leading-relaxed">
                Berikut adalah rekapitulasi data penduduk yang terdaftar dalam basis data penetapan sasaran Keluarga Penerima Manfaat (KPM) program bantuan sosial pada Kantor Kelurahan Lamasi:
            </div>

            <!-- Table Penerima -->
            <div class="overflow-hidden rounded border border-border-default mb-space-lg">
                <table class="w-full text-left font-body-sm text-body-sm">
                    <thead class="bg-surface-subtle text-text-primary uppercase font-label-sm text-[11px] tracking-wider border-b border-border-default">
                        <tr>
                            <th class="py-2.5 px-3 text-center w-10">No</th>
                            <th class="py-2.5 px-3">NIK</th>
                            <th class="py-2.5 px-3">Nama Lengkap</th>
                            <th class="py-2.5 px-2 text-center">JK</th>
                            <th class="py-2.5 px-3">Alamat / RT-RW</th>
                            <th class="py-2.5 px-3">Kategori</th>
                            <th class="py-2.5 px-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-default font-body-sm text-[12px]">
                        <?php if (empty($penerima)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-6 text-text-muted">
                                Tidak ada data penerima bantuan yang tersedia.
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($penerima as $i => $p): ?>
                        <tr class="hover:bg-surface-canvas/50">
                            <td class="py-2.5 px-3 text-center text-text-muted font-code-tabular"><?= $i + 1 ?></td>
                            <td class="py-2.5 px-3 font-code-tabular font-medium text-text-primary">
                                <?= esc($p['nik']) ?>
                            </td>
                            <td class="py-2.5 px-3 font-medium text-text-primary">
                                <?= esc($p['nama_lengkap']) ?>
                            </td>
                            <td class="py-2.5 px-2 text-center text-text-secondary font-medium">
                                <?= esc($p['jenis_kelamin']) ?>
                            </td>
                            <td class="py-2.5 px-3 text-text-secondary">
                                <?= esc($p['alamat']) ?>, RT <?= esc($p['rt'] ?? '-') ?>/RW <?= esc($p['rw'] ?? '-') ?>
                            </td>
                            <td class="py-2.5 px-3">
                                <span class="font-medium text-text-primary"><?= esc($p['kategori_miskin'] ?? '-') ?></span>
                            </td>
                            <td class="py-2.5 px-3 text-center">
                                <?php if (($p['status_aktif'] ?? 'Aktif') === 'Aktif'): ?>
                                <span class="text-status-success-text font-semibold">Aktif</span>
                                <?php else: ?>
                                <span class="text-status-danger-text font-semibold">Non-Aktif</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Total Summary Info Box -->
            <div class="bg-surface-canvas p-space-sm rounded border border-border-default mb-space-xl flex flex-wrap items-center justify-between text-text-secondary font-body-sm text-[12px]">
                <div>
                    <span>Total Terdaftar: <strong class="text-text-primary font-bold"><?= count($penerima) ?></strong> KPM</span>
                </div>
                <div class="flex items-center gap-space-md">
                    <span>Dicetak oleh: <strong class="text-text-primary font-medium"><?= esc(session('nama_lengkap') ?? 'Operator Bansos') ?></strong></span>
                    <span>Waktu Akses: <strong class="text-text-primary font-medium"><?= date('d/m/Y H:i') ?> WITA</strong></span>
                </div>
            </div>

            <!-- Tanda Tangan & Pengesahan -->
            <div class="flex justify-between items-start pt-space-md break-inside-avoid">
                <div class="flex flex-col items-center text-center w-56">
                    <span class="font-body-sm text-[12px] text-text-muted">Mengetahui,</span>
                    <span class="font-label-md text-label-md font-semibold text-text-primary mt-0.5">Sekretaris Kelurahan Lamasi</span>
                    <div class="h-20 flex items-center justify-center">
                        <span class="font-code-tabular text-[10px] text-text-muted italic">[ Tanda Tangan Digital ]</span>
                    </div>
                    <span class="font-label-md text-label-md font-bold text-text-primary underline">HERMANSYAH, S.Sos.</span>
                    <span class="font-code-tabular text-code-tabular text-[11px] text-text-muted">NIP. 19820412 200801 1 015</span>
                </div>

                <div class="flex flex-col items-center text-center w-56">
                    <span class="font-body-sm text-[12px] text-text-muted">Lamasi, <?= date('d F Y') ?></span>
                    <span class="font-label-md text-label-md font-semibold text-text-primary mt-0.5">Lurah Lamasi</span>
                    <div class="h-20 flex items-center justify-center relative">
                        <!-- Digital Official Stamp Effect -->
                        <div class="absolute border-2 border-dashed border-status-success-border/60 text-status-success-text rounded-full w-16 h-16 flex flex-col items-center justify-center -rotate-12 opacity-80 pointer-events-none">
                            <span class="text-[7px] font-bold uppercase tracking-widest">KELURAHAN</span>
                            <span class="text-[9px] font-black">LAMASI</span>
                            <span class="text-[6px] font-semibold">TERVALIDASI</span>
                        </div>
                        <span class="font-code-tabular text-[10px] text-text-muted italic">[ Tanda Tangan Resmi ]</span>
                    </div>
                    <span class="font-label-md text-label-md font-bold text-text-primary underline">ANDI BASO S., S.STP, M.Si.</span>
                    <span class="font-code-tabular text-code-tabular text-[11px] text-text-muted">NIP. 19780516 200112 1 002</span>
                </div>
            </div>

            <!-- Lembar Verifikasi Barcode Digital -->
            <div class="mt-space-xl pt-space-md border-t border-border-default/60 flex items-center justify-between text-text-muted text-[10px] font-code-tabular">
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-[16px]">qr_code_2</span>
                    <span>ID Berkas: LMS-DOC-<?= date('Ymd') ?>-KPM-<?= str_pad(count($penerima), 4, '0', STR_PAD_LEFT) ?></span>
                </div>
                <span>Dokumen Sah Administrasi Penyaluran Bantuan Sosial Kelurahan Lamasi</span>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    aside, header, .no-print, .dt-buttons {
        display: none !important;
    }
    .pl-64 {
        padding-left: 0 !important;
    }
    main {
        padding-top: 0 !important;
        background: #ffffff !important;
    }
    body {
        background: #ffffff !important;
        font-size: 11pt !important;
    }
    @page {
        size: A4 portrait;
        margin: 15mm;
    }
}
</style>

<?= $this->endSection() ?>
