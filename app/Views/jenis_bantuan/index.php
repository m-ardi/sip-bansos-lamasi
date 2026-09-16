<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-lg">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="font-label-md text-text-primary">Jenis Bantuan Sosial</span>
    </div>

    <!-- Header Modul -->
    <div class="bg-surface-card p-space-lg rounded shadow-sm border border-border-default">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
            <div>
                <div class="flex items-center gap-space-sm">
                    <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Jenis Bantuan</h1>
                    <span class="px-2 py-0.5 rounded-full bg-primary-container text-surface-container-lowest font-label-sm text-[10px] tracking-wider uppercase">Master Data</span>
                </div>
                <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">
                    Master skema program bantuan sosial
                </p>
            </div>
            <div class="flex items-center gap-2 self-start lg:self-center no-print">
                <a href="<?= base_url('jenis-bantuan/create') ?>"
                   class="h-8 sm:h-9 px-2.5 sm:px-3.5 bg-primary hover:bg-primary-container text-surface-container-lowest font-label-md text-xs sm:text-sm rounded shadow-xs flex items-center gap-1.5 transition-colors cursor-pointer"
                   title="Tambah Program">
                    <span class="material-symbols-outlined text-[16px]">add</span>
                    <span class="hidden sm:inline">+ Tambah Program</span>
                </a>
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
                        <th class="py-3 px-space-lg">Nama Program Bantuan</th>
                        <th class="py-3 px-space-lg">Kategori</th>
                        <th class="py-3 px-space-lg">Sumber Dana</th>
                        <th class="py-3 px-space-lg">Keterangan</th>
                        <th class="py-3 px-space-lg text-center min-w-[120px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md divide-y divide-border-default">
                    <?php if (empty($jenis_bantuan)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-10 text-text-muted">
                            Belum ada program bantuan terdaftar.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($jenis_bantuan as $i => $j): ?>
                    <tr class="hover:bg-surface-subtle/50 transition-colors">
                        <td class="px-space-lg py-4 text-center font-code-tabular text-text-muted text-[13px]"><?= $i + 1 ?></td>
                        <td class="px-space-lg py-4">
                            <div class="font-label-md text-label-md text-text-primary font-semibold"><?= esc($j['nama_bantuan']) ?></div>
                        </td>
                        <td class="px-space-lg py-4 font-body-sm text-text-secondary">
                            <?= esc($j['kategori']) ?>
                        </td>
                        <td class="px-space-lg py-4">
                            <?php if ($j['sumber_bantuan'] === 'Pusat'): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-primary text-on-primary">
                                APBN / Pusat
                            </span>
                            <?php elseif ($j['sumber_bantuan'] === 'Daerah'): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-status-success-bg text-status-success-text">
                                APBD / Daerah
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-surface-subtle text-text-secondary border border-border-default">
                                <?= esc($j['sumber_bantuan']) ?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-space-lg py-4 font-body-sm text-text-muted max-w-xs truncate">
                            <?= esc($j['keterangan'] ?? '-') ?>
                        </td>
                        <td class="px-space-lg py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('jenis-bantuan/edit/' . $j['id']) ?>"
                                   class="p-1.5 text-text-muted hover:text-secondary hover:bg-surface-subtle rounded transition-colors"
                                   title="Edit Program">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <a href="<?= base_url('jenis-bantuan/delete/' . $j['id']) ?>"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus jenis bantuan ini?');"
                                   class="p-1.5 text-text-muted hover:text-status-danger-text hover:bg-status-danger-bg rounded transition-colors"
                                   title="Hapus Program">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </a>
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
