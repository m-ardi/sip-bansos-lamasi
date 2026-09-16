<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $isEdit = !empty($penerima); ?>

<div class="flex flex-col w-full pb-margin">
    <!-- Top Meta & Navigation Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm mb-space-lg">
        <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs text-text-muted font-body-sm text-body-sm">
            <a class="hover:text-primary transition-colors flex items-center gap-1" href="<?= base_url('dashboard') ?>">
                <span class="material-symbols-outlined text-[16px]">home</span>
                <span>Dashboard</span>
            </a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="<?= base_url('penerima') ?>">Data Penerima</a>
            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
            <span class="text-text-primary font-label-md text-label-md"><?= $isEdit ? 'Edit Data Penerima' : 'Tambah Penerima Bantuan Baru' ?></span>
        </nav>
        <div class="inline-flex items-center gap-space-xs px-space-sm py-1 bg-surface-subtle rounded text-text-secondary font-code-tabular text-code-tabular border border-border-default">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
            <span>FORM: REG-LMS-<?= date('Y') ?></span>
        </div>
    </div>

    <!-- Main Administrative Header Banner -->
    <div class="bg-surface-card rounded-lg p-space-lg shadow-sm mb-space-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md border border-border-default">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-space-xs text-text-muted font-label-sm text-label-sm uppercase tracking-wider mb-space-xs">
                <span class="material-symbols-outlined text-[16px]">how_to_reg</span>
                <span>Registrasi Penerima Bantuan Sosial</span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-text-primary">
                <?= $isEdit ? 'Formulir Pembaruan Data Warga Penerima' : 'Formulir Pendaftaran Warga Calon Penerima Bantuan' ?>
            </h1>
            <p class="font-body-sm text-body-sm text-text-muted mt-space-xs">
                Validasi identitas kependudukan dan status kemiskinan wilayah Kelurahan Lamasi.
            </p>
        </div>
    </div>

    <!-- Form Workflow -->
    <form action="<?= $isEdit ? base_url('penerima/update/' . $penerima['id']) : base_url('penerima/store') ?>"
          method="POST" enctype="multipart/form-data" class="flex flex-col gap-space-xl" id="form-penerima">
        <?= csrf_field() ?>

        <!-- SECTION 1: DATA IDENTITAS KEPENDUDUKAN -->
        <section class="bg-surface-card rounded-lg shadow-sm overflow-hidden border border-border-default">
            <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
                <div class="flex items-center gap-space-sm">
                    <div class="w-7 h-7 rounded bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md font-bold">01</div>
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-text-primary leading-tight font-semibold">Data Identitas Kependudukan</h2>
                        <p class="font-body-sm text-body-sm text-text-muted">Kesesuaian identitas mutlak berdasarkan arsip kependudukan resmi</p>
                    </div>
                </div>
            </div>
            <div class="p-space-lg grid grid-cols-1 md:grid-cols-2 gap-x-gutter gap-y-space-lg">
                <!-- NIK -->
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs flex items-center justify-between" for="nik">
                        <span>Nomor Induk Kependudukan (NIK) <span class="text-status-danger-text">*</span></span>
                        <span class="font-code-tabular text-code-tabular text-text-muted" id="nik-counter">16 Digit</span>
                    </label>
                    <div class="relative">
                        <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-code-tabular text-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                               id="nik" maxlength="16" name="nik" placeholder="7317xxxxxxxxxxxx"
                               value="<?= old('nik', $penerima['nik'] ?? '') ?>" required="" type="text"/>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[18px]">badge</span>
                        </div>
                    </div>
                    <span class="font-body-sm text-body-sm text-text-muted mt-1">16 digit sesuai e-KTP kepala keluarga / pemohon.</span>
                </div>

                <!-- Nama Lengkap -->
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="nama_lengkap">
                        Nama Lengkap Sesuai KTP <span class="text-status-danger-text">*</span>
                    </label>
                    <div class="relative">
                        <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary uppercase"
                               id="nama_lengkap" name="nama_lengkap" placeholder="Contoh: MUHAMMAD RUSLI"
                               value="<?= old('nama_lengkap', $penerima['nama_lengkap'] ?? '') ?>" required="" type="text"/>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[18px]">person</span>
                        </div>
                    </div>
                </div>

                <!-- Tempat Lahir -->
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="tempat_lahir">Tempat Lahir</label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="tempat_lahir" name="tempat_lahir" placeholder="Contoh: Lamasi / Luwu"
                           value="<?= old('tempat_lahir', $penerima['tempat_lahir'] ?? '') ?>" type="text"/>
                </div>

                <!-- Tanggal Lahir -->
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="tanggal_lahir" name="tanggal_lahir"
                           value="<?= old('tanggal_lahir', $penerima['tanggal_lahir'] ?? '') ?>" type="date"/>
                </div>

                <!-- Jenis Kelamin -->
                <div class="flex flex-col md:col-span-2">
                    <span class="font-label-md text-label-md text-text-secondary mb-space-xs">Jenis Kelamin <span class="text-status-danger-text">*</span></span>
                    <?php $jk = old('jenis_kelamin', $penerima['jenis_kelamin'] ?? 'L'); ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                        <label class="flex items-center gap-space-md px-space-md py-space-sm rounded bg-surface-canvas cursor-pointer hover:bg-surface-subtle transition-colors border border-border-default">
                            <input class="w-4 h-4 text-primary focus:ring-0" name="jenis_kelamin" type="radio" value="L" <?= $jk === 'L' ? 'checked' : '' ?>/>
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[18px] text-text-secondary">male</span>
                                <span class="font-label-md text-label-md text-text-primary">Laki-laki</span>
                            </div>
                        </label>
                        <label class="flex items-center gap-space-md px-space-md py-space-sm rounded bg-surface-canvas cursor-pointer hover:bg-surface-subtle transition-colors border border-border-default">
                            <input class="w-4 h-4 text-primary focus:ring-0" name="jenis_kelamin" type="radio" value="P" <?= $jk === 'P' ? 'checked' : '' ?>/>
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[18px] text-text-secondary">female</span>
                                <span class="font-label-md text-label-md text-text-primary">Perempuan</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: DATA ALAMAT & DOMISILI -->
        <section class="bg-surface-card rounded-lg shadow-sm overflow-hidden border border-border-default">
            <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
                <div class="flex items-center gap-space-sm">
                    <div class="w-7 h-7 rounded bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md font-bold">02</div>
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-text-primary leading-tight font-semibold">Data Alamat &amp; Domisili</h2>
                        <p class="font-body-sm text-body-sm text-text-muted">Cakupan administratif wilayah Kelurahan Lamasi, Kec. Lamasi</p>
                    </div>
                </div>
            </div>
            <div class="p-space-lg grid grid-cols-1 md:grid-cols-2 gap-x-gutter gap-y-space-lg">
                <div class="flex flex-col md:col-span-2">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="alamat">
                        Alamat Jalan / Tempat Tinggal <span class="text-status-danger-text">*</span>
                    </label>
                    <div class="relative">
                        <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                               id="alamat" name="alamat" placeholder="Contoh: Jl. Poros Lamasi No. 12"
                               value="<?= old('alamat', $penerima['alamat'] ?? '') ?>" required="" type="text"/>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[18px]">location_on</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="rt">RT</label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="rt" name="rt" placeholder="001"
                           value="<?= old('rt', $penerima['rt'] ?? '') ?>" type="text"/>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="rw">RW</label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="rw" name="rw" placeholder="002"
                           value="<?= old('rw', $penerima['rw'] ?? '') ?>" type="text"/>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="kelurahan">Kelurahan <span class="text-status-danger-text">*</span></label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="kelurahan" name="kelurahan"
                           value="<?= old('kelurahan', $penerima['kelurahan'] ?? 'Lamasi') ?>" required="" type="text"/>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="kecamatan">Kecamatan <span class="text-status-danger-text">*</span></label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="kecamatan" name="kecamatan"
                           value="<?= old('kecamatan', $penerima['kecamatan'] ?? 'Lamasi') ?>" required="" type="text"/>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="kabupaten">Kabupaten</label>
                    <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="kabupaten" name="kabupaten"
                           value="<?= old('kabupaten', $penerima['kabupaten'] ?? 'Luwu') ?>" type="text"/>
                </div>
            </div>
        </section>

        <!-- SECTION 3: DATA SOSIAL EKONOMI & KATEGORI -->
        <section class="bg-surface-card rounded-lg shadow-sm overflow-hidden border border-border-default">
            <div class="px-space-lg py-space-md bg-surface-subtle flex items-center justify-between border-b border-border-default">
                <div class="flex items-center gap-space-sm">
                    <div class="w-7 h-7 rounded bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md font-bold">03</div>
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-text-primary leading-tight font-semibold">Data Sosial Ekonomi &amp; Klasifikasi</h2>
                        <p class="font-body-sm text-body-sm text-text-muted">Parameter klasifikasi kelayakan bantuan sosial Kelurahan Lamasi</p>
                    </div>
                </div>
            </div>
            <div class="p-space-lg grid grid-cols-1 md:grid-cols-2 gap-x-gutter gap-y-space-lg">
                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="no_hp">Nomor Telepon / WhatsApp</label>
                    <div class="relative">
                        <input class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary font-code-tabular"
                               id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx"
                               value="<?= old('no_hp', $penerima['no_hp'] ?? '') ?>" type="text"/>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[18px]">call</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="kategori_miskin">
                        Kategori Kemiskinan <span class="text-status-danger-text">*</span>
                    </label>
                    <?php $kat = old('kategori_miskin', $penerima['kategori_miskin'] ?? 'Miskin'); ?>
                    <div class="relative">
                        <select class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors cursor-pointer border border-border-default focus:border-primary"
                                id="kategori_miskin" name="kategori_miskin" required="">
                            <option value="Sangat Miskin" <?= $kat === 'Sangat Miskin' ? 'selected' : '' ?>>Sangat Miskin (Desil 1)</option>
                            <option value="Miskin" <?= $kat === 'Miskin' ? 'selected' : '' ?>>Miskin (Desil 2)</option>
                            <option value="Rentan Miskin" <?= $kat === 'Rentan Miskin' ? 'selected' : '' ?>>Rentan Miskin (Desil 3)</option>
                        </select>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="status_aktif">Status Aktif</label>
                    <?php $statusAktif = old('status_aktif', $penerima['status_aktif'] ?? 'Aktif'); ?>
                    <div class="relative">
                        <select class="w-full h-[38px] px-space-md rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card appearance-none transition-colors cursor-pointer border border-border-default focus:border-primary"
                                id="status_aktif" name="status_aktif">
                            <option value="Aktif" <?= $statusAktif === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Tidak Aktif" <?= $statusAktif === 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                        <div class="absolute right-3 top-2 flex items-center pointer-events-none text-text-muted">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-label-md text-label-md text-text-secondary mb-space-xs" for="foto_ktp">Foto KTP / KK (Maks 2MB)</label>
                    <input class="w-full px-space-md py-1.5 rounded bg-surface-canvas text-text-primary font-body-md focus:outline-none focus:bg-surface-card transition-colors border border-border-default focus:border-primary"
                           id="foto_ktp" name="foto_ktp" accept="image/*,.pdf" type="file"/>
                    <?php if (!empty($penerima['foto_ktp'])): ?>
                    <span class="text-[12px] text-text-muted mt-1">Berkas tersimpan: <?= esc($penerima['foto_ktp']) ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- FOOTER TOMBOL AKSI -->
        <div class="sticky bottom-0 z-30 bg-surface-card shadow-md rounded-lg px-space-lg py-space-sm flex flex-col sm:flex-row items-center justify-between gap-space-md border border-border-default">
            <div class="flex items-center gap-space-xs text-text-muted font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[18px] text-text-secondary">info</span>
                <span>Pastikan kebenaran data identitas sebelum menyimpan.</span>
            </div>
            <div class="flex items-center gap-space-sm w-full sm:w-auto justify-end">
                <a href="<?= base_url('penerima') ?>"
                   class="h-[38px] px-space-md rounded bg-surface-card text-text-secondary font-label-md text-label-md flex items-center justify-center hover:bg-surface-subtle transition-colors border border-border-default">
                    Batal
                </a>
                <button class="h-[38px] px-space-lg rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center hover:bg-primary-container transition-colors shadow-sm cursor-pointer"
                        type="submit">
                    <span class="material-symbols-outlined text-[18px] mr-1.5">check_circle</span>
                    <span><?= $isEdit ? 'Simpan Perubahan' : 'Simpan &amp; Daftarkan Warga' ?></span>
                </button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
