<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full max-w-4xl mx-auto space-y-space-lg">
    <!-- Top Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('penerima') ?>">Data Penerima</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md">Profil Warga</span>
    </div>

    <!-- Main Detail Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('penerima') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Arsip Data Induk Penerima Bansos</h2>
            </div>
            <div class="flex items-center gap-space-xs">
                <?php if (in_array(session('role'), ['admin', 'petugas'])): ?>
                <a href="<?= base_url('penerima/edit/' . $penerima['id']) ?>"
                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded bg-surface-card hover:bg-surface-subtle text-text-secondary border border-border-default font-label-md text-label-md transition-colors">
                    <span class="material-symbols-outlined text-[16px]">edit</span>
                    <span>Edit Data</span>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="p-space-lg flex flex-col gap-space-lg">
            <!-- Profile Banner -->
            <div class="flex items-center gap-space-md p-space-md rounded-lg bg-surface-subtle border border-border-default">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-2xl shrink-0">
                    <?= strtoupper(substr($penerima['nama_lengkap'], 0, 1)) ?>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-headline-sm text-text-primary font-bold"><?= esc($penerima['nama_lengkap']) ?></h3>
                    <span class="font-code-tabular text-text-secondary text-sm font-semibold">NIK: <?= esc($penerima['nik']) ?></span>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold <?= ($penerima['status_aktif'] ?? 'Aktif') === 'Aktif' ? 'bg-status-success-bg text-status-success-text' : 'bg-status-danger-bg text-status-danger-text' ?>">
                            <?= esc($penerima['status_aktif'] ?? 'Aktif') ?>
                        </span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-card border border-border-default text-text-secondary">
                            <?= esc($penerima['kategori_miskin'] ?? 'Miskin') ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                <div class="p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-1">
                    <span class="font-label-sm text-text-muted uppercase">Tempat, Tanggal Lahir</span>
                    <span class="font-body-md text-text-primary font-medium">
                        <?= esc($penerima['tempat_lahir'] ?? '-') ?>, <?= !empty($penerima['tanggal_lahir']) ? date('d F Y', strtotime($penerima['tanggal_lahir'])) : '-' ?>
                    </span>
                </div>

                <div class="p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-1">
                    <span class="font-label-sm text-text-muted uppercase">Jenis Kelamin</span>
                    <span class="font-body-md text-text-primary font-medium">
                        <?= $penerima['jenis_kelamin'] === 'L' ? 'Laki-laki (L)' : 'Perempuan (P)' ?>
                    </span>
                </div>

                <div class="p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-1">
                    <span class="font-label-sm text-text-muted uppercase">Nomor Kontak / WhatsApp</span>
                    <span class="font-code-tabular text-text-primary font-medium">
                        <?= esc($penerima['no_hp'] ?? '-') ?>
                    </span>
                </div>

                <div class="p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-1">
                    <span class="font-label-sm text-text-muted uppercase">Terdaftar Pada Sistem</span>
                    <span class="font-body-md text-text-primary font-medium">
                        <?= !empty($penerima['created_at']) ? date('d F Y, H:i', strtotime($penerima['created_at'])) : '-' ?>
                    </span>
                </div>

                <div class="md:col-span-2 p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-1">
                    <span class="font-label-sm text-text-muted uppercase">Alamat Domisili</span>
                    <span class="font-body-md text-text-primary font-medium leading-relaxed">
                        <?= esc($penerima['alamat']) ?>
                        <span class="block text-text-muted font-normal text-sm">
                            RT <?= esc($penerima['rt'] ?? '-') ?> / RW <?= esc($penerima['rw'] ?? '-') ?> &bull; Kelurahan <?= esc($penerima['kelurahan']) ?>, Kecamatan <?= esc($penerima['kecamatan']) ?>, Kabupaten <?= esc($penerima['kabupaten'] ?? 'Luwu') ?>
                        </span>
                    </span>
                </div>

                <?php if (!empty($penerima['foto_ktp'])): ?>
                <div class="md:col-span-2 p-space-md bg-surface-canvas rounded border border-border-default flex flex-col gap-2">
                    <span class="font-label-sm text-text-muted uppercase">Dokumen KTP / KK Terunggah</span>
                    <div>
                        <img src="<?= base_url('uploads/ktp/' . $penerima['foto_ktp']) ?>"
                             alt="Foto KTP" class="max-w-xs rounded border border-border-default shadow-sm"/>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="px-space-lg py-space-sm bg-surface-subtle border-t border-border-default flex items-center justify-between">
            <a href="<?= base_url('penerima') ?>" class="inline-flex items-center gap-1 text-text-secondary hover:text-text-primary font-label-md transition-colors">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Kembali ke Daftar</span>
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
