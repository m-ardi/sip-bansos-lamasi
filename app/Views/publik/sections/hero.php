<!-- Hero Section -->
<section class="relative w-full border-b border-slate-200 overflow-hidden bg-slate-900 text-white" id="beranda">
    <!-- Full-Width Majestic Carousel Slide Banner -->
    <div class="relative min-h-[520px] lg:min-h-[580px] w-full flex items-end">
        <!-- Background Image with Gradient Overlay -->
        <img alt="Bentang alam persawahan terpadu irigasi Bendungan Lamasi, Luwu" class="absolute inset-0 w-full h-full object-cover object-center brightness-[0.88] contrast-[1.03] transition-all duration-700 ease-out scale-100" src="<?= base_url('assets/publik/images/hero-sawah.jpg') ?>">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-900/40 to-slate-950/20"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-transparent via-slate-900/10 to-slate-950/60"></div>
        
        <!-- Slide Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-12 w-full pt-28 pb-14 lg:pb-16">
            <div class="max-w-3xl space-y-5">
                <div class="inline-flex items-center pl-2.5 border-l-2 border-emerald-400 text-xs font-mono tracking-wider uppercase text-emerald-300">
                    <span id="hero-badge">Sentra Pangan &amp; Ibukota Kawasan Walmas</span>
                </div>
                <h1 id="hero-title" class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white leading-[1.18] transition-opacity duration-300">
                    Pusat Pemerintahan, Layanan Publik &amp; Ketahanan Pangan Lamasi
                </h1>
                <p id="hero-desc" class="text-sm sm:text-base lg:text-lg text-slate-200 leading-relaxed font-normal max-w-2xl text-shadow transition-opacity duration-300">
                    Hamparan persawahan subur terpadu Bendungan Lamasi menyatu dengan pelayanan kependudukan terpadu, pusat rujukan pendidikan, serta fasilitas kesehatan di jantung Kabupaten Luwu.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a class="px-5 py-2.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-semibold inline-flex items-center gap-2 shadow-sm transition-colors" href="<?= base_url('/#pendidikan') ?>">
                        <span class="material-symbols-outlined text-[18px]">school</span>
                        <span>Sarana Pendidikan &amp; Layanan</span>
                    </a>
                    <a class="px-5 py-2.5 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/25 text-white text-sm font-medium transition-colors" href="<?= base_url('/#profil') ?>">
                        Profil &amp; Tata Kelola
                    </a>
                    <a class="px-5 py-2.5 rounded-lg bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/25 text-white text-sm font-medium transition-colors" href="<?= base_url('/#kependudukan') ?>">
                        Statistik Warga
                    </a>
                </div>
            </div>

            <!-- Carousel Navigation & Interactive Pills Bar -->
            <div class="mt-10 pt-6 border-t border-white/15 flex flex-wrap items-center justify-between gap-4 text-xs font-mono">
                <!-- Slide Tabs Indicator -->
                <div class="flex items-center gap-2 sm:gap-4">
                    <button class="hero-tab-btn flex items-center gap-2 px-3 py-1.5 rounded-full bg-white text-slate-900 font-semibold shadow-sm text-left transition-all" type="button">
                        <span class="tab-bar w-1 h-0.5 rounded-sm bg-emerald-600"></span>
                        <span>01 / 03 · Bentang Sawah &amp; Irigasi</span>
                    </button>
                    <button class="hero-tab-btn flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-slate-200 text-left transition-colors" type="button">
                        <span class="tab-bar w-1 h-0.5 rounded-sm bg-slate-400"></span>
                        <span>02 / 03 · Sentra Sarana Belajar</span>
                    </button>
                    <button class="hero-tab-btn hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-slate-200 text-left transition-colors" type="button">
                        <span class="tab-bar w-1 h-0.5 rounded-sm bg-slate-400"></span>
                        <span>03 / 03 · Pelayanan Terpadu Warga</span>
                    </button>
                </div>
                <!-- Controls & Meta Location -->
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 text-slate-300">
                        <span class="material-symbols-outlined text-[16px] text-emerald-400">location_on</span>
                        <span id="hero-location">Elevasi 21–40 mdpl · Aliran D.I. Lamasi</span>
                    </div>
                    <div class="flex items-center gap-1.5 pl-2 border-l border-white/20">
                        <button id="hero-prev-btn" aria-label="Slide sebelumnya" class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center hover:bg-white/20 transition-colors text-white" type="button">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button id="hero-next-btn" aria-label="Slide berikutnya" class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center hover:bg-white/20 transition-colors text-white" type="button">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
