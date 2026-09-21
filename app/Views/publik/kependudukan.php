<?= $this->extend('layouts/publik') ?>

<?= $this->section('content') ?>
    <div class="bg-slate-900 text-white py-12 border-b border-slate-800">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <nav class="flex items-center gap-2 text-xs font-mono text-emerald-400 mb-4">
                <a href="<?= base_url() ?>" class="hover:underline flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">home</span> Beranda
                </a>
                <span>/</span>
                <span class="text-slate-300">Data Kependudukan</span>
            </nav>
            <h1 class="font-display text-3xl sm:text-4xl font-bold tracking-tight">Data &amp; Statistik Kependudukan</h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2 max-w-2xl leading-relaxed">
                Gambaran agregat kependudukan terpadu, tingkat kepadatan warga, serta mobilitas di kawasan Kelurahan Lamasi.
            </p>
        </div>
    </div>

    <?= $this->include('publik/sections/kependudukan') ?>
    <?= $this->include('publik/sections/cta_login') ?>
<?= $this->endSection() ?>
