<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-lg">
    <!-- Breadcrumb & Top Meta -->
    <div class="flex flex-wrap items-center justify-between gap-space-sm">
        <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
            <a class="flex items-center gap-space-xs text-text-muted hover:text-primary transition-colors" href="<?= base_url('dashboard') ?>">
                <span class="material-symbols-outlined text-[16px]">home</span>
                <span>Dashboard</span>
            </a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="font-label-md text-text-primary">Data Pengajuan Bantuan</span>
        </div>
        <div class="flex items-center gap-space-md bg-surface-card px-space-md py-space-xs rounded shadow-sm border border-border-default">
            <span class="flex items-center gap-space-xs font-code-tabular text-code-tabular text-text-secondary">
                <span class="w-2 h-2 rounded-full bg-status-warning-text animate-pulse"></span>
                <?= count(array_filter($pengajuan, fn($p) => $p['status'] === 'Menunggu')) ?> Berkas Perlu Ditinjau
            </span>
            <div class="h-3.5 w-px bg-border-default"></div>
            <span class="font-label-sm text-label-sm text-text-muted uppercase">Wilayah Kelurahan Lamasi</span>
        </div>
    </div>

    <!-- Header Modul & Aksi Utama -->
    <div class="bg-surface-card p-space-lg rounded shadow-sm border border-border-default">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
            <div>
                <div class="flex items-center gap-space-sm">
                    <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Pengajuan Bantuan</h1>
                    <span class="px-2 py-0.5 rounded-full bg-primary-container text-surface-container-lowest font-label-sm text-[10px] tracking-wider uppercase">TA <?= date('Y') ?></span>
                </div>
                <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">
                    Verifikasi kelayakan pemohon bansos Lamasi
                </p>
            </div>
            <div class="flex items-center gap-2 self-start lg:self-center no-print">
                <a href="<?= base_url('laporan') ?>"
                   class="h-8 sm:h-9 px-2.5 sm:px-3 bg-surface-card hover:bg-surface-subtle text-text-secondary font-label-md text-xs sm:text-sm rounded shadow-xs flex items-center gap-1.5 transition-colors border border-border-default"
                   title="Laporan">
                    <span class="material-symbols-outlined text-[16px]">summarize</span>
                    <span class="hidden sm:inline">Laporan</span>
                </a>
                <?php if (in_array(session('role'), ['admin', 'petugas'])): ?>
                <a href="<?= base_url('pengajuan/create') ?>"
                   class="h-8 sm:h-9 px-2.5 sm:px-3.5 bg-primary hover:bg-primary-container text-surface-container-lowest font-label-md text-xs sm:text-sm rounded shadow-xs flex items-center gap-1.5 transition-colors cursor-pointer"
                   title="Buat Pengajuan">
                    <span class="material-symbols-outlined text-[16px]">add_circle</span>
                    <span class="hidden sm:inline">+ Buat Pengajuan</span>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Filter Tab Status Verifikasi -->
        <div class="mt-space-lg pt-space-md bg-surface-canvas -mx-space-lg -mb-space-lg px-space-lg rounded-b border-t border-border-default">
            <div class="flex flex-wrap items-center justify-between gap-space-md">
                <!-- Status Tabs -->
                <div class="flex items-center gap-space-xs overflow-x-auto pb-space-xs md:pb-0">
                    <a href="<?= base_url('pengajuan') ?>"
                       class="px-space-md py-1.5 rounded font-label-md text-label-md <?= empty($filters['status']) ? 'bg-surface-card text-primary font-semibold shadow-sm border border-border-default' : 'text-text-muted hover:bg-surface-card hover:text-text-primary' ?> flex items-center gap-space-xs transition-colors">
                        <span>Semua</span>
                        <span class="px-1.5 py-0.5 rounded-full bg-surface-subtle text-text-secondary font-code-tabular text-[11px]"><?= count($pengajuan) ?></span>
                    </a>
                    <a href="<?= base_url('pengajuan?status=Menunggu') ?>"
                       class="px-space-md py-1.5 rounded font-label-md text-label-md <?= ($filters['status'] ?? '') === 'Menunggu' ? 'bg-surface-card text-primary font-semibold shadow-sm border border-border-default' : 'text-text-muted hover:bg-surface-card hover:text-text-primary' ?> flex items-center gap-space-xs transition-colors">
                        <span>Menunggu</span>
                    </a>
                    <a href="<?= base_url('pengajuan?status=Disetujui') ?>"
                       class="px-space-md py-1.5 rounded font-label-md text-label-md <?= ($filters['status'] ?? '') === 'Disetujui' ? 'bg-surface-card text-primary font-semibold shadow-sm border border-border-default' : 'text-text-muted hover:bg-surface-card hover:text-text-primary' ?> flex items-center gap-space-xs transition-colors">
                        <span>Disetujui</span>
                    </a>
                    <a href="<?= base_url('pengajuan?status=Ditolak') ?>"
                       class="px-space-md py-1.5 rounded font-label-md text-label-md <?= ($filters['status'] ?? '') === 'Ditolak' ? 'bg-surface-card text-primary font-semibold shadow-sm border border-border-default' : 'text-text-muted hover:bg-surface-card hover:text-text-primary' ?> flex items-center gap-space-xs transition-colors">
                        <span>Ditolak</span>
                    </a>
                </div>

                <!-- Search Input -->
                <form action="" method="GET" class="flex items-center gap-space-xs">
                    <input type="text" name="keyword" class="h-9 px-3 bg-surface-card border border-border-default rounded text-text-primary font-body-sm placeholder:text-text-muted focus:outline-none focus:ring-1 focus:ring-primary"
                           placeholder="Cari pemohon..." value="<?= esc($filters['keyword'] ?? '') ?>"/>
                    <button type="submit" class="h-9 px-3 bg-primary text-on-primary rounded font-label-md text-label-md hover:bg-primary-container transition-colors">
                        <span class="material-symbols-outlined text-[16px]">search</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="bg-surface-card rounded shadow-sm overflow-hidden flex flex-col border border-border-default">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-canvas text-text-muted font-label-sm text-label-sm uppercase tracking-wider select-none border-b border-border-default">
                    <tr>
                        <th class="py-3 px-space-lg w-12 text-center">No</th>
                        <th class="py-3 px-space-lg">Pemohon &amp; NIK</th>
                        <th class="py-3 px-space-lg">Jenis Bantuan</th>
                        <th class="py-3 px-space-lg">Tanggal Pengajuan</th>
                        <th class="py-3 px-space-lg">Petugas Pengusul</th>
                        <th class="py-3 px-space-lg text-center">Status</th>
                        <th class="py-3 px-space-lg text-center min-w-[160px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md divide-y divide-border-default">
                    <?php if (empty($pengajuan)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-10 text-text-muted">
                            <span class="material-symbols-outlined text-[36px] d-block mb-1">inbox</span>
                            <div>Tidak ada berkas pengajuan bantuan ditemukan.</div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($pengajuan as $i => $p): ?>
                    <tr class="hover:bg-surface-subtle/50 transition-colors">
                        <td class="px-space-lg py-4 text-center font-code-tabular text-text-muted text-[13px]"><?= $i + 1 ?></td>
                        <td class="px-space-lg py-4">
                            <div class="font-label-md text-label-md text-text-primary font-semibold"><?= esc($p['nama_lengkap']) ?></div>
                            <div class="font-code-tabular text-[12px] text-text-muted mt-0.5"><code><?= esc($p['nik']) ?></code></div>
                        </td>
                        <td class="px-space-lg py-4">
                            <span class="px-2.5 py-0.5 rounded bg-surface-subtle text-text-secondary font-label-sm text-[12px] font-medium">
                                <?= esc($p['nama_bantuan']) ?>
                            </span>
                        </td>
                        <td class="px-space-lg py-4 font-code-tabular text-text-secondary text-[13px]">
                            <?= date('d M Y', strtotime($p['tanggal_pengajuan'])) ?>
                        </td>
                        <td class="px-space-lg py-4 font-body-sm text-text-secondary">
                            <?= esc($p['nama_pengaju'] ?? '-') ?>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <?php if ($p['status'] === 'Disetujui'): ?>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-status-success-bg text-status-success-text">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-success-text"></span> Disetujui
                            </span>
                            <?php elseif ($p['status'] === 'Ditolak'): ?>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-status-danger-bg text-status-danger-text">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-danger-text"></span> Ditolak
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-status-warning-bg text-status-warning-text">
                                <span class="w-1.5 h-1.5 rounded-full bg-status-warning-text animate-pulse"></span> Menunggu
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <?php if ($p['status'] === 'Menunggu' && in_array(session('role'), ['admin', 'lurah'])): ?>
                                <a href="<?= base_url('pengajuan/verifikasi/' . $p['id']) ?>"
                                   class="px-2.5 py-1 rounded bg-primary text-on-primary hover:bg-primary-container text-[12px] font-semibold flex items-center gap-1 transition-colors shadow-sm"
                                   title="Verifikasi Pengajuan">
                                    <span class="material-symbols-outlined text-[15px]">verified</span>
                                    <span>Verifikasi</span>
                                </a>
                                <?php endif; ?>

                                <?php if ($p['status'] === 'Menunggu'): ?>
                                <a href="<?= base_url('pengajuan/edit/' . $p['id']) ?>"
                                   class="p-1.5 text-text-muted hover:text-secondary hover:bg-surface-subtle rounded transition-colors"
                                   title="Edit Data">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <?php endif; ?>

                                <?php if (session('role') === 'admin'): ?>
                                <a href="<?= base_url('pengajuan/delete/' . $p['id']) ?>"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus usulan pengajuan ini?');"
                                   class="p-1.5 text-text-muted hover:text-status-danger-text hover:bg-status-danger-bg rounded transition-colors"
                                   title="Hapus Data">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="p-space-md bg-surface-card flex flex-col sm:flex-row items-center justify-between gap-space-md border-t border-border-default">
            <span class="font-body-sm text-body-sm text-text-muted">
                Menampilkan <strong class="text-text-primary font-semibold"><?= count($pengajuan) ?></strong> berkas pengajuan
            </span>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
