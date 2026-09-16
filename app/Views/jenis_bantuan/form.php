<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $isEdit = !empty($jenis); ?>

<div class="flex flex-col w-full max-w-2xl mx-auto space-y-space-lg pb-margin">
    <!-- Top Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('jenis-bantuan') ?>">Jenis Bantuan</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md"><?= $isEdit ? 'Edit Program' : 'Tambah Program Bansos' ?></span>
    </div>

    <!-- Form Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('jenis-bantuan') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold"><?= esc($title) ?></h2>
                    <p class="font-body-sm text-body-sm text-text-muted">Master skema program bantuan sosial</p>
                </div>
            </div>
        </div>

        <form action="<?= $isEdit ? base_url('jenis-bantuan/update/' . $jenis['id']) : base_url('jenis-bantuan/store') ?>" method="POST" class="p-space-lg flex flex-col gap-space-lg">
            <?= csrf_field() ?>

            <!-- Nama Program -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="nama_bantuan">
                    Nama Program Bantuan <span class="text-status-danger-text">*</span>
                </label>
                <input type="text" name="nama_bantuan" id="nama_bantuan" required
                       value="<?= old('nama_bantuan', $jenis['nama_bantuan'] ?? '') ?>"
                       placeholder="Contoh: PKH (Program Keluarga Harapan)"
                       class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"/>
            </div>

            <!-- Kategori -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="kategori">
                    Kategori Program <span class="text-status-danger-text">*</span>
                </label>
                <input type="text" name="kategori" id="kategori" required
                       value="<?= old('kategori', $jenis['kategori'] ?? '') ?>"
                       placeholder="Contoh: Bantuan Sosial Reguler"
                       class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"/>
            </div>

            <!-- Sumber Bantuan -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="sumber_bantuan">
                    Sumber Anggaran / Dana <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="sumber_bantuan" id="sumber_bantuan" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Sumber Dana --</option>
                        <?php foreach (['Pusat', 'Daerah', 'Swasta', 'Lainnya'] as $src): ?>
                        <option value="<?= $src ?>" <?= old('sumber_bantuan', $jenis['sumber_bantuan'] ?? '') === $src ? 'selected' : '' ?>>
                            <?= $src ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="keterangan">
                    Keterangan Singkat
                </label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          placeholder="Deskripsi sasaran atau mekanisme bantuan..."
                          class="w-full p-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary resize-none"><?= old('keterangan', $jenis['keterangan'] ?? '') ?></textarea>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-space-sm pt-space-md border-t border-border-default">
                <a href="<?= base_url('jenis-bantuan') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    Batal
                </a>
                <button type="submit"
                        class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] mr-1">save</span>
                    <span><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Jenis Bantuan' ?></span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
