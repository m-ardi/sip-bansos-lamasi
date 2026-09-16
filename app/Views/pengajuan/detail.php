<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full max-w-3xl mx-auto space-y-space-lg pb-margin">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm flex-wrap">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('pengajuan') ?>">Pengajuan</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md">Detail Pengajuan</span>
    </div>

    <!-- Detail Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <!-- Card Header -->
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default gap-space-sm">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('pengajuan') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h1 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Detail Pengajuan Bantuan</h1>
                    <p class="font-body-sm text-body-sm text-text-muted">Informasi lengkap permohonan bantuan sosial</p>
                </div>
            </div>
            <!-- Status Badge -->
            <?php if ($pengajuan['status'] === 'Disetujui'): ?>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full font-label-sm text-label-sm text-status-success-text bg-status-success-bg font-semibold shrink-0">
                <span class="w-1.5 h-1.5 rounded-full bg-status-success-text"></span> Disetujui
            </span>
            <?php elseif ($pengajuan['status'] === 'Ditolak'): ?>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full font-label-sm text-label-sm text-status-danger-text bg-status-danger-bg font-semibold shrink-0">
                <span class="w-1.5 h-1.5 rounded-full bg-status-danger-text"></span> Ditolak
            </span>
            <?php else: ?>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full font-label-sm text-label-sm text-status-warning-text bg-status-warning-bg font-semibold shrink-0">
                <span class="w-1.5 h-1.5 rounded-full bg-status-warning-text animate-pulse"></span> Menunggu
            </span>
            <?php endif; ?>
        </div>

        <div class="p-space-lg flex flex-col gap-space-lg">
            <!-- Pemohon Info -->
            <div>
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold block mb-space-md">Data Pemohon</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md bg-surface-canvas rounded-lg p-space-md border border-border-default">
                    <div>
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">Nama Lengkap</span>
                        <span class="font-label-md text-label-md text-text-primary font-semibold"><?= esc($pengajuan['nama_lengkap']) ?></span>
                    </div>
                    <div>
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">NIK</span>
                        <code class="font-code-tabular text-text-secondary font-semibold"><?= esc($pengajuan['nik']) ?></code>
                    </div>
                    <?php if (!empty($pengajuan['alamat'])): ?>
                    <div class="sm:col-span-2">
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">Alamat</span>
                        <span class="font-body-sm text-text-secondary"><?= esc($pengajuan['alamat']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Bantuan Info -->
            <div>
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold block mb-space-md">Informasi Bantuan</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md bg-surface-canvas rounded-lg p-space-md border border-border-default">
                    <div>
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">Program Bantuan</span>
                        <span class="font-label-md text-label-md text-primary font-semibold"><?= esc($pengajuan['nama_bantuan']) ?></span>
                    </div>
                    <div>
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">Tanggal Pengajuan</span>
                        <span class="font-code-tabular text-text-secondary"><?= date('d F Y', strtotime($pengajuan['tanggal_pengajuan'])) ?></span>
                    </div>
                    <?php if (!empty($pengajuan['keterangan'])): ?>
                    <div class="sm:col-span-2 pt-space-xs border-t border-border-default">
                        <span class="font-label-sm text-[11px] uppercase text-text-muted block mb-0.5">Alasan Pengusulan</span>
                        <p class="font-body-sm text-text-secondary"><?= esc($pengajuan['keterangan']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Verifikasi Info -->
            <?php if (!empty($pengajuan['catatan_verifikasi'])): ?>
            <div>
                <span class="font-label-sm text-[11px] uppercase tracking-wider text-text-muted font-semibold block mb-space-md">Catatan Verifikasi</span>
                <div class="bg-surface-canvas rounded-lg p-space-md border border-border-default">
                    <p class="font-body-sm text-text-secondary"><?= esc($pengajuan['catatan_verifikasi']) ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Actions -->
            <div class="flex flex-wrap items-center gap-space-sm pt-space-md border-t border-border-default">
                <a href="<?= base_url('pengajuan') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    <span class="material-symbols-outlined text-[16px] mr-1">arrow_back</span>
                    Kembali
                </a>
                <?php if ($pengajuan['status'] === 'Menunggu' && in_array(session('role'), ['admin', 'lurah'])): ?>
                <a href="<?= base_url('pengajuan/verifikasi/' . $pengajuan['id']) ?>"
                   class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm">
                    <span class="material-symbols-outlined text-[18px] mr-1">verified</span>
                    Verifikasi Sekarang
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
