<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Masuk Sistem - SIP-BANSOS Kelurahan Lamasi</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "surface-subtle": "#F1F5F9",
                    "text-muted": "#64748B",
                    "surface-container-lowest": "#ffffff",
                    "error": "#ba1a1a",
                    "text-primary": "#0F172A",
                    "primary": "#00236f",
                    "status-success-bg": "#DCFCE7",
                    "status-warning-text": "#D97706",
                    "text-secondary": "#334155",
                    "status-danger-bg": "#FEE2E2",
                    "tertiary": "#112b4c",
                    "secondary": "#0051d5",
                    "border-default": "#E2E8F0",
                    "surface-card": "#FFFFFF",
                    "surface-canvas": "#F8FAFC",
                    "on-primary": "#ffffff",
                    "status-danger-text": "#DC2626",
                    "primary-container": "#1e3a8a"
                },
                fontFamily: {
                    "body-sm": ["Inter"],
                    "label-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-md": ["Inter"],
                    "body-md": ["Inter"],
                    "headline-md": ["Inter"]
                }
            }
        }
    };
    </script>
</head>
<body class="bg-surface-canvas font-body-md text-text-primary min-h-screen flex flex-col justify-center items-center">
    <main class="w-full flex-1 flex items-center justify-center p-6">
        <div class="flex flex-col w-full items-center justify-center relative py-6">
            <!-- Subtle Institutional Watermark Graphic Behind Card -->
            <div class="absolute inset-0 pointer-events-none flex items-center justify-center opacity-[0.035] overflow-hidden select-none">
                <svg class="w-[720px] h-[720px] text-primary" fill="currentColor" viewbox="0 0 200 200">
                    <path d="M100 12 L168 42 V96 C168 140 138 178 100 190 C62 178 32 140 32 96 V42 L100 12 Z M100 26 L48 50 V96 C48 132 71 164 100 174 C129 164 152 132 152 96 V50 L100 26 Z"></path>
                    <circle cx="100" cy="98" fill="none" r="28" stroke="currentColor" stroke-width="6"></circle>
                    <path d="M100 76 V120 M78 98 H122" stroke="currentColor" stroke-linecap="round" stroke-width="6"></path>
                    <path d="M72 138 L100 122 L128 138" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="5"></path>
                </svg>
            </div>

            <!-- Main Login Card Container -->
            <div class="relative w-full max-w-[440px] bg-surface-card rounded-xl shadow-xl p-8 transition-all duration-200 border border-border-default">
                <!-- Institutional Identity Header -->
                <div class="flex flex-col items-center text-center mb-6">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo LamasiBantu" class="h-20 w-20 object-contain rounded-2xl bg-white p-1.5 mb-2 border border-border-default" />
                    <span class="text-[11px] font-semibold text-text-muted tracking-wider uppercase">Pemerintah Kabupaten Luwu</span>
                    <h1 class="text-[22px] font-bold text-text-primary tracking-tight mt-0.5 mb-0.5">
                        LamasiBantu
                    </h1>
                    <p class="text-[13px] text-text-muted max-w-[340px]">
                        SIP-BANSOS Wilayah Kerja Kelurahan Lamasi
                    </p>
                </div>

                <!-- Alert Notifications -->
                <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-5 bg-status-danger-bg p-3 rounded-lg flex items-start gap-2.5 transition-opacity duration-200 border border-status-danger-text/20" id="auth-alert" role="alert">
                    <span class="material-symbols-outlined text-status-danger-text text-[20px] flex-shrink-0 mt-0.5">error</span>
                    <div class="flex-1">
                        <p class="text-[13px] text-status-danger-text font-semibold">Autentikasi Gagal</p>
                        <p class="text-[12px] text-status-danger-text leading-snug mt-0.5">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </p>
                    </div>
                    <button aria-label="Tutup pesan" class="text-status-danger-text opacity-70 hover:opacity-100 p-0.5 rounded transition-colors" onclick="document.getElementById('auth-alert').style.display='none'" type="button">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-5 bg-status-success-bg p-3 rounded-lg flex items-start gap-2.5 transition-opacity duration-200 border border-status-success-text/20">
                    <span class="material-symbols-outlined text-status-success-text text-[20px] flex-shrink-0 mt-0.5">check_circle</span>
                    <div class="flex-1 text-[13px] text-status-success-text font-medium">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Credential Form -->
                <form action="<?= base_url('login') ?>" method="POST" class="flex flex-col gap-4" id="form-login">
                    <?= csrf_field() ?>

                    <!-- Username / NIP Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[13px] font-medium text-text-secondary flex items-center justify-between" for="username">
                            <span>Username atau NIP <span class="text-error">*</span></span>
                        </label>
                        <div class="relative flex items-center">
                            <div class="absolute left-3 flex items-center pointer-events-none text-text-muted">
                                <span class="material-symbols-outlined text-[20px]">badge</span>
                            </div>
                            <input autocomplete="username"
                                   class="w-full h-11 pl-10 pr-3.5 bg-surface-subtle focus:bg-surface-card rounded-lg text-[14px] text-text-primary placeholder:text-text-muted transition-all duration-150 outline-none border border-border-default focus:border-primary focus:shadow-sm"
                                   id="username" name="username"
                                   placeholder="Masukkan Username atau NIP"
                                   value="<?= old('username') ?>"
                                   required="" type="text"/>
                        </div>
                    </div>

                    <!-- Password Field with Visibility Toggle -->
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-[13px] font-medium text-text-secondary" for="password">
                                Kata Sandi <span class="text-error">*</span>
                            </label>
                        </div>
                        <div class="relative flex items-center">
                            <div class="absolute left-3 flex items-center pointer-events-none text-text-muted">
                                <span class="material-symbols-outlined text-[20px]">lock</span>
                            </div>
                            <input autocomplete="current-password"
                                   class="w-full h-11 pl-10 pr-10 bg-surface-subtle focus:bg-surface-card rounded-lg text-[14px] text-text-primary placeholder:text-text-muted transition-all duration-150 outline-none border border-border-default focus:border-primary focus:shadow-sm"
                                   id="password" name="password"
                                   placeholder="Masukkan Kata Sandi"
                                   required="" type="password"/>
                            <button class="absolute right-3 flex items-center text-text-muted hover:text-text-primary transition-colors focus:outline-none"
                                    id="toggle-password" title="Tampilkan sandi" type="button">
                                <span class="material-symbols-outlined text-[20px]" id="password-icon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button class="w-full h-11 bg-primary hover:bg-primary-container text-on-primary font-semibold text-[14px] rounded-lg shadow-sm hover:shadow-md transition-all duration-150 flex items-center justify-center gap-2 mt-2 cursor-pointer"
                            id="submit-btn" type="submit">
                        <span class="material-symbols-outlined text-[20px]">login</span>
                        <span>Masuk ke Sistem</span>
                    </button>
                </form>



                <!-- Footer Copyright & Institutional Credentials -->
                <div class="mt-4 text-center">
                    <p class="text-[11px] text-text-muted leading-tight">
                        &copy; <?= date('Y') ?> Pemerintah Kelurahan Lamasi • Kabupaten Luwu
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Password Visibility Toggle
        const toggleBtn = document.getElementById('toggle-password');
        const pwdInput = document.getElementById('password');
        const pwdIcon = document.getElementById('password-icon');

        if (toggleBtn && pwdInput && pwdIcon) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = pwdInput.type === 'password';
                pwdInput.type = isPassword ? 'text' : 'password';
                pwdIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            });
        }
    </script>
</body>
</html>
