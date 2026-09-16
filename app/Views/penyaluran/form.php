<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full max-w-3xl mx-auto space-y-space-lg pb-margin">
    <!-- Top Breadcrumb -->
    <div class="flex items-center gap-space-xs text-text-muted font-body-sm">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
            <span class="material-symbols-outlined text-[16px]">home</span>
            <span>Dashboard</span>
        </a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="<?= base_url('penyaluran') ?>">Penyaluran Bantuan</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-text-primary font-label-md">Catat Penyaluran</span>
    </div>

    <!-- Form Card -->
    <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">
        <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
            <div class="flex items-center gap-space-sm">
                <a href="<?= base_url('penyaluran') ?>" class="p-1 rounded text-text-muted hover:text-text-primary hover:bg-surface-card transition-colors">
                    <span class="material-symbols-outlined text-[20px]">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Pencatatan Realisasi Penyaluran</h2>
                    <p class="font-body-sm text-body-sm text-text-muted">Dokumentasi penyerahan bantuan kepada penerima manfaat yang disetujui</p>
                </div>
            </div>
        </div>

        <form action="<?= base_url('penyaluran/store') ?>" method="POST" enctype="multipart/form-data" class="p-space-lg flex flex-col gap-space-lg">
            <?= csrf_field() ?>

            <!-- Pengajuan Disetujui Select -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="pengajuan_id">
                    Pilih Pengajuan Bantuan yang Telah Disetujui <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="pengajuan_id" id="pengajuan_id" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Usulan Disetujui --</option>
                        <?php foreach ($pengajuan_disetujui as $p): ?>
                        <option value="<?= $p['id'] ?>" <?= old('pengajuan_id') == $p['id'] ? 'selected' : '' ?>>
                            <?= esc($p['nik']) ?> - <?= esc($p['nama_lengkap']) ?> (<?= esc($p['nama_bantuan']) ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
                <?php if (empty($pengajuan_disetujui)): ?>
                <span class="text-[12px] text-status-warning-text mt-1 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">info</span> Belum ada pengajuan berstatus 'Disetujui' yang belum disalurkan.
                </span>
                <?php endif; ?>
            </div>

            <!-- Tanggal Penyaluran -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="tanggal_penyaluran">
                    Tanggal Penyaluran <span class="text-status-danger-text">*</span>
                </label>
                <input type="date" name="tanggal_penyaluran" id="tanggal_penyaluran" required
                       value="<?= old('tanggal_penyaluran', date('Y-m-d')) ?>"
                       class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary font-code-tabular"/>
            </div>

            <!-- Jumlah & Satuan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
                <div class="md:col-span-2 flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="jumlah_bantuan">
                        Jumlah Bantuan yang Diberikan <span class="text-status-danger-text">*</span>
                    </label>
                    <input type="number" name="jumlah_bantuan" id="jumlah_bantuan" required step="0.01" min="0"
                           value="<?= old('jumlah_bantuan') ?>" placeholder="Contoh: 300000"
                           class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary font-code-tabular"/>
                </div>
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="satuan">Satuan</label>
                    <div class="relative">
                        <select name="satuan" id="satuan"
                                class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                            <option value="Rupiah">Rupiah</option>
                            <option value="Kg">Kg</option>
                            <option value="Paket">Paket</option>
                            <option value="Liter">Liter</option>
                        </select>
                        <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metode Penyaluran -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="metode_penyaluran">
                    Metode Penyaluran <span class="text-status-danger-text">*</span>
                </label>
                <div class="relative">
                    <select name="metode_penyaluran" id="metode_penyaluran" required
                            class="w-full h-[40px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors border border-border-default focus:border-primary cursor-pointer">
                        <option value="">-- Pilih Metode --</option>
                        <option value="Tunai" <?= old('metode_penyaluran') === 'Tunai' ? 'selected' : '' ?>>Tunai (Cash di Kantor/Rumah)</option>
                        <option value="Transfer" <?= old('metode_penyaluran') === 'Transfer' ? 'selected' : '' ?>>Transfer Bank / Pos</option>
                        <option value="Barang" <?= old('metode_penyaluran') === 'Barang' ? 'selected' : '' ?>>Barang Fisik / Sembako</option>
                    </select>
                    <div class="absolute right-3 top-2.5 flex items-center pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Bukti Penyaluran -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="bukti_penyaluran">
                    Unggah Bukti Penyaluran (Foto Dokumentasi / Tanda Terima)
                </label>
                <input type="file" name="bukti_penyaluran" id="bukti_penyaluran" accept="image/*,.pdf"
                       class="w-full px-space-md py-1.5 rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"/>
                <span class="text-[12px] text-text-muted mt-1">Format foto JPG, PNG atau file PDF berita acara penyerahan.</span>
            </div>

            <!-- Keterangan -->
            <div class="flex flex-col">
                <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="keterangan">
                    Catatan Penyaluran
                </label>
                <textarea name="keterangan" id="keterangan" rows="2"
                          placeholder="Catatan pelaksanaan penyaluran..."
                          class="w-full p-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary resize-none"><?= old('keterangan') ?></textarea>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-space-sm pt-space-md border-t border-border-default">
                <a href="<?= base_url('penyaluran') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    Batal
                </a>
                <button type="submit"
                        class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] mr-1">save</span>
                    <span>Simpan Penyaluran</span>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
