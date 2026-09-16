<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-md">
    <!-- Toolbar Preview Controls (Hidden on Print) -->
    <div class="bg-surface-card px-space-md py-space-sm rounded-xl shadow-sm border border-border-default flex flex-wrap items-center justify-between gap-space-sm no-print">
        <div class="flex items-center gap-space-sm text-text-secondary font-label-md text-label-md">
            <span class="material-symbols-outlined text-primary text-[22px]">description</span>
            <div>
                <span class="text-text-primary font-bold block">Pratinjau Lembar Dokumen Resmi</span>
                <span class="text-text-muted font-body-sm text-[12px]">Format Standar Portret • Siap Cetak &amp; Berstempel Digital</span>
            </div>
        </div>
        <div class="flex items-center gap-1.5 sm:gap-2">
            <a href="<?= base_url('laporan/export-excel?' . http_build_query(array_filter($filters))) ?>"
               class="inline-flex items-center gap-1.5 bg-surface-subtle hover:bg-surface-canvas text-status-success-text px-2.5 sm:px-3 py-1.5 rounded font-label-md text-xs sm:text-sm transition-colors border border-border-default"
               title="Export Excel">
                <span class="material-symbols-outlined text-[16px]">table_chart</span>
                <span class="hidden sm:inline">Export Excel</span>
            </a>
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
        <div class="bg-surface-card text-text-primary w-full max-w-[840px] shadow-lg rounded-lg p-8 md:p-12 transition-all select-none border border-border-default print:border-none print:shadow-none print:p-0">
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
                <h4 class="font-label-lg text-label-lg uppercase tracking-wide text-text-primary font-bold">LAPORAN REALISASI PENYALURAN BANTUAN SOSIAL</h4>
                <p class="font-label-sm text-label-sm uppercase tracking-wider text-text-secondary mt-0.5">
                    TAHUN ANGGARAN <?= $filters['tahun'] ?? date('Y') ?>
                    <?php if (!empty($filters['bulan'])): ?> &bull; PERIODE <?= strtoupper(date('F', mktime(0,0,0,$filters['bulan'],1))) ?><?php endif; ?>
                    <?php if (!empty($jenis)): ?> &bull; <?= strtoupper(esc($jenis['nama_bantuan'])) ?><?php endif; ?>
                </p>
                <p class="font-code-tabular text-code-tabular text-text-muted mt-1 text-[12px]">
                    Nomor Register Berkas: 460 / 142 / KEL-LMS / <?= !empty($filters['bulan']) ? sprintf('%02d', $filters['bulan']) : date('m') ?> / <?= $filters['tahun'] ?? date('Y') ?>
                </p>
            </div>

            <div class="mb-space-md text-justify font-body-sm text-body-sm text-text-secondary leading-relaxed">
                Berdasarkan arsip administrasi penatausahaan jaring pengaman sosial, berikut disampaikan rekapitulasi data realisasi penyaluran bantuan sosial kepada Keluarga Penerima Manfaat (KPM) di wilayah Kelurahan Lamasi, Kecamatan Lamasi, Kabupaten Luwu:
            </div>

            <!-- Table Penyaluran -->
            <div class="overflow-hidden rounded border border-border-default mb-space-lg">
                <table class="w-full text-left font-body-sm text-body-sm">
                    <thead class="bg-surface-subtle text-text-primary uppercase font-label-sm text-[11px] tracking-wider border-b border-border-default">
                        <tr>
                            <th class="py-2.5 px-3 text-center w-10">No</th>
                            <th class="py-2.5 px-3">Tanggal</th>
                            <th class="py-2.5 px-3">NIK</th>
                            <th class="py-2.5 px-3">Nama Penerima</th>
                            <th class="py-2.5 px-3">Program Bantuan</th>
                            <th class="py-2.5 px-3">Metode</th>
                            <th class="py-2.5 px-3 text-right">Realisasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-default font-body-sm text-[12px]">
                        <?php if (empty($data)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-6 text-text-muted">
                                Tidak ada data penyaluran bantuan untuk filter yang dipilih.
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($data as $i => $d): ?>
                        <tr class="hover:bg-surface-subtle/50">
                            <td class="py-2 px-3 text-center font-code-tabular text-text-muted"><?= $i + 1 ?></td>
                            <td class="py-2 px-3 font-code-tabular"><?= date('d/m/Y', strtotime($d['tanggal_penyaluran'])) ?></td>
                            <td class="py-2 px-3 font-code-tabular"><code><?= esc($d['nik']) ?></code></td>
                            <td class="py-2 px-3 font-medium"><?= esc($d['nama_lengkap']) ?></td>
                            <td class="py-2 px-3"><?= esc($d['nama_bantuan']) ?></td>
                            <td class="py-2 px-3"><?= esc($d['metode_penyaluran']) ?></td>
                            <td class="py-2 px-3 text-right font-code-tabular font-semibold">
                                Rp <?= number_format($d['jumlah_bantuan'], 0, ',', '.') ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot class="bg-surface-subtle font-label-md text-text-primary border-t border-border-default">
                        <tr>
                            <td class="py-2.5 px-3 text-center uppercase tracking-wider font-bold" colspan="6">TOTAL REALISASI ANGGARAN</td>
                            <td class="py-2.5 px-3 text-right font-code-tabular font-bold text-primary">
                                Rp <?= number_format(array_sum(array_column($data, 'jumlah_bantuan')), 0, ',', '.') ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Signatures Section -->
            <div class="grid grid-cols-2 gap-space-xl pt-space-md items-end">
                <div class="flex flex-col items-center text-center">
                    <span class="font-body-sm text-body-sm text-text-secondary">Petugas Operator BANSOS,</span>
                    <div class="h-20 flex items-center justify-center my-1">
                        <span class="text-text-muted italic font-body-sm text-[12px]">[Tanda Tangan Digital BSrE]</span>
                    </div>
                    <span class="font-label-md text-label-md text-text-primary underline font-bold uppercase">
                        <?= esc(session('nama') ?? 'Operator Bansos') ?>
                    </span>
                    <span class="font-code-tabular text-[11px] text-text-muted mt-0.5">Kelurahan Lamasi</span>
                </div>

                <div class="flex flex-col items-center text-center relative">
                    <span class="font-body-sm text-body-sm text-text-secondary">
                        Lamasi, <?= date('d F Y') ?><br/>
                        Mengetahui, <strong class="text-text-primary">Kepala Kelurahan Lamasi</strong>
                    </span>
                    <div class="h-24 w-full relative flex items-center justify-center my-1">
                        <!-- Official Stamp -->
                        <div class="absolute left-6 w-24 h-24 rounded-full border-2 border-dashed border-status-danger-text/60 flex flex-col items-center justify-center text-status-danger-text/80 rotate-[-12deg] pointer-events-none p-1 shadow-sm">
                            <span class="font-label-sm text-[7px] uppercase tracking-wider font-black">KABUPATEN LUWU</span>
                            <span class="material-symbols-outlined text-[20px] my-0.5">verified</span>
                            <span class="font-label-sm text-[7px] uppercase tracking-wider font-black">KELURAHAN LAMASI</span>
                        </div>
                        <svg class="h-16 w-40 text-primary z-10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewbox="0 0 200 80">
                            <path d="M 20 50 Q 50 10, 80 45 T 120 40 Q 140 20, 160 55 T 180 30"></path>
                            <path d="M 60 45 C 75 75, 110 70, 130 50"></path>
                            <path d="M 40 35 L 150 35" stroke-width="1.5"></path>
                        </svg>
                    </div>
                    <span class="font-label-lg text-label-lg text-text-primary underline font-bold uppercase tracking-wide">H. M. NASIR SYAM, S.Sos., M.Si.</span>
                    <span class="font-code-tabular text-code-tabular text-text-primary font-bold mt-0.5 text-[11px]">NIP. 19780412 200502 1 004</span>
                    <span class="font-label-sm text-[11px] uppercase text-text-muted mt-0.5">Pembina / Lurah Lamasi</span>
                </div>
            </div>

            <!-- Bottom QR Verification Block -->
            <div class="mt-space-xl pt-space-md border-t border-border-default flex flex-col md:flex-row items-center justify-between gap-space-sm text-text-muted">
                <div class="flex items-center gap-space-sm">
                    <div class="w-10 h-10 bg-surface-subtle flex items-center justify-center p-1 rounded border border-border-default">
                        <span class="material-symbols-outlined text-primary text-[24px]">qr_code_2</span>
                    </div>
                    <div class="flex flex-col text-left font-body-sm text-[11px] leading-tight">
                        <span class="text-text-primary font-label-md">Keaslian Terverifikasi SIP-BANSOS</span>
                        <span class="font-code-tabular">UUID: <?= md5(date('Y-m-d H:i:s')) ?></span>
                        <span>Dicetak melalui sistem informasi resmi Kelurahan Lamasi</span>
                    </div>
                </div>
                <div class="text-right font-code-tabular text-[11px]">
                    <span>Lembar 1 dari 1 &bull; Arsip Dokumen BANSOS-LMS</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
