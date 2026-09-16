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
            <span class="font-label-md text-text-primary">Data Penyaluran Bantuan</span>
        </div>
    </div>

    <!-- Header Modul & Aksi -->
    <div class="bg-surface-card p-space-lg rounded shadow-sm border border-border-default">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
            <div>
                <div class="flex items-center gap-space-sm">
                    <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Penyaluran Bantuan</h1>
                    <span class="px-2 py-0.5 rounded-full bg-status-success-bg text-status-success-text font-label-sm text-[10px] tracking-wider uppercase font-semibold">Tersalurkan</span>
                </div>
                <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">
                    Distribusi bansos kepada warga KPM Kelurahan Lamasi
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
                <a href="<?= base_url('penyaluran/create') ?>"
                   class="h-8 sm:h-9 px-2.5 sm:px-3.5 bg-primary hover:bg-primary-container text-surface-container-lowest font-label-md text-xs sm:text-sm rounded shadow-xs flex items-center gap-1.5 transition-colors cursor-pointer"
                   title="Catat Penyaluran">
                    <span class="material-symbols-outlined text-[16px]">local_shipping</span>
                    <span class="hidden sm:inline">+ Catat Penyaluran</span>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="mt-space-lg pt-space-md bg-surface-canvas -mx-space-lg -mb-space-lg px-space-lg rounded-b border-t border-border-default pb-space-md">
            <form action="" method="GET" class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-space-sm">
                <input type="text" name="keyword" class="h-9 px-3 bg-surface-card border border-border-default rounded text-text-primary font-body-sm placeholder:text-text-muted focus:outline-none focus:ring-1 focus:ring-primary flex-1 min-w-0 sm:max-w-xs"
                       placeholder="Cari penerima atau NIK..." value="<?= esc($filters['keyword'] ?? '') ?>"/>
                <div class="flex items-center gap-space-sm flex-wrap">
                    <select name="bulan" class="h-9 px-3 bg-surface-card border border-border-default rounded text-text-secondary font-body-sm focus:outline-none cursor-pointer">
                        <option value="">Semua Bulan</option>
                        <?php for ($m = 1; $m <= 12; $m++): ?>
                        <option value="<?= $m ?>" <?= ($filters['bulan'] ?? '') == $m ? 'selected' : '' ?>>
                            <?= date('M', mktime(0,0,0,$m,1)) ?>
                        </option>
                        <?php endfor; ?>
                    </select>
                    <select name="tahun" class="h-9 px-3 bg-surface-card border border-border-default rounded text-text-secondary font-body-sm focus:outline-none cursor-pointer">
                        <option value="">Semua Tahun</option>
                        <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                        <option value="<?= $y ?>" <?= ($filters['tahun'] ?? '') == $y ? 'selected' : '' ?>><?= $y ?></option>
                        <?php endfor; ?>
                    </select>
                    <button type="submit" class="h-9 px-4 bg-primary text-on-primary rounded font-label-md text-label-md hover:bg-primary-container transition-colors cursor-pointer">
                        Filter
                    </button>
                    <a href="<?= base_url('penyaluran') ?>" class="h-9 px-3 border border-border-default bg-surface-card hover:bg-surface-subtle text-text-muted rounded flex items-center justify-center">
                        <span class="material-symbols-outlined text-[16px]">refresh</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="bg-surface-card rounded shadow-sm overflow-hidden flex flex-col border border-border-default">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead class="bg-surface-canvas text-text-muted font-label-sm text-label-sm uppercase tracking-wider select-none border-b border-border-default">
                    <tr>
                        <th class="py-3 px-space-lg w-12 text-center">No</th>
                        <th class="py-3 px-space-lg min-w-[160px]">Penerima &amp; NIK</th>
                        <th class="py-3 px-space-lg min-w-[120px]">Jenis Bantuan</th>
                        <th class="py-3 px-space-lg min-w-[110px]">Tgl. Penyaluran</th>
                        <th class="py-3 px-space-lg min-w-[110px]">Jumlah Salur</th>
                        <th class="py-3 px-space-lg">Metode</th>
                        <th class="py-3 px-space-lg text-center">Status</th>
                        <th class="py-3 px-space-lg text-center min-w-[80px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md divide-y divide-border-default">
                    <?php if (empty($penyaluran)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-10 text-text-muted">
                            <span class="material-symbols-outlined text-[36px] d-block mb-1">inbox</span>
                            <div>Belum ada data realisasi penyaluran bantuan.</div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($penyaluran as $i => $p): ?>
                    <tr class="hover:bg-surface-subtle/50 transition-colors">
                        <td class="px-space-lg py-4 text-center font-code-tabular text-text-muted text-[13px]"><?= $i + 1 ?></td>
                        <td class="px-space-lg py-4">
                            <div class="font-label-md text-label-md text-text-primary font-semibold"><?= esc($p['nama_lengkap']) ?></div>
                            <div class="font-code-tabular text-[12px] text-text-muted mt-0.5"><code><?= esc($p['nik']) ?></code></div>
                        </td>
                        <td class="px-space-lg py-4 font-body-sm text-text-secondary">
                            <?= esc($p['nama_bantuan']) ?>
                        </td>
                        <td class="px-space-lg py-4 font-code-tabular text-text-secondary text-[13px]">
                            <?= date('d M Y', strtotime($p['tanggal_penyaluran'])) ?>
                        </td>
                        <td class="px-space-lg py-4 font-code-tabular font-semibold text-text-primary">
                            Rp <?= number_format($p['jumlah_bantuan'], 0, ',', '.') ?>
                        </td>
                        <td class="px-space-lg py-4">
                            <span class="px-2 py-0.5 rounded bg-surface-subtle text-text-secondary font-label-sm text-[11px] font-medium">
                                <?= esc($p['metode_penyaluran']) ?>
                            </span>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-status-success-bg text-status-success-text">
                                <?= esc($p['status_penyaluran']) ?>
                            </span>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <?php if (session('role') === 'admin'): ?>
                                <a href="<?= base_url('penyaluran/delete/' . $p['id']) ?>"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus catatan penyaluran ini?');"
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
                Menampilkan <strong class="text-text-primary font-semibold"><?= count($penyaluran) ?></strong> catatan penyaluran bansos
            </span>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
