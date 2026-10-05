@extends('layouts.app')

@section('title', 'Dashboard Admin | SAPA')

@section('content')

<style>
    .admin-dashboard {
        max-width: 1250px;
        margin: 0 auto;
    }

    .admin-hero {
        background: linear-gradient(135deg, #0d2946, #12355b);
        border-radius: 20px;
        padding: 30px 34px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
    }

    .admin-hero h1 {
        margin: 0 0 8px;
        font-size: 28px;
        font-weight: 800;
    }

    .admin-hero p {
        margin: 0;
        color: #dbeafe;
        font-size: 14px;
        line-height: 1.6;
    }

    .section-title {
        margin-bottom: 15px;
    }

    .section-title h2 {
        margin: 0;
        color: #12355b;
        font-size: 18px;
        font-weight: 800;
    }

    .section-title p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(15, 23, 42, .06);
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 14px;
    }

    .stat-number {
        font-size: 27px;
        font-weight: 800;
        color: #172033;
    }

    .stat-label {
        margin-top: 6px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
    }

    .stat-total .stat-icon {
        background: #eaf2fb;
        color: #12355b;
    }

    .stat-waiting .stat-icon {
        background: #fef3c7;
        color: #b45309;
    }

    .stat-approved .stat-icon {
        background: #dcfce7;
        color: #15803d;
    }

    .stat-rejected .stat-icon {
        background: #fee2e2;
        color: #dc2626;
    }

    .admin-menu {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .menu-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        text-decoration: none;
        box-shadow: 0 6px 20px rgba(15, 23, 42, .05);
        transition: .2s ease;
    }

    .menu-card:hover {
        transform: translateY(-3px);
        border-color: #bfdbfe;
        box-shadow: 0 10px 25px rgba(15, 23, 42, .09);
    }

    .menu-icon {
        width: 44px;
        height: 44px;
        border-radius: 11px;
        background: #eaf2fb;
        color: #12355b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 13px;
    }

    .menu-card h3 {
        margin: 0;
        color: #12355b;
        font-size: 14px;
        font-weight: 800;
    }

    .menu-card p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 11px;
        line-height: 1.5;
    }

    .admin-info {
        margin-top: 20px;
        padding: 17px;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 14px;
        color: #475569;
        font-size: 11px;
        line-height: 1.6;
    }

    .admin-info strong {
        color: #12355b;
    }

    @media(max-width: 950px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .admin-menu {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 550px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .admin-hero {
            padding: 25px;
        }

        .admin-hero h1 {
            font-size: 23px;
        }
    }
</style>

<div class="admin-dashboard">

    {{-- HERO --}}
    <section class="admin-hero">
        <h1>Dashboard Admin</h1>

        <p>
            Selamat datang di panel administrator SAPA.
            Kelola pengajuan penggunaan aula, data aula,
            dan laporan melalui halaman ini.
        </p>
    </section>

    {{-- STATISTIK --}}
    <div class="section-title">
        <h2>Ringkasan Pengajuan</h2>

        <p>
            Statistik penggunaan aula dan pengajuan pendaftaran.
        </p>
    </div>

    <div class="stats-grid">

        <div class="stat-card stat-total">
            <div class="stat-icon">
                ▣
            </div>

            <div class="stat-number">
                {{ $stats['totalPendaftar'] }}
            </div>

            <div class="stat-label">
                Total Pendaftaran
            </div>
        </div>

        <div class="stat-card stat-waiting">
            <div class="stat-icon">
                ◷
            </div>

            <div class="stat-number">
                {{ $stats['menunggu'] }}
            </div>

            <div class="stat-label">
                Menunggu Persetujuan
            </div>
        </div>

        <div class="stat-card stat-approved">
            <div class="stat-icon">
                ✓
            </div>

            <div class="stat-number">
                {{ $stats['disetujui'] }}
            </div>

            <div class="stat-label">
                Disetujui
            </div>
        </div>

        <div class="stat-card stat-rejected">
            <div class="stat-icon">
                !
            </div>

            <div class="stat-number">
                {{ $stats['ditolak'] }}
            </div>

            <div class="stat-label">
                Ditolak
            </div>
        </div>

    </div>

    {{-- MENU ADMIN --}}
    <div class="section-title">
        <h2>Menu Administrator</h2>

        <p>
            Pilih menu yang ingin dikelola.
        </p>
    </div>

    <div class="admin-menu">

        <a href="{{ route('admin.history') }}" class="menu-card">
            <div class="menu-icon">
                ◷
            </div>

            <h3>
                Riwayat Pendaftaran
            </h3>

            <p>
                Periksa, lihat detail, setujui,
                atau tolak pengajuan penggunaan aula.
            </p>
        </a>

        <a href="{{ route('admin.aulas') }}" class="menu-card">
            <div class="menu-icon">
                ▣
            </div>

            <h3>
                Data Aula
            </h3>

            <p>
                Kelola data, kapasitas, fasilitas,
                dan informasi aula.
            </p>
        </a>

        <a href="{{ route('admin.laporan') }}" class="menu-card">
            <div class="menu-icon">
                ▤
            </div>

            <h3>
                Laporan
            </h3>

            <p>
                Lihat dan filter data pendaftaran
                untuk kebutuhan laporan.
            </p>
        </a>

    </div>

    <div class="admin-info">
        <strong>Informasi:</strong>
        Pengajuan baru akan memiliki status
        <strong>Menunggu</strong> sampai diperiksa dan
        diproses oleh administrator.
    </div>

</div>

@endsection