<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pendaftaran | SAPA</title>

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


        /* =========================
           SIDEBAR
        ========================= */

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


        .menu a.active {

            background: #28598a;

            font-weight: bold;
        }


        /* =========================
           MAIN
        ========================= */

        .main {

            margin-left: 240px;

            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

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


        .logout:hover {

            background: #bb2d3b;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {

            padding: 30px;
        }


        .page-title {

            margin-bottom: 25px;
        }


        .page-title h1 {

            color: #12355b;

            font-size: 26px;

            margin-bottom: 7px;
        }


        .page-title p {

            color: #6b7280;

            font-size: 14px;
        }


        /* =========================
           ALERT
        ========================= */

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


        /* =========================
           FILTER
        ========================= */

        .filter-card {

            background: white;

            border: 1px solid #dfe4ea;

            border-radius: 8px;

            padding: 20px;

            margin-bottom: 20px;
        }


        .filter-title {

            color: #12355b;

            font-weight: bold;

            font-size: 14px;

            margin-bottom: 14px;
        }


        .filters {

            display: flex;

            flex-wrap: wrap;

            gap: 9px;
        }


        .filter {

            text-decoration: none;

            padding: 9px 15px;

            border-radius: 5px;

            border: 1px solid #d1d5db;

            color: #475569;

            background: white;

            font-size: 12px;

            font-weight: bold;
        }


        .filter:hover {

            border-color: #12355b;

            color: #12355b;
        }


        .filter.active {

            background: #12355b;

            color: white;

            border-color: #12355b;
        }


        /* =========================
           TABLE
        ========================= */

        .table-card {

            background: white;

            border: 1px solid #dfe4ea;

            border-radius: 8px;

            overflow: hidden;
        }


        .table-header {

            padding: 18px 20px;

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .table-header h3 {

            color: #12355b;

            font-size: 16px;
        }


        .total {

            color: #64748b;

            font-size: 12px;
        }


        .table-wrapper {

            overflow-x: auto;
        }


        table {

            width: 100%;

            min-width: 1200px;

            border-collapse: collapse;
        }


        thead {

            background: #12355b;

            color: white;
        }


        th {

            padding: 13px 12px;

            text-align: left;

            font-size: 12px;

            white-space: nowrap;
        }


        td {

            padding: 14px 12px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 12px;

            vertical-align: top;
        }


        tbody tr:hover {

            background: #f8fafc;
        }


        .nama {

            font-weight: bold;

            color: #12355b;
        }


        .nip {

            color: #475569;

            font-size: 11px;

            margin-top: 4px;
        }


        .small {

            color: #6b7280;

            font-size: 11px;

            margin-top: 4px;
        }


        .unit {

            max-width: 220px;

            line-height: 1.5;

            color: #344054;
        }


        .keperluan {

            max-width: 220px;

            line-height: 1.5;

            color: #475569;
        }


        .waktu {

            white-space: nowrap;

            color: #475569;
        }


        /* =========================
           STATUS
        ========================= */

        .status {

            display: inline-block;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: bold;

            text-transform: uppercase;

            white-space: nowrap;
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


        /* =========================
           BUTTON DETAIL
        ========================= */

        .btn-detail {

            display: inline-block;

            text-decoration: none;

            background: #12355b;

            color: white;

            padding: 8px 12px;

            border-radius: 5px;

            font-size: 11px;

            font-weight: bold;

            white-space: nowrap;
        }


        .btn-detail:hover {

            background: #0d2946;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {

            padding: 55px 20px;

            text-align: center;

            color: #6b7280;
        }


        .empty h3 {

            color: #12355b;

            margin-bottom: 8px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            .sidebar {

                width: 190px;
            }

            .main {

                margin-left: 190px;
            }

            .topbar {

                padding: 0 20px;
            }

            .content {

                padding: 20px;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     SIDEBAR
========================= -->

<aside class="sidebar">

    <div class="logo">

        <h1>
            SAPA
        </h1>

        <p>
            Sistem Aplikasi Pemakai Aula
        </p>

    </div>


    <nav class="menu">

        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>


        <a
            href="{{ route('admin.history') }}"
            class="active"
        >
            Riwayat Pendaftaran
        </a>


        <a href="{{ route('admin.aulas') }}">
            Data Aula
        </a>

    </nav>

</aside>



<!-- =========================
     MAIN
========================= -->

<main class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <h2>
            Riwayat Pendaftaran
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



    <!-- CONTENT -->

    <div class="content">


        <div class="page-title">

            <h1>
                Data Pengajuan Pemakaian Aula
            </h1>

            <p>
                Lihat, filter, dan proses seluruh pengajuan
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



        <!-- =========================
             FILTER
        ========================= -->

        <div class="filter-card">

            <div class="filter-title">
                Filter Status Pengajuan
            </div>


            <div class="filters">

                <a
                    href="{{ route('admin.history') }}"
                    class="filter
                    {{ $statusAktif == 'semua' ? 'active' : '' }}"
                >
                    Semua
                </a>


                <a
                    href="{{ route('admin.history', ['status' => 'menunggu']) }}"
                    class="filter
                    {{ $statusAktif == 'menunggu' ? 'active' : '' }}"
                >
                    Menunggu
                </a>


                <a
                    href="{{ route('admin.history', ['status' => 'disetujui']) }}"
                    class="filter
                    {{ $statusAktif == 'disetujui' ? 'active' : '' }}"
                >
                    Disetujui
                </a>


                <a
                    href="{{ route('admin.history', ['status' => 'ditolak']) }}"
                    class="filter
                    {{ $statusAktif == 'ditolak' ? 'active' : '' }}"
                >
                    Ditolak
                </a>


                <a
                    href="{{ route('admin.history', ['status' => 'dibatalkan']) }}"
                    class="filter
                    {{ $statusAktif == 'dibatalkan' ? 'active' : '' }}"
                >
                    Dibatalkan
                </a>

            </div>

        </div>



        <!-- =========================
             TABLE
        ========================= -->

        <div class="table-card">


            <div class="table-header">

                <h3>
                    Daftar Pengajuan
                </h3>


                <span class="total">

                    {{ $pendaftarans->count() }}

                    pengajuan

                </span>

            </div>



            @if($pendaftarans->count() > 0)


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Pemohon
                                </th>

                                <th>
                                    Unit Organisasi
                                </th>

                                <th>
                                    Aula
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Waktu
                                </th>

                                <th>
                                    Peserta
                                </th>

                                <th>
                                    Pihak Luar
                                </th>

                                <th>
                                    Keperluan
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach(
                                $pendaftarans
                                as $index => $pendaftaran
                            )

                                <tr>


                                    <!-- NO -->

                                    <td>
                                        {{ $index + 1 }}
                                    </td>


                                    <!-- PEMOHON -->

                                    <td>

                                        <div class="nama">

                                            {{ $pendaftaran->nama_pemohon }}

                                        </div>


                                        <div class="nip">

                                            NIP:
                                            {{ $pendaftaran->nip ?? '-' }}

                                        </div>


                                        <div class="small">

                                            {{ $pendaftaran->jabatan ?? '-' }}

                                        </div>


                                        <div class="small">

                                            {{ $pendaftaran->email }}

                                        </div>

                                    </td>


                                    <!-- UNIT ORGANISASI -->

                                    <td>

                                        <div class="unit">

                                            {{ $pendaftaran->unit_organisasi ?? '-' }}

                                        </div>

                                    </td>


                                    <!-- AULA -->

                                    <td>

                                        <strong>

                                            {{ $pendaftaran->aula->nama_aula ?? '-' }}

                                        </strong>


                                        <div class="small">

                                            Kapasitas:
                                            {{ $pendaftaran->aula->kapasitas ?? '-' }}

                                            orang

                                        </div>

                                    </td>


                                    <!-- TANGGAL -->

                                    <td>

                                        <strong>

                                            {{ \Carbon\Carbon::parse(
                                                $pendaftaran->tanggal
                                            )->locale('id')->translatedFormat('d F Y') }}

                                        </strong>


                                        <div class="small">

                                            {{ \Carbon\Carbon::parse(
                                                $pendaftaran->tanggal
                                            )->locale('id')->translatedFormat('l') }}

                                        </div>

                                    </td>


                                    <!-- WAKTU -->

                                    <td>

                                        <div class="waktu">

                                            {{ \Carbon\Carbon::parse(
                                                $pendaftaran->jam_mulai
                                            )->format('H:i') }}

                                            -

                                            {{ \Carbon\Carbon::parse(
                                                $pendaftaran->jam_selesai
                                            )->format('H:i') }}

                                        </div>

                                    </td>


                                    <!-- PESERTA -->

                                    <td>

                                        {{ $pendaftaran->jumlah_peserta }}

                                        orang

                                    </td>


                                    <!-- PIHAK LUAR -->

                                    <td>

                                        @if(
                                            $pendaftaran->peserta_pihak_luar
                                            === 'ada'
                                        )

                                            <span class="status menunggu">
                                                Ada
                                            </span>

                                        @else

                                            <span class="status dibatalkan">
                                                Tidak Ada
                                            </span>

                                        @endif

                                    </td>


                                    <!-- KEPERLUAN -->

                                    <td>

                                        <div class="keperluan">

                                            {{ $pendaftaran->keperluan }}

                                        </div>

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <span
                                            class="status
                                            {{ $pendaftaran->status }}"
                                        >

                                            {{ ucfirst(
                                                $pendaftaran->status
                                            ) }}

                                        </span>

                                    </td>


                                    <!-- DETAIL -->

                                    <td>

                                        <a
                                            href="{{
                                                route(
                                                    'admin.pendaftaran.show',
                                                    $pendaftaran->id
                                                )
                                            }}"
                                            class="btn-detail"
                                        >

                                            DETAIL

                                        </a>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>

                    </table>

                </div>


            @else


                <div class="empty">

                    <h3>
                        Tidak Ada Pengajuan
                    </h3>

                    <p>
                        Belum ada data pada filter yang dipilih.
                    </p>

                </div>


            @endif


        </div>


    </div>


</main>


</body>

</html>