<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $isEdit = !empty($pengguna); ?>

<div class="flex flex-col w-full max-w-2xl mx-auto space-y-space-lg pb-margin">
    <!-- Top Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('pengguna') ?>">Manajemen Pengguna</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md"><?= $isEdit ? 'Edit Akun' : 'Tambah Akun Pegawai' ?></span>
    </div>

    <!-- Form Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('pengguna') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold"><?= esc($title) ?></h2>
                    <p class="font-body-sm text-body-sm text-text-muted">Kelola akun dan penugasan role pegawai kelurahan</p>
                </div>
            </div>
        </div>

        <form action="<?= $isEdit ? base_url('pengguna/update/' . $pengguna['id']) : base_url('pengguna/store') ?>" method="POST" class="p-space-lg flex flex-col gap-space-lg">
            <?= csrf_field() ?>

            <!-- Nama Lengkap -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="nama">
                    Nama Lengkap Pegawai <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <input type="text" name="nama" id="nama" required
                           value="<?= old('nama', $pengguna['nama'] ?? '') ?>"
                           placeholder="Contoh: Ahmad Fauzi, S.STP"
                           class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"/>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">person</span>
                    </div>
                </div>
            </div>

            <!-- Username -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="username">
                    Username / NIP <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <input type="text" name="username" id="username" required
                           value="<?= old('username', $pengguna['username'] ?? '') ?>"
                           placeholder="Minimal 5 karakter"
                           class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary font-code-tabular"/>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">badge</span>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="password">
                    Kata Sandi <?= $isEdit ? '<span class="text-text-muted font-normal text-xs">(Kosongkan jika tidak diubah)</span>' : '<span class="text-status-danger-text">*</span>' ?>
                </label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                           <?= $isEdit ? '' : 'required' ?> minlength="8"
                           placeholder="Minimal 8 karakter"
                           class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"/>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">lock</span>
                    </div>
                </div>
            </div>

            <!-- Role Select -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="role">
                    Peran &amp; Hak Akses (Role) <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="role" id="role" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Peran Pegawai --</option>
                        <option value="admin" <?= old('role', $pengguna['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Administrator (Akses Penuh)</option>
                        <option value="petugas" <?= old('role', $pengguna['role'] ?? '') === 'petugas' ? 'selected' : '' ?>>Petugas (Operator Penerima &amp; Salur)</option>
                        <option value="lurah" <?= old('role', $pengguna['role'] ?? '') === 'lurah' ? 'selected' : '' ?>>Kepala Kelurahan / Lurah (Verifikasi &amp; Laporan)</option>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Role explanation note -->
            <div class="p-space-md rounded-lg bg-surface-subtle border border-border-default text-text-secondary text-[12px] leading-relaxed">
                <span class="font-semibold text-text-primary block mb-1">Rincian Hak Akses:</span>
                <div>• <strong>Administrator:</strong> Master data, manajemen pengguna, input/verifikasi data.</div>
                <div>• <strong>Petugas:</strong> Pendataan warga penerima, usulan pengajuan bantuan, pencatatan penyaluran.</div>
                <div>• <strong>Lurah:</strong> Pemantauan dashboard eksekutif, verifikasi persetujuan usulan, laporan resmi.</div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-space-sm pt-space-md border-t border-border-default">
                <a href="<?= base_url('pengguna') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    Batal
                </a>
                <button type="submit"
                        class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] mr-1">save</span>
                    <span><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Pengguna' ?></span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
