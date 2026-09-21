<!-- Fasilitas Pendidikan (Visual & Comprehensive Ecosystem) -->
<div id="pendidikan">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <p class="text-xs font-mono uppercase tracking-widest text-slate-400">Sarana &amp; Ekosistem Edukasi</p>
            <h2 class="font-display text-2xl sm:text-3xl font-bold text-slate-900 mt-1">Fasilitas Pendidikan Terpadu</h2>
            <p class="text-sm text-slate-600 mt-1 max-w-xl">Pilihan jenjang berkesinambungan dari pendidikan anak usia dini, dasar, madrasah, hingga vokasi kejuruan terapan di Kelurahan Lamasi.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs font-mono text-slate-500 uppercase tracking-wider">5 Jenjang Utama · Zonasi Ramah Anak</span>
        </div>
    </div>
    
    <!-- Visual Hero Card for Education using local image -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8 items-stretch">
        <div class="lg:col-span-6 relative rounded-xl overflow-hidden border border-slate-200 group min-h-[280px]">
            <img alt="Pusat Belajar dan Lingkungan Sekolah di Kelurahan Lamasi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?= base_url('assets/publik/images/sekolah-lamasi.jpg') ?>">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/25 to-transparent"></div>
            <div class="absolute bottom-0 inset-x-0 p-6 text-white space-y-1.5">
                <span class="inline-flex items-center gap-1.5 text-xs font-mono uppercase tracking-wider text-emerald-300 font-medium">
                    <span class="material-symbols-outlined text-[14px]">verified</span> Lingkungan Belajar Inklusif
                </span>
                <h4 class="font-display font-bold text-lg text-white">Pusat Pembelajaran &amp; Kegiatan Komunitas Warga</h4>
                <p class="text-xs text-slate-200 leading-relaxed">Suasana asri berpadu fasilitas modern untuk mendukung kurikulum vokasi, literasi dasar, dan pengembangan bakat generasi muda Walmas.</p>
            </div>
        </div>

        <!-- Tiered School Cards Grid -->
        <div class="lg:col-span-6 space-y-3">
            <!-- SMAN 11 Luwu -->
            <div class="p-4 rounded-xl border border-slate-200 bg-white hover:border-slate-300 hover:shadow-sm transition-all flex items-start justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <h3 class="font-display font-semibold text-slate-900 text-base">SMAN 11 Luwu</h3>
                        <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal">Akreditasi A</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-normal">Dahulu SMAN 1 Lamasi. Sekolah rujukan utama jenjang menengah atas di kawasan Lamasi.</p>
                    <div class="flex flex-wrap items-center gap-3 pt-1 text-[11px] font-mono text-slate-500">
                        <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[13px] text-slate-400">category</span> SMA Negeri</span>
                        <span>•</span>
                        <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[13px] text-slate-400">map</span> Jl. Andi Jemma</span>
                    </div>
                </div>
                <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal whitespace-nowrap">Negeri</span>
            </div>
            <!-- SMKS Harapan Lamasi -->
            <div class="p-4 rounded-xl border border-slate-200 bg-white hover:border-slate-300 hover:shadow-sm transition-all flex items-start justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <h3 class="font-display font-semibold text-slate-900 text-base">SMKS Harapan Lamasi</h3>
                        <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal">Vokasi Terapan</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-normal">Pendidikan kejuruan terapan menyiapkan keahlian teknik, otomotif, dan rekayasa kejuruan.</p>
                    <div class="flex flex-wrap items-center gap-3 pt-1 text-[11px] font-mono text-slate-500">
                        <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[13px] text-slate-400">build</span> Keahlian Teknik &amp; Kejuruan</span>
                    </div>
                </div>
                <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal whitespace-nowrap">Swasta</span>
            </div>
            <!-- SMKS Nusa Prima Lamasi -->
            <div class="p-4 rounded-xl border border-slate-200 bg-white hover:border-slate-300 hover:shadow-sm transition-all flex items-start justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <h3 class="font-display font-semibold text-slate-900 text-base">SMKS Nusa Prima Lamasi</h3>
                        <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal">Bisnis &amp; IT</span>
                    </div>
                    <p class="text-xs text-slate-600 leading-normal">Pendidikan kejuruan di bidang administrasi perkantoran, tata kelola niaga, dan teknologi informasi.</p>
                    <div class="flex flex-wrap items-center gap-3 pt-1 text-[11px] font-mono text-slate-500">
                        <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[13px] text-slate-400">computer</span> TI &amp; Manajemen</span>
                    </div>
                </div>
                <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal whitespace-nowrap">Swasta</span>
            </div>
        </div>
    </div>

    <!-- Secondary Row: SMP & SDN/PAUD Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="p-4 rounded-xl border border-slate-200 bg-[#FBFBFD] flex items-start justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <h3 class="font-display font-semibold text-slate-900 text-sm">SMPN 1 Lamasi</h3>
                    <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal">Negeri</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Lembaga pendidikan menengah pertama negeri sentral di wilayah Lamasi.</p>
                <span class="text-[11px] font-mono text-slate-400 block pt-1">Fasilitas: Sarana Belajar &amp; Pembinaan Siswa</span>
            </div>
        </div>
        <div class="p-4 rounded-xl border border-slate-200 bg-[#FBFBFD] flex items-start justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <h3 class="font-display font-semibold text-slate-900 text-sm">Jejaring SD Negeri &amp; PAUD/TK</h3>
                    <span class="text-xs font-mono uppercase tracking-wider text-slate-400 font-normal">Dasar &amp; Usia Dini</span>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Sekolah dasar negeri serta kelompok belajar usia dini (PAUD/TK) guna menjamin penuntasan wajib belajar.</p>
                <span class="text-[11px] font-mono text-slate-400 block pt-1">Di bawah naungan Korwil Pendidikan Kec. Lamasi</span>
            </div>
        </div>
    </div>
</div>
