<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full max-w-2xl mx-auto space-y-space-lg pb-margin">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('pengajuan') ?>">Pengajuan</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md">Verifikasi Usulan</span>
    </div>

    <!-- Verifikasi Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('pengajuan') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Tinjau &amp; Verifikasi Usulan Bantuan</h2>
                    <p class="font-body-sm text-body-sm text-text-muted">Proses persetujuan atau penolakan permohonan bansos warga</p>
                </div>
            </div>
        </div>

        <div class="p-space-lg flex flex-col gap-space-lg">
            <!-- Info Box -->
            <div class="p-space-md rounded-lg bg-surface-canvas border border-border-default grid grid-cols-2 gap-space-md">
                <div>
                    <span class="font-label-sm text-text-muted uppercase block">Pemohon</span>
                    <span class="font-label-md text-text-primary font-semibold block mt-0.5"><?= esc($pengajuan['nama_lengkap']) ?></span>
                </div>
                <div>
                    <span class="font-label-sm text-text-muted uppercase block">NIK</span>
                    <span class="font-code-tabular text-text-secondary font-semibold block mt-0.5"><?= esc($pengajuan['nik']) ?></span>
                </div>
                <div>
                    <span class="font-label-sm text-text-muted uppercase block">Program Bansos</span>
                    <span class="font-label-md text-primary font-semibold block mt-0.5"><?= esc($pengajuan['nama_bantuan']) ?></span>
                </div>
                <div>
                    <span class="font-label-sm text-text-muted uppercase block">Tanggal Masuk</span>
                    <span class="font-code-tabular text-text-secondary block mt-0.5"><?= date('d F Y', strtotime($pengajuan['tanggal_pengajuan'])) ?></span>
                </div>
                <?php if (!empty($pengajuan['keterangan'])): ?>
                <div class="col-span-2 pt-space-xs border-t border-border-default">
                    <span class="font-label-sm text-text-muted uppercase block">Alasan Pengusulan</span>
                    <span class="font-body-sm text-text-secondary block mt-0.5"><?= esc($pengajuan['keterangan']) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <!-- Form Verifikasi -->
            <form action="<?= base_url('pengajuan/proses-verifikasi/' . $pengajuan['id']) ?>" method="POST" class="flex flex-col gap-space-lg">
                <?= csrf_field() ?>

                <div class="flex flex-col gap-space-xs">
                    <span class="font-label-md text-text-primary font-semibold">Keputusan Verifikasi <span class="text-status-danger-text">*</span></span>
                    <div class="grid grid-cols-2 gap-space-md mt-1">
                        <label class="flex flex-col items-center justify-center p-space-md rounded-lg bg-surface-canvas border-2 border-border-default hover:border-status-success-border cursor-pointer transition-colors has-[:checked]:border-status-success-text has-[:checked]:bg-status-success-bg/30 text-center">
                            <input type="radio" name="status" value="Disetujui" required class="sr-only"/>
                            <span class="material-symbols-outlined text-status-success-text text-[32px] mb-1">check_circle</span>
                            <span class="font-label-md text-status-success-text font-bold">Setujui Usulan</span>
                            <span class="font-body-sm text-text-muted text-[11px] mt-0.5">Memenuhi kriteria bansos</span>
                        </label>

                        <label class="flex flex-col items-center justify-center p-space-md rounded-lg bg-surface-canvas border-2 border-border-default hover:border-status-danger-border cursor-pointer transition-colors has-[:checked]:border-status-danger-text has-[:checked]:bg-status-danger-bg/30 text-center">
                            <input type="radio" name="status" value="Ditolak" class="sr-only"/>
                            <span class="material-symbols-outlined text-status-danger-text text-[32px] mb-1">cancel</span>
                            <span class="font-label-md text-status-danger-text font-bold">Tolak Usulan</span>
                            <span class="font-body-sm text-text-muted text-[11px] mt-0.5">Tidak memenuhi kriteria</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="catatan_verifikasi">
                        Catatan Verifikasi / Hasil Tinjauan Lapangan
                    </label>
                    <textarea name="catatan_verifikasi" id="catatan_verifikasi" rows="3"
                              placeholder="Masukkan catatan pendukung atau alasan keputusan..."
                              class="w-full p-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary resize-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-space-sm pt-space-md border-t border-border-default">
                    <a href="<?= base_url('pengajuan') ?>"
                       class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                        Batal
                    </a>
                    <button type="submit"
                            class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer">
                        <span class="material-symbols-outlined text-[18px] mr-1">verified</span>
                        <span>Simpan Keputusan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
