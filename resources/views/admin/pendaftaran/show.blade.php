<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pengajuan | SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #193b63;
            color: white;
            padding: 28px 15px;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h1 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .logo p {
            font-size: 11px;
            line-height: 1.5;
            color: #dbe7f3;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            text-decoration: none;
            color: white;
            padding: 13px 15px;
            border-radius: 6px;
            font-size: 14px;
        }

        .menu a:hover {
            background: #28598a;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #dfe4ea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .topbar h2 {
            color: #12355b;
            font-size: 20px;
        }

        .admin-area {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 13px;
            font-weight: bold;
        }

        .logout {
            background: #dc3545;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* CONTENT */
        .content {
            padding: 30px;
            max-width: 1100px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #12355b;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .page-title {
            margin-bottom: 20px;
        }

        .page-title h1 {
            color: #12355b;
            font-size: 26px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #6b7280;
            font-size: 13px;
        }

        /* STATUS */
        .status-box {
            background: white;
            border: 1px solid #dfe4ea;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status-title {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .menunggu {
            background: #fff7ed;
            color: #c2410c;
        }

        .disetujui {
            background: #ecfdf5;
            color: #047857;
        }

        .ditolak {
            background: #fef2f2;
            color: #b91c1c;
        }

        .dibatalkan {
            background: #f3f4f6;
            color: #4b5563;
        }

        /* CARD */
        .card {
            background: white;
            border: 1px solid #dfe4ea;
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-title {
            padding: 17px 20px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
            color: #12355b;
            font-size: 15px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .item {
            border-bottom: 1px solid #edf0f2;
            padding-bottom: 12px;
        }

        .label {
            display: block;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .value {
            color: #1f2937;
            font-size: 14px;
            font-weight: 600;
        }

        .full {
            grid-column: 1 / -1;
        }

        .keperluan {
            line-height: 1.7;
            font-weight: normal;
        }

        .badge-ada {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            background: #fff7ed;
            color: #c2410c;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-tidak {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: bold;
        }

        /* CATATAN */
        .catatan {
            background: #f8fafc;
            border-left: 4px solid #12355b;
            padding: 15px;
            line-height: 1.6;
            font-size: 13px;
        }

        /* ACTION */
        .action-card {
            background: white;
            border: 1px solid #dfe4ea;
            border-radius: 8px;
            padding: 20px;
        }

        .action-card h3 {
            color: #12355b;
            font-size: 15px;
            margin-bottom: 15px;
        }

        textarea {
            width: 100%;
            min-height: 90px;
            resize: vertical;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            margin-bottom: 10px;
        }

        textarea:focus {
            outline: none;
            border-color: #12355b;
        }

        .btn {
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-setuju {
            background: #198754;
        }

        .btn-setuju:hover {
            background: #157347;
        }

        .btn-tolak {
            background: #dc3545;
        }

        .btn-tolak:hover {
            background: #bb2d3b;
        }

        .info {
            color: #64748b;
            font-size: 12px;
            margin-top: 10px;
        }

        /* ALERT */
        .alert {
            padding: 14px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* MOBILE */
        @media (max-width: 800px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h1>SAPA</h1>

            <p>
                Sistem Aplikasi Pemakai Aula
            </p>
        </div>

        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.history') }}">
                Riwayat Pendaftaran
            </a>

            <a href="{{ route('admin.aulas') }}">
                Data Aula
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <div class="topbar">

            <h2>
                Detail Pendaftaran
            </h2>

            <div class="admin-area">

                <span>
                    {{ $user->name }}
                </span>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout"
                    >
                        Logout
                    </button>
                </form>

            </div>

        </div>


        <div class="content">

            <a
                href="{{ route('admin.history') }}"
                class="back"
            >
                ← Kembali ke Riwayat Pendaftaran
            </a>


            <div class="page-title">

                <h1>
                    Detail Pengajuan
                </h1>

                <p>
                    Informasi lengkap mengenai pengajuan
                    pemakaian aula.
                </p>

            </div>


            <!-- ALERT -->
            @if(session('success'))

                <div class="alert success">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('error'))

                <div class="alert error">
                    {{ session('error') }}
                </div>

            @endif


            <!-- STATUS -->
            <div class="status-box">

                <div>

                    <div class="status-title">
                        STATUS PENGAJUAN
                    </div>

                    <span class="status {{ $pendaftaran->status }}">
                        {{ ucfirst($pendaftaran->status) }}
                    </span>

                </div>


                <div style="text-align: right;">

                    <div class="status-title">
                        NOMOR PENGAJUAN
                    </div>

                    <strong>
                        #{{ $pendaftaran->id }}
                    </strong>

                </div>

            </div>


            <!-- DATA PEMOHON -->
            <div class="card">

                <div class="card-title">
                    Data Pemohon
                </div>

                <div class="card-body">

                    <div class="grid">

                        <div class="item">

                            <span class="label">
                                Nama Pemohon
                            </span>

                            <div class="value">
                                {{ $pendaftaran->nama_pemohon ?? '-' }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                NIP
                            </span>

                            <div class="value">
                                {{ $pendaftaran->nip ?? '-' }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Jabatan
                            </span>

                            <div class="value">
                                {{ $pendaftaran->jabatan ?? '-' }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Email
                            </span>

                            <div class="value">
                                {{ $pendaftaran->email ?? '-' }}
                            </div>

                        </div>


                        <div class="item full">

                            <span class="label">
                                Unit Organisasi
                            </span>

                            <div class="value">
                                {{ $pendaftaran->unit_organisasi ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- DATA PEMAKAIAN AULA -->
            <div class="card">

                <div class="card-title">
                    Data Pemakaian Aula
                </div>

                <div class="card-body">

                    <div class="grid">

                        <div class="item">

                            <span class="label">
                                Jenis Aula
                            </span>

                            <div class="value">
                                {{ $pendaftaran->aula->nama_aula ?? '-' }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Kapasitas Aula
                            </span>

                            <div class="value">
                                {{ $pendaftaran->aula->kapasitas ?? '-' }}
                                orang
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Hari
                            </span>

                            <div class="value">

                                @php
                                    $hari = [
                                        'Sunday' => 'Minggu',
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu',
                                    ];

                                    $tanggal = \Carbon\Carbon::parse($pendaftaran->tanggal);
                                @endphp

                                {{ $hari[$tanggal->format('l')] ?? $tanggal->format('l') }}

                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Tanggal
                            </span>

                            <div class="value">
                                {{ $tanggal->format('d-m-Y') }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Jam Mulai
                            </span>

                            <div class="value">
                                {{ \Carbon\Carbon::parse($pendaftaran->jam_mulai)->format('H:i') }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Jam Selesai
                            </span>

                            <div class="value">
                                {{ \Carbon\Carbon::parse($pendaftaran->jam_selesai)->format('H:i') }}
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Jumlah Peserta
                            </span>

                            <div class="value">
                                {{ $pendaftaran->jumlah_peserta ?? 0 }}
                                orang
                            </div>

                        </div>


                        <div class="item">

                            <span class="label">
                                Peserta Pihak Luar
                            </span>

                            <div class="value">

                                @if($pendaftaran->peserta_pihak_luar === 'ada')

                                    <span class="badge-ada">
                                        ADA
                                    </span>

                                @else

                                    <span class="badge-tidak">
                                        TIDAK ADA
                                    </span>

                                @endif

                            </div>

                        </div>


                        <div class="item full">

                            <span class="label">
                                Keperluan
                            </span>

                            <div class="value keperluan">
                                {{ $pendaftaran->keperluan ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- CATATAN ADMIN -->
            @if($pendaftaran->catatan_admin)

                <div class="card">

                    <div class="card-title">
                        Catatan Admin
                    </div>

                    <div class="card-body">

                        <div class="catatan">
                            {{ $pendaftaran->catatan_admin }}
                        </div>

                    </div>

                </div>

            @endif


            <!-- ACTION -->
            @if($pendaftaran->status == 'menunggu')

                <div class="action-card">

                    <h3>
                        Proses Pengajuan
                    </h3>


                    <!-- SETUJUI -->
                    <form
                        action="{{ route('admin.pendaftaran.approve', $pendaftaran->id) }}"
                        method="POST"
                        style="margin-bottom: 20px;"
                    >

                        @csrf
                        @method('PUT')

                        <textarea
                            name="catatan_admin"
                            placeholder="Catatan admin (opsional)"
                        ></textarea>

                        <button
                            type="submit"
                            class="btn btn-setuju"
                            onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')"
                        >
                            ✓ SETUJUI PENGAJUAN
                        </button>

                    </form>


                    <!-- TOLAK -->
                    <form
                        action="{{ route('admin.pendaftaran.reject', $pendaftaran->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')

                        <textarea
                            name="catatan_admin"
                            placeholder="Alasan penolakan wajib diisi"
                            required
                        ></textarea>

                        <button
                            type="submit"
                            class="btn btn-tolak"
                            onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan ini?')"
                        >
                            ✕ TOLAK PENGAJUAN
                        </button>

                    </form>


                    <div class="info">
                        Jika menolak pengajuan,
                        alasan penolakan wajib dicantumkan.
                    </div>

                </div>

            @else

                <div class="action-card">

                    <h3>
                        Pengajuan Sudah Diproses
                    </h3>

                    <p class="info">

                        Pengajuan ini sudah memiliki status

                        <strong>
                            {{ ucfirst($pendaftaran->status) }}
                        </strong>

                        dan tidak dapat diproses kembali.

                    </p>

                </div>

            @endif

        </div>

    </main>

</body>

</html>