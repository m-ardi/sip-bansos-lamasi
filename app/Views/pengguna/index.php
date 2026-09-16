<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full gap-space-xl">
    <!-- Top Operational Banner & Meta Context -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-space-xs">
        <div class="flex flex-col">
            <div class="flex items-center gap-1 mb-1">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider">SIP-BANSOS • Administrasi</span>
                <span class="w-1 h-1 rounded-full bg-border-strong"></span>
                <span class="font-code-tabular text-[11px] text-secondary font-semibold">TA <?= date('Y') ?></span>
            </div>
            <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Manajemen Pengguna</h1>
            <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">Kelola akun staf &amp; pimpinan Kelurahan Lamasi</p>
        </div>
        <div class="flex items-center gap-2 self-start sm:self-auto no-print">
            <a href="<?= base_url('pengguna/create') ?>"
               class="flex items-center gap-1.5 px-3 sm:px-3.5 py-1.5 bg-primary text-on-primary rounded shadow-xs hover:bg-primary-container transition-all font-label-md text-xs sm:text-sm cursor-pointer"
               title="Tambah Pengguna">
                <span class="material-symbols-outlined text-[16px]">person_add</span>
                <span class="hidden sm:inline">+ Tambah Pengguna</span>
            </a>
        </div>
    </div>

    <!-- Metric KPI Quick-Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Akun -->
        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Total Akun</span>
                <div class="w-8 h-8 rounded bg-surface-subtle flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[18px]">badge</span>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-2xl sm:text-[26px] font-bold text-text-primary leading-none"><?= count($pengguna) ?></span>
                <span class="text-xs text-text-muted">Pengguna</span>
            </div>
        </div>

        <!-- Petugas -->
        <?php $petugasCount = count(array_filter($pengguna, fn($u) => $u['role'] === 'petugas')); ?>
        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Petugas Bansos</span>
                <div class="w-8 h-8 rounded bg-secondary-fixed flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-2xl sm:text-[26px] font-bold text-text-primary leading-none"><?= $petugasCount ?></span>
                <span class="text-xs text-status-success-text font-medium">Petugas Aktif</span>
            </div>
        </div>

        <!-- Lurah (Pimpinan) -->
        <?php $lurahCount = count(array_filter($pengguna, fn($u) => $u['role'] === 'lurah')); ?>
        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Pimpinan (Lurah)</span>
                <div class="w-8 h-8 rounded bg-tertiary-fixed flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined text-[18px]">policy</span>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-2xl sm:text-[26px] font-bold text-text-primary leading-none"><?= $lurahCount ?></span>
                <span class="text-xs text-text-muted">Akses Eksekutif</span>
            </div>
        </div>

        <!-- Administrator -->
        <?php $adminCount = count(array_filter($pengguna, fn($u) => $u['role'] === 'admin')); ?>
        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default shadow-xs flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Administrator</span>
                <div class="w-8 h-8 rounded bg-primary-fixed flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[18px]">shield_person</span>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-2xl sm:text-[26px] font-bold text-text-primary leading-none"><?= $adminCount ?></span>
                <span class="text-xs text-text-muted">Super Admin</span>
            </div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden flex flex-col">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <span class="material-symbols-outlined text-[20px] text-primary">manage_accounts</span>
                <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Daftar Akun Pegawai Kelurahan</h2>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-canvas text-text-muted font-label-sm text-label-sm uppercase tracking-wider select-none border-b border-border-default">
                    <tr>
                        <th class="py-3 px-space-lg w-12 text-center">No</th>
                        <th class="py-3 px-space-lg">Nama Pegawai</th>
                        <th class="py-3 px-space-lg">Username</th>
                        <th class="py-3 px-space-lg">Peran / Hak Akses</th>
                        <th class="py-3 px-space-lg">Terdaftar Sejak</th>
                        <th class="py-3 px-space-lg text-center min-w-[120px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md divide-y divide-border-default">
                    <?php if (empty($pengguna)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-10 text-text-muted">
                            Belum ada akun pengguna.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($pengguna as $i => $u): ?>
                    <tr class="hover:bg-surface-subtle/50 transition-colors">
                        <td class="px-space-lg py-4 text-center font-code-tabular text-text-muted text-[13px]"><?= $i + 1 ?></td>
                        <td class="px-space-lg py-4">
                            <div class="flex items-center gap-space-sm">
                                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-xs">
                                    <?= strtoupper(substr($u['nama'], 0, 1)) ?>
                                </div>
                                <span class="font-label-md text-text-primary font-semibold"><?= esc($u['nama']) ?></span>
                            </div>
                        </td>
                        <td class="px-space-lg py-4 font-code-tabular text-text-secondary text-[13px]">
                            <code><?= esc($u['username']) ?></code>
                        </td>
                        <td class="px-space-lg py-4">
                            <?php if ($u['role'] === 'admin'): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-primary text-on-primary">
                                Administrator
                            </span>
                            <?php elseif ($u['role'] === 'lurah'): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-secondary-fixed text-secondary">
                                Lurah (Pimpinan)
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-subtle text-text-secondary border border-border-default">
                                Petugas Kelurahan
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-space-lg py-4 font-code-tabular text-text-muted text-[13px]">
                            <?= !empty($u['created_at']) ? date('d M Y', strtotime($u['created_at'])) : '-' ?>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('pengguna/edit/' . $u['id']) ?>"
                                   class="p-1.5 text-text-muted hover:text-secondary hover:bg-surface-subtle rounded transition-colors"
                                   title="Edit Akun">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <?php if ($u['id'] != session('user_id')): ?>
                                <a href="<?= base_url('pengguna/delete/' . $u['id']) ?>"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');"
                                   class="p-1.5 text-text-muted hover:text-status-danger-text hover:bg-status-danger-bg rounded transition-colors"
                                   title="Hapus Akun">
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
    </div>
</div>

<?= $this->endSection() ?>
