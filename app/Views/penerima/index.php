<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-lg">
    <!-- PAGE TITLE BAR & ACTION SUITE -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex flex-col">
            <div class="flex items-center gap-1 text-text-muted font-label-sm text-[11px] uppercase tracking-wider">
                <span>Bansos Lamasi</span>
                <span class="material-symbols-outlined text-[13px]">chevron_right</span>
                <span class="text-secondary font-semibold">Data Penerima</span>
            </div>
            <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary mt-0.5">Data Penerima Bansos</h1>
            <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">Kelola data warga penerima bansos Kelurahan Lamasi</p>
        </div>
        <div class="flex items-center flex-wrap gap-2 no-print">
            <a href="<?= base_url('laporan/export-excel') ?>"
               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface-card hover:bg-surface-subtle text-text-secondary font-label-md text-xs sm:text-sm rounded shadow-xs transition-colors border border-border-default"
               title="Export Excel">
                <span class="material-symbols-outlined text-[16px] text-text-muted">file_download</span>
                <span class="hidden sm:inline">Export Excel</span>
            </a>
            <?php if (in_array(session('role'), ['admin', 'petugas'])): ?>
            <a href="<?= base_url('penerima/create') ?>"
               class="inline-flex items-center gap-1.5 px-3 sm:px-3.5 py-1.5 bg-primary hover:bg-primary-container text-on-primary font-label-md text-xs sm:text-sm rounded shadow-xs transition-colors cursor-pointer"
               title="Tambah Penerima">
                <span class="material-symbols-outlined text-[16px]">person_add</span>
                <span class="hidden sm:inline">+ Tambah Penerima</span>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- SUMMARY MINI METRIC RIBBON -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default flex items-center justify-between shadow-xs">
            <div class="flex flex-col">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Total Terdaftar</span>
                <span class="text-2xl font-bold text-text-primary mt-1"><?= count($penerima) ?> <span class="text-xs font-normal text-text-muted">Warga</span></span>
            </div>
            <div class="w-9 h-9 rounded bg-surface-subtle flex items-center justify-center text-text-muted">
                <span class="material-symbols-outlined text-[20px]">groups</span>
            </div>
        </div>

        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default flex items-center justify-between shadow-xs">
            <div class="flex flex-col">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Sangat Miskin</span>
                <?php
                    $sangatMiskin = count(array_filter($penerima, fn($p) => ($p['kategori_miskin'] ?? '') === 'Sangat Miskin'));
                ?>
                <span class="text-2xl font-bold text-text-primary mt-1"><?= $sangatMiskin ?> <span class="text-xs font-normal text-text-muted">Jiwa</span></span>
            </div>
            <div class="w-9 h-9 rounded bg-surface-subtle flex items-center justify-center text-status-danger-text">
                <span class="material-symbols-outlined text-[20px]">family_restroom</span>
            </div>
        </div>

        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default flex items-center justify-between shadow-xs">
            <div class="flex flex-col">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Status Aktif</span>
                <?php
                    $aktifCount = count(array_filter($penerima, fn($p) => ($p['status_aktif'] ?? 'Aktif') === 'Aktif'));
                ?>
                <span class="text-2xl font-bold text-text-primary mt-1"><?= $aktifCount ?> <span class="text-xs font-normal text-status-success-text">Aktif</span></span>
            </div>
            <div class="w-9 h-9 rounded bg-surface-subtle flex items-center justify-center text-status-success-text">
                <span class="material-symbols-outlined text-[20px]">verified</span>
            </div>
        </div>

        <div class="bg-surface-card p-4 sm:p-5 rounded-lg border border-border-default flex items-center justify-between shadow-xs">
            <div class="flex flex-col">
                <span class="font-label-sm text-[11px] text-text-muted uppercase tracking-wider font-semibold">Wilayah Lamasi</span>
                <span class="text-2xl font-bold text-text-primary mt-1">4 <span class="text-xs font-normal text-text-muted">Lingkungan</span></span>
            </div>
            <div class="w-9 h-9 rounded bg-surface-subtle flex items-center justify-center text-text-muted">
                <span class="material-symbols-outlined text-[20px]">domain</span>
            </div>
        </div>
    </div>

    <!-- FILTER & SEARCH BAR SECTION -->
    <div class="bg-surface-card p-space-md rounded shadow-sm flex flex-col gap-space-md border border-border-default">
        <form action="" method="GET" class="flex flex-col md:flex-row items-center justify-between gap-space-md">
            <div class="relative flex-1 w-full">
                <span class="material-symbols-outlined text-[20px] text-text-muted absolute left-3 top-2.5 pointer-events-none">search</span>
                <input class="w-full h-10 pl-10 pr-4 bg-surface-canvas border border-border-default rounded text-text-primary font-body-md placeholder:text-text-muted focus:bg-surface-card focus:outline-none focus:ring-1 focus:ring-primary"
                       name="keyword" placeholder="Cari NIK, Nomor KK, atau Nama Lengkap Warga..."
                       value="<?= esc($filters['keyword'] ?? '') ?>" type="text"/>
            </div>
            <div class="flex items-center gap-space-sm w-full md:w-auto shrink-0 flex-wrap sm:flex-nowrap">
                <div class="relative">
                    <select class="h-10 pl-3 pr-8 bg-surface-canvas border border-border-default rounded text-text-secondary font-body-sm appearance-none focus:outline-none focus:ring-1 focus:ring-primary cursor-pointer"
                            name="kategori_miskin">
                        <option value="">Semua Kategori</option>
                        <option value="Sangat Miskin" <?= ($filters['kategori_miskin'] ?? '') === 'Sangat Miskin' ? 'selected' : '' ?>>Sangat Miskin</option>
                        <option value="Miskin" <?= ($filters['kategori_miskin'] ?? '') === 'Miskin' ? 'selected' : '' ?>>Miskin</option>
                        <option value="Rentan Miskin" <?= ($filters['kategori_miskin'] ?? '') === 'Rentan Miskin' ? 'selected' : '' ?>>Rentan Miskin</option>
                    </select>
                    <span class="material-symbols-outlined text-[18px] text-text-muted absolute right-2 top-2.5 pointer-events-none">expand_more</span>
                </div>
                <div class="relative">
                    <select class="h-10 pl-3 pr-8 bg-surface-canvas border border-border-default rounded text-text-secondary font-body-sm appearance-none focus:outline-none focus:ring-1 focus:ring-primary cursor-pointer"
                            name="status_aktif">
                        <option value="">Semua Status</option>
                        <option value="Aktif" <?= ($filters['status_aktif'] ?? '') === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Tidak Aktif" <?= ($filters['status_aktif'] ?? '') === 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                    <span class="material-symbols-outlined text-[18px] text-text-muted absolute right-2 top-2.5 pointer-events-none">expand_more</span>
                </div>
                <button class="h-10 px-4 bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md rounded flex items-center justify-center gap-1.5 shadow-sm transition-colors cursor-pointer"
                        type="submit">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span>
                    <span>Filter</span>
                </button>
                <a href="<?= base_url('penerima') ?>"
                   class="h-10 px-3 border border-border-default hover:bg-surface-subtle text-text-muted font-label-md rounded flex items-center justify-center transition-colors"
                   title="Reset Filter">
                    <span class="material-symbols-outlined text-[18px]">refresh</span>
                </a>
            </div>
        </form>
    </div>

    <!-- CIVIC DATA TABLE CONTAINER -->
    <div class="bg-surface-card rounded shadow-sm overflow-hidden flex flex-col border border-border-default">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-text-primary border-collapse">
                <thead class="bg-surface-canvas text-text-muted font-label-sm text-label-sm uppercase tracking-wider select-none border-b border-border-default">
                    <tr>
                        <th class="py-3 px-3 w-12 text-center">No</th>
                        <th class="py-3 px-4">NIK</th>
                        <th class="py-3 px-4 min-w-[200px]">Nama Lengkap</th>
                        <th class="py-3 px-4 min-w-[180px]">Alamat &amp; Wilayah</th>
                        <th class="py-3 px-3 text-center">JK</th>
                        <th class="py-3 px-4">No. HP</th>
                        <th class="py-3 px-3 text-center">Status</th>
                        <th class="py-3 px-4 text-center min-w-[160px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-md text-body-md divide-y divide-border-default">
                    <?php if (empty($penerima)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-10 text-text-muted">
                            <span class="material-symbols-outlined text-[36px] d-block mb-1 text-text-muted">inbox</span>
                            <div>Tidak ada data penerima bantuan yang cocok.</div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($penerima as $i => $p): ?>
                    <tr class="hover:bg-surface-subtle/60 transition-colors">
                        <td class="py-4 px-4 text-center font-code-tabular text-text-muted text-[13px]"><?= $i + 1 ?></td>
                        <td class="py-4 px-4">
                            <div class="font-code-tabular font-semibold text-text-primary text-[14px]">
                                <?= esc($p['nik']) ?>
                            </div>
                            <div class="font-code-tabular text-[11px] text-text-muted mt-0.5">
                                RT <?= esc($p['rt'] ?? '-') ?> / RW <?= esc($p['rw'] ?? '-') ?>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-label-lg text-text-primary font-semibold"><?= esc($p['nama_lengkap']) ?></div>
                            <span class="inline-block text-[11px] font-medium text-status-danger-text mt-0.5">
                                <?= esc($p['kategori_miskin'] ?? 'Miskin') ?>
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-text-primary leading-snug"><?= esc($p['alamat']) ?></div>
                            <div class="text-text-muted text-body-sm">Kel. <?= esc($p['kelurahan'] ?? 'Lamasi') ?></div>
                        </td>
                        <td class="py-4 px-3 text-center">
                            <span class="font-label-md font-medium text-text-secondary"><?= esc($p['jenis_kelamin']) ?></span>
                        </td>
                        <td class="py-4 px-4 text-text-secondary font-code-tabular text-[13px]">
                            <?= esc($p['no_hp'] ?? '-') ?>
                        </td>
                        <td class="py-4 px-3 text-center">
                            <?php if (($p['status_aktif'] ?? 'Aktif') === 'Aktif'): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-status-success-bg text-status-success-text">
                                Aktif
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-status-danger-bg text-status-danger-text">
                                Tidak Aktif
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('penerima/show/' . $p['id']) ?>"
                                   class="p-1.5 text-text-muted hover:text-primary hover:bg-surface-subtle rounded transition-colors"
                                   title="Detail Lengkap">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </a>
                                <?php if (in_array(session('role'), ['admin', 'petugas'])): ?>
                                <a href="<?= base_url('penerima/edit/' . $p['id']) ?>"
                                   class="p-1.5 text-text-muted hover:text-secondary hover:bg-surface-subtle rounded transition-colors"
                                   title="Edit Data">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <?php endif; ?>
                                <?php if (session('role') === 'admin'): ?>
                                <button type="button"
                                        onclick="openDeleteModal('<?= $p['id'] ?>', '<?= esc($p['nama_lengkap'], 'js') ?>', '<?= esc($p['nik'], 'js') ?>', '<?= esc($p['alamat'], 'js') ?>', '<?= esc($p['kategori_miskin'] ?? 'Miskin', 'js') ?>')"
                                        class="p-1.5 text-text-muted hover:text-status-danger-text hover:bg-status-danger-bg rounded transition-colors cursor-pointer"
                                        title="Hapus Data">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION BAR -->
        <div class="p-space-md bg-surface-card flex flex-col sm:flex-row items-center justify-between gap-space-md border-t border-border-default">
            <div class="flex items-center gap-space-md">
                <span class="font-body-sm text-body-sm text-text-muted">
                    Menampilkan <strong class="text-text-primary font-semibold"><?= count($penerima) ?></strong> data warga penerima bantuan
                </span>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DIALOG: KONFIRMASI HAPUS DATA (ADMINISTRATIVE AUDIT RIGOR) -->
<div id="modal-delete" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-sm p-4 transition-all hidden">
    <div class="bg-surface-card rounded-lg shadow-xl max-w-md w-full overflow-hidden flex flex-col border border-border-default">
        <div class="p-6 pb-4 flex flex-col items-center text-center">
            <div class="w-12 h-12 rounded-full bg-status-danger-bg text-status-danger-text flex items-center justify-center mb-3">
                <span class="material-symbols-outlined text-[24px]">delete_outline</span>
            </div>
            <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Konfirmasi Hapus Penerima</h2>
            <p class="font-body-sm text-body-sm text-text-muted mt-1 leading-relaxed">
                Tindakan ini akan menghapus data warga dari daftar aktif bantuan sosial Kelurahan Lamasi.
            </p>
        </div>
        <div class="px-6 py-2">
            <div class="bg-surface-canvas border border-border-default rounded-md p-3.5 space-y-2 text-left">
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm text-text-muted uppercase tracking-wider">Nama Lengkap</span>
                    <span id="del-nama" class="font-label-md text-label-md font-semibold text-text-primary">-</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm text-text-muted uppercase tracking-wider">NIK</span>
                    <span id="del-nik" class="font-code-tabular text-code-tabular text-text-primary font-medium">-</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm text-text-muted uppercase tracking-wider">Wilayah</span>
                    <span id="del-wilayah" class="font-body-sm text-body-sm text-text-secondary truncate max-w-[200px]">-</span>
                </div>
                <div class="flex items-center justify-between pt-1 border-t border-border-default/60">
                    <span class="font-label-sm text-label-sm text-text-muted uppercase tracking-wider">Kategori</span>
                    <span id="del-kategori" class="font-label-sm text-label-sm font-semibold text-status-danger-text">-</span>
                </div>
            </div>
        </div>
        <div class="px-6 py-5 flex items-center justify-end gap-3 mt-1">
            <button type="button" onclick="closeDeleteModal()"
                    class="flex-1 px-4 py-2 border border-border-default hover:bg-surface-subtle text-text-secondary font-label-md text-label-md rounded transition-colors text-center cursor-pointer">
                Batal
            </button>
            <a id="del-confirm-btn" href="#"
               class="flex-1 px-4 py-2 bg-error hover:bg-red-700 text-on-error font-label-md text-label-md rounded shadow-sm flex items-center justify-center gap-1.5 transition-colors text-center cursor-pointer">
                <span class="material-symbols-outlined text-[18px]">delete</span>
                <span>Hapus Data</span>
            </a>
        </div>
    </div>
</div>

<script>
function openDeleteModal(id, nama, nik, alamat, kategori) {
    document.getElementById('del-nama').textContent = nama;
    document.getElementById('del-nik').textContent = nik;
    document.getElementById('del-wilayah').textContent = alamat;
    document.getElementById('del-kategori').textContent = kategori;
    document.getElementById('del-confirm-btn').href = '<?= base_url('penerima/delete/') ?>/' + id;
    document.getElementById('modal-delete').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('modal-delete').classList.add('hidden');
}

// Close on backdrop click
document.getElementById('modal-delete').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>

<?= $this->endSection() ?>
