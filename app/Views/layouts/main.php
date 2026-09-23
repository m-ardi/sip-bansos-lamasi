<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= esc($title ?? 'SIP-BANSOS') ?> - Kelurahan Lamasi</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" />
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "surface-subtle": "#F1F5F9",
                    "text-muted": "#64748B",
                    "inverse-on-surface": "#eef0ff",
                    "on-primary-fixed": "#00164e",
                    "on-secondary-container": "#fefcff",
                    "on-primary-container": "#90a8ff",
                    "outline": "#757682",
                    "on-error-container": "#93000a",
                    "surface-container-lowest": "#ffffff",
                    "inverse-surface": "#283044",
                    "error": "#ba1a1a",
                    "text-primary": "#0F172A",
                    "secondary-fixed-dim": "#b4c5ff",
                    "surface-container": "#eaedff",
                    "primary": "#00236f",
                    "status-success-bg": "#DCFCE7",
                    "status-warning-text": "#D97706",
                    "error-container": "#ffdad6",
                    "on-primary-fixed-variant": "#264191",
                    "inverse-primary": "#b6c4ff",
                    "on-surface": "#131b2e",
                    "secondary-fixed": "#dbe1ff",
                    "surface-bright": "#faf8ff",
                    "surface-container-high": "#e2e7ff",
                    "on-secondary": "#ffffff",
                    "on-secondary-fixed": "#00174b",
                    "surface-dim": "#d2d9f4",
                    "text-secondary": "#334155",
                    "status-danger-bg": "#FEE2E2",
                    "tertiary-fixed-dim": "#b0c8f1",
                    "tertiary": "#112b4c",
                    "on-error": "#ffffff",
                    "secondary": "#0051d5",
                    "primary-fixed-dim": "#b6c4ff",
                    "border-strong": "#CBD5E1",
                    "primary-fixed": "#dce1ff",
                    "border-default": "#E2E8F0",
                    "on-tertiary-fixed": "#001b3b",
                    "on-tertiary-container": "#96add5",
                    "on-background": "#131b2e",
                    "surface-card": "#FFFFFF",
                    "on-tertiary": "#ffffff",
                    "status-warning-border": "#FDE68A",
                    "background": "#faf8ff",
                    "surface-container-low": "#f2f3ff",
                    "surface-canvas": "#F8FAFC",
                    "on-primary": "#ffffff",
                    "status-danger-border": "#FCA5A5",
                    "outline-variant": "#c5c5d3",
                    "status-warning-bg": "#FEF3C7",
                    "surface-tint": "#4059aa",
                    "surface-container-highest": "#dae2fd",
                    "on-tertiary-fixed-variant": "#30476a",
                    "on-surface-variant": "#444651",
                    "tertiary-fixed": "#d5e3ff",
                    "surface": "#faf8ff",
                    "surface-variant": "#dae2fd",
                    "status-success-text": "#16A34A",
                    "status-danger-text": "#DC2626",
                    "primary-container": "#1e3a8a",
                    "on-secondary-fixed-variant": "#003ea8",
                    "secondary-container": "#316bf3",
                    "status-success-border": "#86EFAC",
                    "tertiary-container": "#2a4163"
                },
                borderRadius: {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
                },
                spacing: {
                    "margin": "2rem",
                    "space-sm": "0.5rem",
                    "gutter": "1.5rem",
                    "margin-sm": "1rem",
                    "gutter-sm": "1rem",
                    "space-md": "0.75rem",
                    "space-lg": "1.25rem",
                    "space-xs": "0.25rem",
                    "space-xl": "1.75rem"
                },
                fontFamily: {
                    "code-tabular": ["Inter"],
                    "body-sm": ["Inter"],
                    "label-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "display-kpi": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-md": ["Inter"],
                    "body-md": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-sm": ["Inter"],
                    "headline-md": ["Inter"]
                },
                fontSize: {
                    "code-tabular": ["13px", {"lineHeight": "18px", "fontWeight": "500"}],
                    "body-sm": ["13px", {"lineHeight": "18px", "fontWeight": "400"}],
                    "label-lg": ["14px", {"lineHeight": "20px", "fontWeight": "600"}],
                    "label-sm": ["11px", {"lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600"}],
                    "display-kpi": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["13px", {"lineHeight": "18px", "fontWeight": "500"}],
                    "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "headline-lg": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "headline-sm": ["16px", {"lineHeight": "24px", "fontWeight": "600"}],
                    "headline-md": ["20px", {"lineHeight": "28px", "letterSpacing": "-0.005em", "fontWeight": "600"}]
                }
            }
        }
    };
    </script>
    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
        @media print {
            aside, header, .no-print { display: none !important; }
            .pl-64 { padding-left: 0 !important; }
            main { padding-top: 0 !important; }
        }
    </style>
</head>
<body class="bg-surface-canvas font-body-md text-text-primary min-h-screen antialiased">
    <?php
        $uri = service('uri');
        $segment1 = ($uri->getTotalSegments() > 0) ? $uri->getSegment(1) : 'dashboard';
        $userRole = session('role') ?? 'petugas';
        $userName = session('nama') ?? 'Operator Bansos';
    ?>
    <!-- Loading Progress Bar for Seamless Navigation -->
    <div id="pjax-loader" class="fixed top-0 left-0 h-[3px] bg-secondary z-50 transition-all duration-300 pointer-events-none" style="width: 0%; opacity: 0;"></div>

    <!-- Mobile Backdrop Overlay -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-40 hidden lg:hidden transition-opacity duration-300"></div>

    <!-- ASIDE SIDEBAR (Persistent, Responsive Drawer on Mobile, Fixed on Desktop) -->
    <aside id="app-sidebar" class="fixed left-0 top-0 h-full w-64 bg-tertiary text-on-tertiary z-50 flex flex-col justify-between select-none transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-xl lg:shadow-none">
        <div class="flex flex-col flex-1 overflow-y-auto">
            <!-- Brand Header -->
            <div class="h-16 px-4 flex items-center justify-between bg-tertiary border-b border-tertiary-container shrink-0">
                <a href="<?= base_url('dashboard') ?>" class="flex items-center gap-3">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo LamasiBantu" class="h-10 w-10 object-contain rounded-xl bg-white p-0.5 shadow-sm shrink-0 border border-white/20" />
                    <div class="flex flex-col">
                        <span class="font-headline-sm text-[17px] font-bold tracking-tight text-white leading-none">Lamasi</span>
                        <span class="font-label-sm text-[10px] text-on-tertiary-container uppercase tracking-wider mt-1">SIP-BANSOS LAMASI</span>
                    </div>
                </a>
                <!-- Mobile Close Button -->
                <button id="mobile-close-sidebar" type="button" class="lg:hidden p-1.5 rounded-lg text-on-tertiary-container hover:text-white hover:bg-tertiary-container transition-colors cursor-pointer" aria-label="Tutup Menu">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- Menu Category -->
            <div class="px-space-md py-space-sm">
                <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-tertiary-container px-space-sm">Menu Utama</span>
            </div>

            <!-- Navigation Links -->
            <nav id="sidebar-nav" class="flex-1 px-space-sm space-y-space-xs">
                <!-- Dashboard -->
                <a href="<?= base_url('dashboard') ?>" data-path="dashboard"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'dashboard' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">grid_view</span>
                    <span class="font-label-md text-label-md">Dashboard</span>
                </a>

                <!-- Data Penerima -->
                <a href="<?= base_url('penerima') ?>" data-path="penerima"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'penerima' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">groups</span>
                    <span class="font-label-md text-label-md">Data Penerima</span>
                </a>

                <!-- Jenis Bantuan (Admin Only) -->
                <?php if ($userRole === 'admin'): ?>
                <a href="<?= base_url('jenis-bantuan') ?>" data-path="jenis-bantuan"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'jenis-bantuan' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">inventory_2</span>
                    <span class="font-label-md text-label-md">Jenis Bantuan</span>
                </a>
                <?php endif; ?>

                <!-- Pengajuan Bantuan -->
                <a href="<?= base_url('pengajuan') ?>" data-path="pengajuan"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'pengajuan' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">assignment_turned_in</span>
                    <span class="font-label-md text-label-md">Pengajuan Bantuan</span>
                </a>

                <!-- Penyaluran Bantuan -->
                <a href="<?= base_url('penyaluran') ?>" data-path="penyaluran"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'penyaluran' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">local_shipping</span>
                    <span class="font-label-md text-label-md">Penyaluran Bantuan</span>
                </a>

                <!-- Laporan -->
                <a href="<?= base_url('laporan') ?>" data-path="laporan"
                   class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'laporan' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                    <span class="material-symbols-outlined text-[20px]">summarize</span>
                    <span class="font-label-md text-label-md">Laporan</span>
                </a>

                <!-- Pengaturan -->
                <?php if ($userRole === 'admin'): ?>
                <div class="pt-space-md mt-space-sm border-t border-tertiary-container">
                    <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-tertiary-container px-space-sm block mb-space-xs">Pengaturan</span>
                    <a href="<?= base_url('pengguna') ?>" data-path="pengguna"
                       class="nav-link flex items-center gap-space-md px-space-md py-space-sm rounded transition-colors <?= $segment1 === 'pengguna' ? 'bg-primary-container text-surface-container-lowest font-label-lg shadow-sm border-l-4 border-secondary-container' : 'text-on-tertiary-container hover:bg-tertiary-container hover:text-on-tertiary' ?>">
                        <span class="material-symbols-outlined text-[20px]">admin_panel_settings</span>
                        <span class="font-label-md text-label-md">Data Pengguna</span>
                    </a>
                </div>
                <?php endif; ?>
            </nav>
        </div>
    </aside>

    <!-- CONTENT WRAPPER (Responsive Margin) -->
    <div class="pl-0 lg:pl-64 min-h-screen flex flex-col transition-all duration-300">
        <!-- TOPBAR HEADER (Responsive Width) -->
        <header class="fixed top-0 left-0 lg:left-64 right-0 h-16 bg-surface-card border-b border-border-default z-30 flex items-center justify-between px-4 sm:px-6 transition-all duration-300">
            <div class="flex items-center gap-3">
                <!-- Hamburger Button (Mobile / Tablet) -->
                <button id="mobile-menu-btn" type="button"
                        class="lg:hidden p-2 -ml-2 text-text-secondary hover:text-primary hover:bg-surface-subtle rounded-lg transition-colors cursor-pointer flex items-center justify-center"
                        aria-label="Buka Menu Navigasi">
                    <span class="material-symbols-outlined text-[24px]">menu</span>
                </button>

                <!-- Brand (hidden on mobile, visible sm+) -->
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo"
                     class="h-8 w-8 object-contain rounded-lg bg-white p-0.5 shadow-xs border border-border-default shrink-0 hidden sm:block" />

                <div class="hidden sm:flex flex-col">
                    <span class="font-label-md text-label-md text-text-primary leading-tight font-bold">
                        Kelurahan Lamasi
                    </span>
                    <span class="font-body-sm text-[11px] text-text-muted leading-tight mt-0.5">
                        <?= date('l, d F Y') ?> • Kab. Luwu
                    </span>
                </div>
            </div>

            <!-- Right User Info & Actions -->
            <div class="flex items-center gap-2 sm:gap-4">
                <!-- User avatar + name: hidden on mobile, visible md+ -->
                <div class="hidden md:flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-xs shrink-0 shadow-xs">
                        <?= strtoupper(substr($userName, 0, 1)) ?>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="font-label-md text-[13px] text-text-primary leading-none font-medium"><?= esc($userName) ?></span>
                        <span class="font-label-sm text-[11px] text-text-muted mt-1 leading-none uppercase"><?= esc($userRole) ?></span>
                    </div>
                </div>
                <div class="hidden md:block h-5 w-px bg-border-default"></div>
                <a href="<?= base_url('logout') ?>" data-no-pjax="true"
                   class="p-2 text-text-secondary hover:text-error hover:bg-status-danger-bg rounded-lg transition-colors cursor-pointer flex items-center justify-center"
                   title="Keluar dari Sistem">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </a>
            </div>
        </header>

        <!-- MAIN VIEW CONTENT (Target Container for Seamless Transitions) -->
        <main id="main-content" class="w-full pt-16 bg-surface-canvas flex-1">
            <div id="page-content" class="w-full px-4 sm:px-6 lg:px-8 py-4 sm:py-6 transition-opacity duration-200">
                <!-- FLASH NOTIFICATIONS -->
                <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-5 bg-status-success-bg border border-status-success-border text-status-success-text p-3 rounded-lg flex items-start gap-2.5 transition-opacity" role="alert">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0 mt-0.5">check_circle</span>
                    <div class="flex-1 font-body-sm text-body-sm">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-5 bg-status-danger-bg border border-status-danger-border text-status-danger-text p-3 rounded-lg flex items-start gap-2.5 transition-opacity" role="alert">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0 mt-0.5">error</span>
                    <div class="flex-1 font-body-sm text-body-sm">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                <div class="mb-5 bg-status-danger-bg border border-status-danger-border text-status-danger-text p-3 rounded-lg flex items-start gap-2.5 transition-opacity" role="alert">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0 mt-0.5">error</span>
                    <div class="flex-1 font-body-sm text-body-sm">
                        <ul class="list-disc list-inside space-y-0.5">
                            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <li><?= esc($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>

    <!-- SEAMLESS SPA NAVIGATION & RESPONSIVE DRAWER SCRIPT -->
    <script>
    (function() {
        // --- 1. Responsive Mobile Sidebar Drawer Logic ---
        const sidebar = document.getElementById('app-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('mobile-close-sidebar');

        function openSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                backdrop.classList.remove('hidden');
            }
        }

        function closeSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                backdrop.classList.add('hidden');
            }
        }

        if (menuBtn) menuBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (backdrop) backdrop.addEventListener('click', closeSidebar);

        // --- 2. Seamless Navigation (No Sidebar Reload) ---
        const loader = document.getElementById('pjax-loader');
        const contentContainer = document.getElementById('page-content');

        function showLoader() {
            if (!loader) return;
            loader.style.width = '30%';
            loader.style.opacity = '1';
            setTimeout(() => {
                if (loader.style.opacity === '1') loader.style.width = '75%';
            }, 100);
        }

        function hideLoader() {
            if (!loader) return;
            loader.style.width = '100%';
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => { loader.style.width = '0%'; }, 250);
            }, 100);
        }

        function updateActiveSidebar(url) {
            const currentPath = new URL(url, window.location.origin).pathname;
            const navLinks = document.querySelectorAll('#sidebar-nav .nav-link');
            
            const activeClasses = ['bg-primary-container', 'text-surface-container-lowest', 'font-label-lg', 'shadow-sm', 'border-l-4', 'border-secondary-container'];
            const inactiveClasses = ['text-on-tertiary-container', 'hover:bg-tertiary-container', 'hover:text-on-tertiary'];

            navLinks.forEach(link => {
                const linkPath = new URL(link.href, window.location.origin).pathname;
                const isActive = (linkPath === currentPath) || 
                                 (linkPath !== '/' && linkPath !== '/dashboard' && currentPath.startsWith(linkPath));

                if (isActive) {
                    link.classList.remove(...inactiveClasses);
                    link.classList.add(...activeClasses);
                } else {
                    link.classList.remove(...activeClasses);
                    link.classList.add(...inactiveClasses);
                }
            });
        }

        async function navigateTo(url, push = true) {
            showLoader();
            try {
                const response = await fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                if (!response.ok) {
                    window.location.href = url;
                    return;
                }

                // Check if response redirected to login or external
                const redirectedUrl = response.url;
                if (redirectedUrl && redirectedUrl.includes('/login') && !url.includes('/login')) {
                    window.location.href = redirectedUrl;
                    return;
                }

                const htmlText = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(htmlText, 'text/html');

                const newContent = doc.getElementById('page-content');
                if (!newContent) {
                    window.location.href = url;
                    return;
                }

                // Update document title
                document.title = doc.title || document.title;

                // Fade out current content slightly, replace, fade back in
                if (contentContainer) {
                    contentContainer.style.opacity = '0';
                    setTimeout(() => {
                        contentContainer.innerHTML = newContent.innerHTML;
                        contentContainer.style.opacity = '1';

                        // Execute any newly injected inline scripts
                        const scripts = contentContainer.querySelectorAll('script');
                        scripts.forEach(script => {
                            const newScript = document.createElement('script');
                            if (script.src) {
                                newScript.src = script.src;
                            } else {
                                newScript.textContent = script.textContent;
                            }
                            document.body.appendChild(newScript);
                            newScript.remove();
                        });

                        // Dispatch custom event for child components
                        window.dispatchEvent(new CustomEvent('page:loaded', { detail: { url } }));
                    }, 120);
                }

                // Update active state in persistent sidebar
                updateActiveSidebar(url);

                // Update History
                if (push) {
                    history.pushState({ url }, '', url);
                }

                // Close mobile sidebar if open
                closeSidebar();

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });

            } catch (err) {
                console.error('Seamless navigation error:', err);
                window.location.href = url;
            } finally {
                hideLoader();
            }
        }

        // Global click delegator for same-origin links
        document.addEventListener('click', function(e) {
            const targetLink = e.target.closest('a');
            if (!targetLink) return;

            // Check if standard navigation link
            const href = targetLink.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('javascript:')) return;
            if (targetLink.target === '_blank' || targetLink.hasAttribute('download')) return;
            if (targetLink.dataset.noPjax === 'true') return;
            if (href.includes('export-excel') || href.includes('logout')) return;

            // Check same origin
            try {
                const targetUrl = new URL(href, window.location.origin);
                if (targetUrl.origin !== window.location.origin) return;

                // Intercept navigation
                e.preventDefault();
                if (targetUrl.href !== window.location.href) {
                    navigateTo(targetUrl.href, true);
                }
            } catch (ex) {
                // Ignore invalid URLs
            }
        });

        // Popstate handler for Back/Forward buttons
        window.addEventListener('popstate', function(e) {
            navigateTo(window.location.href, false);
        });
    })();
    </script>
</body>
</html>
