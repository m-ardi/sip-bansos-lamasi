<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full">
    <!-- Top Context & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div class="flex flex-col">
            <div class="flex items-center gap-1 text-text-muted mb-1">
                <span class="material-symbols-outlined text-[15px]">domain</span>
                <span class="font-label-sm text-[11px] tracking-wider uppercase">Wilayah Lamasi</span>
                <span class="text-text-muted text-xs">•</span>
                <span class="font-code-tabular text-[11px] text-secondary font-semibold">TA <?= date('Y') ?></span>
            </div>
            <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Dashboard Bansos</h1>
            <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">Ringkasan realisasi &amp; penerima bansos Kelurahan Lamasi</p>
        </div>
        <!-- Quick Utilities -->
        <div class="flex items-center gap-1.5 sm:gap-2 self-start sm:self-auto shrink-0 no-print">
            <button class="h-8 sm:h-9 px-2.5 sm:px-3 rounded bg-surface-card text-text-secondary font-label-md text-xs shadow-xs hover:bg-surface-subtle transition-all flex items-center gap-1.5 border border-border-default cursor-pointer"
                    onclick="window.location.reload();" type="button" title="Refresh Data">
                <span class="material-symbols-outlined text-[16px]">sync</span>
                <span class="hidden sm:inline">Refresh</span>
            </button>
            <button class="h-8 sm:h-9 px-2.5 sm:px-3 rounded bg-primary text-on-primary font-label-md text-xs shadow-xs hover:bg-primary-container transition-all flex items-center gap-1.5 cursor-pointer"
                    onclick="window.print()" type="button" title="Cetak Ringkasan">
                <span class="material-symbols-outlined text-[16px]">print</span>
                <span class="hidden sm:inline">Cetak Ringkasan</span>
            </button>
        </div>
    </div>

    <!-- 4 Primary KPI Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Card 1: Total Penerima -->
        <div class="bg-surface-card rounded-lg p-4 sm:p-5 border border-border-default flex flex-col justify-between shadow-xs">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold">Total Penerima</span>
                <span class="material-symbols-outlined text-[18px] text-text-muted">people</span>
            </div>
            <div class="mt-2.5 mb-1">
                <div class="text-2xl sm:text-[26px] font-bold text-text-primary"><?= $total_penerima ?> <span class="text-xs text-text-muted font-normal">Warga</span></div>
            </div>
            <div class="flex items-center text-xs text-status-success-text font-medium pt-2 border-t border-border-default">
                <span class="material-symbols-outlined text-[14px] mr-1">check_circle</span> <?= $penerima_aktif ?> Aktif
            </div>
        </div>

        <!-- Card 2: Menunggu Verifikasi -->
        <div class="bg-surface-card rounded-lg p-4 sm:p-5 border border-border-default flex flex-col justify-between shadow-xs">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold">Menunggu Verifikasi</span>
                <span class="material-symbols-outlined text-[18px] text-status-warning-text">pending_actions</span>
            </div>
            <div class="mt-2.5 mb-1">
                <div class="text-2xl sm:text-[26px] font-bold text-text-primary"><?= $pengajuan_pending ?> <span class="text-xs text-text-muted font-normal">Berkas</span></div>
            </div>
            <div class="flex items-center text-xs text-status-warning-text font-medium pt-2 border-t border-border-default">
                <span class="material-symbols-outlined text-[14px] mr-1">schedule</span> Perlu Tindakan
            </div>
        </div>

        <!-- Card 3: Total Realisasi -->
        <div class="bg-surface-card rounded-lg p-4 sm:p-5 border border-border-default flex flex-col justify-between shadow-xs">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold">Dana Tersalurkan</span>
                <span class="material-symbols-outlined text-[18px] text-text-muted">payments</span>
            </div>
            <div class="mt-2.5 mb-1">
                <div class="text-xl sm:text-2xl font-bold text-text-primary font-code-tabular">
                    Rp <?= number_format($total_anggaran, 0, ',', '.') ?>
                </div>
            </div>
            <div class="flex items-center text-xs text-status-success-text font-medium pt-2 border-t border-border-default">
                <span class="material-symbols-outlined text-[14px] mr-1">verified</span> Status Tersalurkan
            </div>
        </div>

        <!-- Card 4: Program Aktif -->
        <div class="bg-surface-card rounded-lg p-4 sm:p-5 border border-border-default flex flex-col justify-between shadow-xs">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold">Program Bansos</span>
                <span class="material-symbols-outlined text-[18px] text-text-muted">folder_special</span>
            </div>
            <div class="mt-2.5 mb-1">
                <div class="text-2xl sm:text-[26px] font-bold text-text-primary"><?= $total_jenis_bantuan ?> <span class="text-xs text-text-muted font-normal">Program</span></div>
            </div>
            <div class="flex items-center text-xs text-text-muted font-medium pt-2 border-t border-border-default">
                <span class="material-symbols-outlined text-[14px] mr-1">layers</span> PKH, BLT, BPNT, dll
            </div>
        </div>
    </div>

    <!-- Mid Section: Visual Analytics & Geographic Distribution -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-xl">
        <!-- Realisasi Chart -->
        <div class="lg:col-span-8 bg-surface-card rounded-lg border border-border-default p-space-lg shadow-sm flex flex-col justify-between">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-space-md border-b border-border-default gap-space-sm mb-space-md">
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Statistik Penyaluran</h2>
                    <p class="font-body-sm text-body-sm text-text-muted mt-0.5">Realisasi per bulan di Kelurahan Lamasi</p>
                </div>
                <div class="flex items-center gap-space-md shrink-0">
                    <div class="flex items-center gap-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary inline-block"></span>
                        <span class="font-label-sm text-label-sm text-text-secondary">Penyaluran</span>
                    </div>
                </div>
            </div>

            <!-- Chart Display -->
            <div class="w-full h-64 relative flex items-end">
                <svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 740 220">
                    <line stroke="#F1F5F9" stroke-dasharray="3 3" stroke-width="1" x1="40" x2="730" y1="30" y2="30"></line>
                    <line stroke="#F1F5F9" stroke-dasharray="3 3" stroke-width="1" x1="40" x2="730" y1="80" y2="80"></line>
                    <line stroke="#F1F5F9" stroke-dasharray="3 3" stroke-width="1" x1="40" x2="730" y1="130" y2="130"></line>
                    <line stroke="#E2E8F0" stroke-width="1" x1="40" x2="730" y1="180" y2="180"></line>
                    <text class="font-code-tabular text-[11px]" fill="#94A3B8" x="5" y="34">1.5 Jt</text>
                    <text class="font-code-tabular text-[11px]" fill="#94A3B8" x="5" y="84">1 Jt</text>
                    <text class="font-code-tabular text-[11px]" fill="#94A3B8" x="5" y="134">500 Rb</text>
                    <text class="font-code-tabular text-[11px]" fill="#94A3B8" x="18" y="183">0</text>

                    <!-- Monthly Bars -->
                    <rect fill="#E2E8F0" height="90" rx="2" width="24" x="70" y="90"></rect>
                    <rect fill="#00236F" height="80" rx="2" width="24" x="70" y="100"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="72" y="200">Jan</text>

                    <rect fill="#E2E8F0" height="110" rx="2" width="24" x="136" y="70"></rect>
                    <rect fill="#00236F" height="100" rx="2" width="24" x="136" y="80"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="139" y="200">Feb</text>

                    <rect fill="#E2E8F0" height="130" rx="2" width="24" x="202" y="50"></rect>
                    <rect fill="#00236F" height="120" rx="2" width="24" x="202" y="60"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="204" y="200">Mar</text>

                    <rect fill="#E2E8F0" height="100" rx="2" width="24" x="268" y="80"></rect>
                    <rect fill="#00236F" height="90" rx="2" width="24" x="268" y="90"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="271" y="200">Apr</text>

                    <rect fill="#E2E8F0" height="120" rx="2" width="24" x="334" y="60"></rect>
                    <rect fill="#00236F" height="110" rx="2" width="24" x="334" y="70"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="337" y="200">Mei</text>

                    <rect fill="#E2E8F0" height="135" rx="2" width="24" x="400" y="45"></rect>
                    <rect fill="#00236F" height="125" rx="2" width="24" x="400" y="55"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="403" y="200">Jun</text>

                    <rect fill="#E2E8F0" height="115" rx="2" width="24" x="466" y="65"></rect>
                    <rect fill="#00236F" height="105" rx="2" width="24" x="466" y="75"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="470" y="200">Jul</text>

                    <rect fill="#E2E8F0" height="140" rx="2" width="24" x="532" y="40"></rect>
                    <rect fill="#00236F" height="134" rx="2" width="24" x="532" y="46"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="535" y="200">Ags</text>

                    <rect fill="#E2E8F0" height="145" rx="2" width="24" x="598" y="35"></rect>
                    <rect fill="#00236F" height="140" rx="2" width="24" x="598" y="40"></rect>
                    <text class="font-label-sm text-[11px]" fill="#64748B" x="602" y="200">Sep</text>

                    <rect fill="#CBD5E1" height="148" rx="2" width="24" x="664" y="32"></rect>
                    <rect fill="#0051D5" height="138" rx="2" width="24" x="664" y="42"></rect>
                    <text class="font-label-sm text-[11px] font-bold" fill="#0051D5" x="667" y="200">Okt</text>
                </svg>
            </div>

            <div class="mt-space-md pt-space-sm border-t border-border-default flex items-center justify-between text-text-muted font-body-sm">
                <span class="flex items-center gap-1.5 text-text-secondary">
                    <span class="material-symbols-outlined text-[16px] text-status-success-text">check_circle</span>
                    Total Realisasi: <strong class="text-text-primary font-semibold">Rp <?= number_format($total_anggaran, 0, ',', '.') ?></strong>
                </span>
                <span class="text-text-muted text-[12px]">Data Wilayah Kelurahan Lamasi</span>
            </div>
        </div>

        <!-- Geographic Distribution -->
        <div class="lg:col-span-4 bg-surface-card rounded-lg border border-border-default p-space-lg shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-space-md border-b border-border-default mb-space-md">
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Cakupan Wilayah</h2>
                        <p class="font-body-sm text-body-sm text-text-muted mt-0.5">Sebaran KPM Kelurahan Lamasi</p>
                    </div>
                    <span class="font-label-sm text-label-sm bg-surface-subtle px-2 py-0.5 rounded text-text-secondary font-code-tabular">4 Lingkungan</span>
                </div>

                <div class="space-y-space-md">
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center text-body-sm">
                            <span class="font-label-md text-label-md text-text-primary">Lingkungan Lamasi I</span>
                            <span class="font-code-tabular text-code-tabular text-text-secondary font-semibold">32%</span>
                        </div>
                        <div class="w-full h-1.5 rounded-full bg-surface-subtle overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 32%;"></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center text-body-sm">
                            <span class="font-label-md text-label-md text-text-primary">Lingkungan Lamasi II</span>
                            <span class="font-code-tabular text-code-tabular text-text-secondary font-semibold">28%</span>
                        </div>
                        <div class="w-full h-1.5 rounded-full bg-surface-subtle overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 28%;"></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center text-body-sm">
                            <span class="font-label-md text-label-md text-text-primary">Dusun Pongko</span>
                            <span class="font-code-tabular text-code-tabular text-text-secondary font-semibold">22%</span>
                        </div>
                        <div class="w-full h-1.5 rounded-full bg-surface-subtle overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 22%;"></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between items-center text-body-sm">
                            <span class="font-label-md text-label-md text-text-primary">Dusun Salulino</span>
                            <span class="font-code-tabular text-code-tabular text-text-secondary font-semibold">18%</span>
                        </div>
                        <div class="w-full h-1.5 rounded-full bg-surface-subtle overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 18%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-space-md pt-space-sm border-t border-border-default flex items-center gap-space-sm text-text-muted">
                <span class="material-symbols-outlined text-[18px] text-text-secondary shrink-0">info</span>
                <span class="font-body-sm text-body-sm text-text-secondary">Terdistribusi merata di 4 lingkungan/dusun.</span>
            </div>
        </div>
    </div>

    <!-- Bottom Data Grid: Pengajuan Masuk Terbaru -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm flex flex-col mb-space-xl overflow-hidden">
        <div class="p-space-lg flex flex-col sm:flex-row sm:items-center justify-between gap-space-md border-b border-border-default">
            <div>
                <div class="flex items-center gap-space-sm">
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Pengajuan Bansos Terbaru</h2>
                    <span class="px-2 py-0.5 rounded font-label-sm text-label-sm bg-surface-subtle text-text-secondary font-medium font-code-tabular">
                        <?= count($pengajuan_terbaru) ?> Data
                    </span>
                </div>
                <p class="font-body-sm text-body-sm text-text-muted mt-0.5">Daftar usulan bantuan terbaru</p>
            </div>
            <div class="flex items-center gap-space-sm no-print">
                <a class="h-[34px] px-3 rounded border border-border-default bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-subtle font-label-md text-label-md transition-colors flex items-center gap-1"
                   href="<?= base_url('pengajuan') ?>">
                    <span>Semua Pengajuan</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="border-b border-border-default">
                    <tr class="bg-surface-subtle text-text-muted font-label-sm text-label-sm uppercase tracking-wider h-10">
                        <th class="px-space-lg py-2 font-semibold">Tanggal</th>
                        <th class="px-space-lg py-2 font-semibold">Pemohon</th>
                        <th class="px-space-lg py-2 font-semibold">NIK</th>
                        <th class="px-space-lg py-2 font-semibold">Program Bansos</th>
                        <th class="px-space-lg py-2 text-center font-semibold">Status</th>
                        <th class="px-space-lg py-2 text-right font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-b border-border-default text-text-primary font-body-sm text-body-sm">
                    <?php if (empty($pengajuan_terbaru)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-6 text-text-muted">
                            Belum ada data pengajuan bantuan.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($pengajuan_terbaru as $p): ?>
                    <tr class="h-12 hover:bg-surface-subtle/50 transition-colors">
                        <td class="px-space-lg py-space-sm font-code-tabular text-text-muted text-[13px]">
                            <?= date('d M Y', strtotime($p['tanggal_pengajuan'])) ?>
                        </td>
                        <td class="px-space-lg py-space-sm">
                            <div class="font-label-md text-label-md text-text-primary font-medium"><?= esc($p['nama_lengkap']) ?></div>
                        </td>
                        <td class="px-space-lg py-space-sm font-code-tabular text-text-secondary">
                            <code><?= esc($p['nik']) ?></code>
                        </td>
                        <td class="px-space-lg py-space-sm">
                            <span class="inline-block px-2 py-0.5 rounded bg-surface-subtle text-text-secondary font-label-sm text-label-sm">
                                <?= esc($p['nama_bantuan']) ?>
                            </span>
                        </td>
                        <td class="px-space-lg py-space-sm text-center">
                            <?php if ($p['status'] === 'Disetujui'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full font-label-sm text-label-sm text-status-success-text bg-status-success-bg font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-success-text"></span> Disetujui
                            </span>
                            <?php elseif ($p['status'] === 'Ditolak'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full font-label-sm text-label-sm text-status-danger-text bg-status-danger-bg font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-danger-text"></span> Ditolak
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full font-label-sm text-label-sm text-status-warning-text bg-status-warning-bg font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-warning-text animate-pulse"></span> Perlu Verifikasi
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-space-lg py-space-sm text-right">
                            <a href="<?= base_url('pengajuan/show/' . $p['id']) ?>"
                               class="h-7 px-2.5 rounded border border-border-default bg-surface-card hover:bg-surface-subtle text-text-primary font-label-sm text-label-sm transition-colors inline-flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-[14px]">visibility</span>
                                <span>Detail</span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
