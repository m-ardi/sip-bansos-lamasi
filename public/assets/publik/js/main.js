/**
 * Script Interaktif Landing Page Publik Kelurahan Lamasi
 */
document.addEventListener('DOMContentLoaded', function () {
    // Carousel Slide Data & Logic (Hero)
    const slides = [
        {
            title: "Pusat Pemerintahan, Layanan Publik & Ketahanan Pangan Lamasi",
            desc: "Hamparan persawahan subur didukung irigasi teknis Bendungan Lamasi menyatu dengan pelayanan kependudukan, sarana pendidikan, serta fasilitas kesehatan di jantung Kabupaten Luwu.",
            badge: "Sentra Pangan & Wilayah Walmas",
            location: "Elevasi 21–40 mdpl · Wilayah Walmas"
        },
        {
            title: "Fasilitas Pendidikan Lengkap di Kelurahan Lamasi",
            desc: "Menyediakan jenjang pendidikan berkesinambungan dari PAUD/TK, Sekolah Dasar, SMPN 1 Lamasi, SMAN 11 Luwu di Jl. Andi Jemma, hingga SMKS Harapan dan SMKS Nusa Prima.",
            badge: "Ekosistem Pendidikan Terpadu",
            location: "Jejaring Pendidikan SMAN 11, SMKS & SD"
        },
        {
            title: "Pelayanan Kesehatan Primer & Administrasi Terpadu",
            desc: "Puskesmas rawat inap pemerintah melayani kesehatan primer umum, posyandu lansia dan balita, program kesehatan gratis, serta keaktifan Kampung KB binaan BKKBN.",
            badge: "Pelayanan Publik Terpadu",
            location: "Puskesmas Rawat Inap & Kantor Kelurahan"
        }
    ];

    let currentSlide = 0;
    const heroTitle = document.getElementById('hero-title');
    const heroDesc = document.getElementById('hero-desc');
    const heroBadge = document.getElementById('hero-badge');
    const heroLocation = document.getElementById('hero-location');
    const tabButtons = document.querySelectorAll('.hero-tab-btn');
    const prevBtn = document.getElementById('hero-prev-btn');
    const nextBtn = document.getElementById('hero-next-btn');

    function updateHeroSlide(index) {
        if (!heroTitle || !heroDesc) return;
        currentSlide = index;

        // Animate text change
        heroTitle.style.opacity = '0';
        heroDesc.style.opacity = '0';

        setTimeout(() => {
            heroTitle.textContent = slides[currentSlide].title;
            heroDesc.textContent = slides[currentSlide].desc;
            if (heroBadge) heroBadge.textContent = slides[currentSlide].badge;
            if (heroLocation) heroLocation.textContent = slides[currentSlide].location;

            heroTitle.style.opacity = '1';
            heroDesc.style.opacity = '1';
        }, 200);

        // Update active tab button styles
        tabButtons.forEach((btn, i) => {
            if (i === currentSlide) {
                btn.className = "hero-tab-btn flex items-center gap-2 px-3 py-1.5 rounded-full bg-white text-slate-900 font-semibold shadow-sm text-left transition-all";
                const bar = btn.querySelector('.tab-bar');
                if (bar) bar.className = "tab-bar w-4 h-0.5 rounded-sm bg-emerald-600";
            } else {
                btn.className = "hero-tab-btn flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-slate-200 text-left transition-colors";
                const bar = btn.querySelector('.tab-bar');
                if (bar) bar.className = "tab-bar w-4 h-0.5 rounded-sm bg-slate-400";
            }
        });
    }

    if (tabButtons.length > 0) {
        tabButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => updateHeroSlide(index));
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            const nextIdx = (currentSlide - 1 + slides.length) % slides.length;
            updateHeroSlide(nextIdx);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            const nextIdx = (currentSlide + 1) % slides.length;
            updateHeroSlide(nextIdx);
        });
    }
});
