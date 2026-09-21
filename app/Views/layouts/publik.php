<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="web_standard" name="shell-type">
    <title><?= esc($title ?? 'Kelurahan Lamasi — Kabupaten Luwu') ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Tailwind CSS with CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        slate: {
                            850: '#0F172A',
                            900: '#0B1120',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/publik/css/style.css') ?>">
</head>
<body class="bg-white text-slate-850 font-sans selection:bg-slate-900 selection:text-white" style="font-family: Quicksand, sans-serif;">

    <!-- Top Simple Metadata Bar -->
    <div class="border-b border-slate-100 bg-[#FBFBFD] text-slate-500 text-xs py-2 px-6 lg:px-12">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-4 font-mono tracking-tight">
            <div class="flex items-center gap-3 sm:gap-6">
                <span>KODE KEMENDAGRI: 73.17.09.1001</span>
                <span class="text-slate-300">•</span>
                <span>KODEPOS: 91952</span>
                <span class="hidden md:inline text-slate-300">•</span>
                <span class="hidden md:inline">WILAYAH WALMAS</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-px h-3 bg-emerald-400"></span>
                <span class="font-sans text-[11px] text-slate-600 font-medium">Senin – Kamis: 08:00 – 15:30 WITA | Jumat: 08:00 – 11:30 &amp; 13:00 – 15:30 WITA | Sabtu, Minggu &amp; Libur Nasional: Tutup</span>
            </div>
        </div>
    </div>

    <!-- Header / Navigation -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200/80">
        <div class="max-w-6xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between gap-8">
            <a class="flex items-center gap-3.5 group" href="<?= base_url() ?>">
                <img alt="Lambang Kelurahan Lamasi" class="w-10 h-10 object-contain" src="<?= base_url('assets/images/logo.png') ?>">
                <div class="flex flex-col">
                    <span class="font-display font-semibold text-base tracking-tight text-slate-900 group-hover:text-slate-700 transition-colors">
                        Kelurahan Lamasi
                    </span>
                    <span class="text-xs text-slate-500 font-normal">
                        Kecamatan Lamasi, Kabupaten Luwu
                    </span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a class="hover:text-slate-900 transition-colors <?= (isset($activeMenu) && $activeMenu === 'profil') ? 'text-slate-900 font-semibold' : '' ?>" href="<?= base_url('/#profil') ?>">Profil</a>
                <a class="hover:text-slate-900 transition-colors <?= (isset($activeMenu) && $activeMenu === 'kependudukan') ? 'text-slate-900 font-semibold' : '' ?>" href="<?= base_url('/#kependudukan') ?>">Kependudukan</a>
                <a class="hover:text-slate-900 transition-colors <?= (isset($activeMenu) && $activeMenu === 'pendidikan') ? 'text-slate-900 font-semibold' : '' ?>" href="<?= base_url('/#pendidikan') ?>">Pendidikan</a>
                <a class="hover:text-slate-900 transition-colors <?= (isset($activeMenu) && $activeMenu === 'kesehatan') ? 'text-slate-900 font-semibold' : '' ?>" href="<?= base_url('/#kesehatan') ?>">Kesehatan</a>
                <a class="hover:text-slate-900 transition-colors <?= (isset($activeMenu) && $activeMenu === 'pertanian') ? 'text-slate-900 font-semibold' : '' ?>" href="<?= base_url('/#pertanian') ?>">Pertanian</a>
            </nav>
            <div class="flex items-center gap-3">
                <a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-md border border-slate-300 text-xs font-medium text-slate-700 hover:bg-slate-50 hover:text-slate-900 transition-colors" href="<?= base_url('login') ?>">
                    <span class="material-symbols-outlined text-[15px] text-slate-400">lock</span>
                    <span>Login Petugas</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="w-full">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Minimalist Formal Footer -->
    <footer class="bg-white text-slate-600 py-16 text-xs border-t border-slate-100">
        <div class="max-w-6xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b border-slate-100">
                <div class="md:col-span-5 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <img alt="Logo Lamasi" class="w-7 h-7 object-contain" src="<?= base_url('assets/images/logo.png') ?>">
                        <span class="font-display font-semibold text-slate-900 text-sm tracking-tight">Pemerintah Kelurahan Lamasi</span>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed max-w-sm">
                        Kecamatan Lamasi, Kabupaten Luwu, Sulawesi Selatan 91952. Mengedepankan pelayanan publik transparan, akuntabel, dan berkeadilan bagi seluruh lapisan masyarakat Walmas.
                    </p>
                </div>
                <div class="md:col-span-4 space-y-2 font-sans">
                    <p class="font-semibold text-slate-900 uppercase text-[11px] font-mono tracking-wider">Alamat &amp; Kontak</p>
                    <p class="text-slate-500 leading-relaxed">
                        Jl. RM. Diarso Sugondo, Kelurahan Lamasi,<br>
                        Kecamatan Lamasi, Kabupaten Luwu, Sulawesi Selatan 91952
                    </p>
                    <div class="pt-1 space-y-1 text-slate-500 font-mono text-[11px]">
                        <p>E: dkisp@luwukab.go.id</p>
                        <p>T: (0471) 314020</p>
                    </div>
                </div>
                <div class="md:col-span-3 space-y-2">
                    <p class="font-semibold text-slate-900 uppercase text-[11px] font-mono tracking-wider">Tautan Cepat</p>
                    <ul class="space-y-1.5 text-slate-500">
                        <li><a class="hover:text-slate-900 transition-colors" href="<?= base_url('/#profil') ?>">Profil Wilayah</a></li>
                        <li><a class="hover:text-slate-900 transition-colors" href="<?= base_url('/#kependudukan') ?>">Data Kependudukan</a></li>
                        <li><a class="hover:text-slate-900 transition-colors" href="<?= base_url('/#pendidikan') ?>">Fasilitas Pendidikan</a></li>
                        <li><a class="hover:text-slate-900 transition-colors" href="<?= base_url('/#kesehatan') ?>">Puskesmas Lamasi</a></li>
                        <li><a class="hover:text-slate-900 transition-colors" href="<?= base_url('/#pertanian') ?>">Irigasi &amp; Pertanian</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-slate-400 font-mono">
                <p>© 2025 Pemerintah Kelurahan Lamasi — Kabupaten Luwu. Seluruh hak cipta dilindungi.</p>
                <div class="flex items-center gap-4">
                    <a class="hover:text-slate-600 transition-colors" href="#">Luwukab.go.id</a>
                    <span>•</span>
                    <a class="hover:text-slate-600 transition-colors" href="#">Privasi</a>
                    <span>•</span>
                    <a class="hover:text-slate-600 transition-colors" href="#">Aksesibilitas</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="<?= base_url('assets/publik/js/main.js') ?>"></script>
</body>
</html>
