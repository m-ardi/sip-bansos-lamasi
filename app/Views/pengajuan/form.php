<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $isEdit = !empty($pengajuan); ?>

<div class="flex flex-col w-full max-w-3xl mx-auto space-y-space-lg pb-margin">
    <!-- Top Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('pengajuan') ?>">Pengajuan Bantuan</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md"><?= $isEdit ? 'Edit Usulan' : 'Formulir Pengajuan Baru' ?></span>
    </div>

    <!-- Form Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('pengajuan') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold"><?= esc($title) ?></h2>
                    <p class="font-body-sm text-body-sm text-text-muted">Pendaftaran usulan bantuan sosial warga Kelurahan Lamasi</p>
                </div>
            </div>
        </div>

        <form action="<?= $isEdit ? base_url('pengajuan/update/' . $pengajuan['id']) : base_url('pengajuan/store') ?>" method="POST" class="p-space-lg flex flex-col gap-space-lg">
            <?= csrf_field() ?>

            <!-- Penerima Select -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="penerima_id">
                    Pilih Warga Penerima Bantuan <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="penerima_id" id="penerima_id" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Nama Warga Penerima --</option>
                        <?php foreach ($list_penerima as $p): ?>
                        <option value="<?= $p['id'] ?>"
                            <?= old('penerima_id', $pengajuan['penerima_id'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                            <?= esc($p['nik']) ?> - <?= esc($p['nama_lengkap']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Jenis Bantuan Select -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="jenis_bantuan_id">
                    Jenis Program Bantuan Sosial <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="jenis_bantuan_id" id="jenis_bantuan_id" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Skema Bantuan --</option>
                        <?php foreach ($list_jenis as $id => $nama): ?>
                        <option value="<?= $id ?>"
                            <?= old('jenis_bantuan_id', $pengajuan['jenis_bantuan_id'] ?? '') == $id ? 'selected' : '' ?>>
                            <?= esc($nama) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Tanggal Pengajuan -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="tanggal_pengajuan">
                    Tanggal Pengajuan <span class="text-status-danger-text">*</span>
                </label>
                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" required
                       value="<?= old('tanggal_pengajuan', $pengajuan['tanggal_pengajuan'] ?? date('Y-m-d')) ?>"
                       class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary font-code-tabular"/>
            </div>

            <!-- Keterangan / Alasan -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="keterangan">
                    Keterangan / Alasan Pengusulan
                </label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          placeholder="Jelaskan dasar usulan atau kondisi warga..."
                          class="w-full p-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary resize-none"><?= old('keterangan', $pengajuan['keterangan'] ?? '') ?></textarea>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-space-sm pt-space-md border-t border-border-default">
                <a href="<?= base_url('pengajuan') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    Batal
                </a>
                <button type="submit"
                        class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] mr-1">send</span>
                    <span><?= $isEdit ? 'Simpan Perubahan' : 'Ajukan Bantuan' ?></span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
