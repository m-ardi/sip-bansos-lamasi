<?= $this->extend('layouts/publik') ?>

<?= $this->section('content') ?>
    <?= $this->include('publik/sections/hero') ?>
    <?= $this->include('publik/sections/kependudukan') ?>
    <?= $this->include('publik/sections/profil') ?>
    
    <!-- Fasilitas Pendidikan & Kesehatan (Clean Editorial Lists) -->
    <section class="py-20 border-b border-slate-100" id="sarana-layanan">
        <div class="max-w-6xl mx-auto px-6 lg:px-12 space-y-20">
            <?= $this->include('publik/sections/pendidikan') ?>
            <?= $this->include('publik/sections/kesehatan') ?>
        </div>
    </section>

    <?= $this->include('publik/sections/pertanian') ?>
    <?= $this->include('publik/sections/cta_login') ?>
<?= $this->endSection() ?>
