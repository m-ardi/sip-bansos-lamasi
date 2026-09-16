<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex flex-col w-full space-y-space-lg">
    <!-- Breadcrumb & Top Utility Row -->
    <div class="flex items-center justify-between pb-space-md mb-space-md">
        <div class="flex items-center gap-space-xs text-text-muted font-body-sm text-body-sm">
            <a href="<?= base_url('dashboard') ?>" class="flex items-center gap-1 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-[18px]">home</span>
                <span>Dashboard</span>
            </a>
            <span>/</span>
            <span class="text-primary font-label-md text-label-md">Laporan &amp; Rekapitulasi</span>
        </div>
        <div class="flex items-center gap-space-sm">
            <span class="inline-flex items-center gap-space-xs px-space-sm py-0.5 rounded-full bg-surface-subtle text-text-secondary font-code-tabular text-[12px] border border-border-default">
                <span class="w-1.5 h-1.5 rounded-full bg-status-success-text"></span>
                SIP-BANSOS • KELURAHAN LAMASI
            </span>
        </div>
    </div>

    <!-- Page Title Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-surface-card p-space-lg rounded-xl shadow-xs border border-border-default">
        <div>
            <div class="inline-flex items-center gap-1 bg-primary text-on-primary px-2 py-0.5 rounded font-label-sm text-[10px] uppercase tracking-wider mb-1">
                <span class="material-symbols-outlined text-[13px]">verified_user</span>
                <span>Dokumen Resmi</span>
            </div>
            <h1 class="font-headline-lg text-xl sm:text-2xl font-bold text-text-primary tracking-tight">Laporan Penyaluran Bansos</h1>
            <p class="font-body-sm text-xs sm:text-sm text-text-muted mt-0.5">Cetak dokumen fisik &amp; ekspor data penyaluran Kelurahan Lamasi</p>
        </div>
        <div class="flex items-center flex-wrap gap-2 shrink-0 no-print">
            <a href="<?= base_url('laporan/per-penerima') ?>"
               class="inline-flex items-center gap-1.5 bg-surface-subtle hover:bg-surface-card text-text-secondary px-2.5 sm:px-3 py-1.5 rounded font-label-md text-xs sm:text-sm transition-all shadow-xs border border-border-default"
               title="Laporan Per Penerima">
                <span class="material-symbols-outlined text-[16px]">group</span>
                <span class="hidden sm:inline">Per Penerima</span>
            </a>
            <a href="<?= base_url('laporan/export-excel') ?>"
               class="inline-flex items-center gap-1.5 bg-status-success-bg hover:bg-status-success-bg/80 text-status-success-text px-2.5 sm:px-3 py-1.5 rounded font-label-md text-xs sm:text-sm transition-all shadow-xs border border-status-success-border"
               title="Export Excel">
                <span class="material-symbols-outlined text-[18px]">table_chart</span>
                <span class="hidden sm:inline">Export Excel</span>
            </a>
        </div>
    </div>

    <!-- Parameter Form & Interactive Preview -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
        <!-- LEFT PANEL: Filter & Export Config (4 cols) -->
        <div class="xl:col-span-4 flex flex-col gap-space-md">
            <div class="bg-surface-card rounded-xl p-space-lg shadow-sm border border-border-default flex flex-col gap-space-md">
                <div class="flex items-center justify-between border-b border-border-default pb-space-sm">
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-text-primary font-semibold">Parameter Laporan</h2>
                        <p class="font-body-sm text-body-sm text-text-muted mt-0.5">Filter data penyaluran bantuan</p>
                    </div>
                    <span class="font-code-tabular text-[11px] uppercase px-space-xs py-0.5 rounded bg-surface-subtle text-text-muted font-bold">REF-01</span>
                </div>

                <form action="<?= base_url('laporan/cetak') ?>" method="GET" id="formLaporan" class="flex flex-col gap-space-md">
                    <div class="grid grid-cols-2 gap-space-sm">
                        <div>
                            <label class="block font-label-md text-label-md text-text-secondary mb-space-xs" for="bulan">Bulan</label>
                            <div class="relative">
                                <select name="bulan" id="bulan" class="w-full h-10 px-space-sm bg-surface-canvas border border-border-default text-text-primary font-body-md rounded focus:outline-none appearance-none cursor-pointer">
                                    <option value="">Semua Bulan</option>
                                    <?php for ($m = 1; $m <= 12; $m++): ?>
                                    <option value="<?= $m ?>" <?= date('n') == $m ? 'selected' : '' ?>>
                                        <?= date('F', mktime(0,0,0,$m,1)) ?>
                                    </option>
                                    <?php endfor; ?>
                                </select>
                                <span class="material-symbols-outlined absolute right-space-xs top-2.5 text-text-muted pointer-events-none text-[18px]">calendar_month</span>
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-md text-label-md text-text-secondary mb-space-xs" for="tahun">Tahun</label>
                            <div class="relative">
                                <select name="tahun" id="tahun" class="w-full h-10 px-space-sm bg-surface-canvas border border-border-default text-text-primary font-body-md rounded focus:outline-none appearance-none cursor-pointer">
                                    <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                                    <option value="<?= $y ?>" <?= date('Y') == $y ? 'selected' : '' ?>><?= $y ?></option>
                                    <?php endfor; ?>
                                </select>
                                <span class="material-symbols-outlined absolute right-space-xs top-2.5 text-text-muted pointer-events-none text-[18px]">history</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block font-label-md text-label-md text-text-secondary mb-space-xs" for="jenis_bantuan_id">Program Bantuan Sosial</label>
                        <div class="relative">
                            <select name="jenis_bantuan_id" id="jenis_bantuan_id" class="w-full h-10 px-space-md bg-surface-canvas border border-border-default text-text-primary font-body-md rounded focus:outline-none appearance-none cursor-pointer">
                                <option value="">Semua Program (PKH, BPNT, BLT-DD, dll)</option>
                                <?php foreach ($list_jenis as $j): ?>
                                <option value="<?= $j['id'] ?>"><?= esc($j['nama_bantuan']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="material-symbols-outlined absolute right-space-sm top-2.5 text-text-muted pointer-events-none text-[20px]">inventory_2</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 pt-space-xs">
                        <button type="submit" class="w-full h-10 bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md rounded flex items-center justify-center gap-space-xs shadow-sm transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                            <span>Tampilkan Laporan Resmi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT PANEL: Notice / Quick overview (8 cols) -->
        <div class="xl:col-span-8 flex flex-col gap-space-md">
            <div class="bg-surface-card rounded-xl p-8 shadow-sm border border-border-default flex flex-col items-center justify-center text-center min-h-[320px]">
                <div class="w-16 h-16 rounded-full bg-surface-subtle flex items-center justify-center text-primary mb-3">
                    <span class="material-symbols-outlined text-[36px]">print</span>
                </div>
                <h3 class="font-headline-sm text-text-primary font-bold">Siap Cetak &amp; Ekspor Dokumen Resmi</h3>
                <p class="font-body-sm text-text-muted max-w-md mt-1 mb-4">
                    Pilih filter periode dan skema bantuan di panel kiri, kemudian klik <strong>Tampilkan Laporan Resmi</strong> untuk melihat lembar cetak standar A4 lengkap dengan kop surat dan tanda tangan kepala kelurahan.
                </p>
                <div class="flex items-center gap-space-sm">
                    <button type="button" onclick="document.getElementById('formLaporan').submit();"
                            class="px-4 py-2 rounded bg-primary text-on-primary font-label-md text-sm hover:bg-primary-container transition-colors shadow-sm flex items-center gap-1.5 cursor-pointer">
                        <span class="material-symbols-outlined text-[18px]">description</span>
                        <span>Buka Lembar Laporan</span>
                    </button>
                    <a href="<?= base_url('laporan/export-excel') ?>"
                       class="px-4 py-2 rounded bg-surface-card border border-border-default hover:bg-surface-subtle text-text-secondary font-label-md text-sm transition-colors shadow-sm flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[18px] text-status-success-text">table_chart</span>
                        <span>Unduh File Excel</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
