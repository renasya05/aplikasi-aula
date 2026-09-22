<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data Aula | SAPA</title>


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


        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

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
           BUTTON
        ========================= */

        .btn {

            display: inline-block;

            text-decoration: none;

            border: none;

            border-radius: 5px;

            padding: 10px 16px;

            font-size: 12px;

            font-weight: bold;

            cursor: pointer;
        }


        .btn-tambah {

            background: #12355b;

            color: white;
        }


        .btn-tambah:hover {

            background: #0d2946;
        }


        .btn-detail {

            background: #12355b;

            color: white;
        }


        .btn-detail:hover {

            background: #0d2946;
        }


        .btn-edit {

            background: #eaf1f7;

            color: #12355b;
        }


        .btn-edit:hover {

            background: #dbe7f3;
        }


        .btn-hapus {

            background: #fef2f2;

            color: #b91c1c;
        }


        .btn-hapus:hover {

            background: #fee2e2;
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

            border-collapse: collapse;

            min-width: 800px;
        }


        thead {

            background: #12355b;

            color: white;
        }


        th {

            padding: 13px 14px;

            text-align: left;

            font-size: 12px;
        }


        td {

            padding: 16px 14px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 13px;

            vertical-align: top;
        }


        tbody tr:hover {

            background: #f8fafc;
        }


        .nama-aula {

            color: #12355b;

            font-weight: bold;

            font-size: 14px;
        }


        .kapasitas {

            font-weight: bold;

            color: #374151;
        }


        .keterangan {

            color: #64748b;

            line-height: 1.5;

            max-width: 280px;
        }


        .fasilitas {

            color: #64748b;

            line-height: 1.5;

            max-width: 300px;
        }


        .actions {

            display: flex;

            gap: 7px;

            align-items: center;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {

            padding: 60px 20px;

            text-align: center;

            color: #6b7280;
        }


        .empty h3 {

            color: #12355b;

            margin-bottom: 8px;
        }


        .empty p {

            font-size: 13px;

            margin-bottom: 20px;
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

            .content {

                padding: 20px;
            }

            .page-header {

                align-items: flex-start;

                gap: 15px;

                flex-direction: column;
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
            Sistem Aplikasi Pemakaian Aula
        </p>

    </div>


    <nav class="menu">


        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>


        <a href="{{ route('admin.history') }}">
            Riwayat Pendaftaran
        </a>


        <a
            href="{{ route('admin.aulas') }}"
            class="active"
        >
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
            Data Aula
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


        <!-- HEADER -->

        <div class="page-header">


            <div class="page-title">

                <h1>
                    Data Aula
                </h1>

                <p>
                    Kelola informasi aula yang tersedia
                    untuk peminjaman.
                </p>

            </div>


            <a
                href="{{ route('admin.aulas.create') }}"
                class="btn btn-tambah"
            >
                + TAMBAH AULA
            </a>


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



        <!-- TABLE -->

        <div class="table-card">


            <div class="table-header">


                <h3>
                    Daftar Aula
                </h3>


                <span class="total">

                    {{ $aulas->count() }}
                    aula

                </span>


            </div>



            @if($aulas->count() > 0)


                <div class="table-wrapper">


                    <table>


                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Nama Aula
                                </th>

                                <th>
                                    Kapasitas
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th>
                                    Fasilitas
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach(
                                $aulas as $index => $aula
                            )


                                <tr>


                                    <td>
                                        {{ $index + 1 }}
                                    </td>


                                    <td>

                                        <div class="nama-aula">

                                            {{ $aula->nama_aula }}

                                        </div>

                                    </td>


                                    <td>

                                        <span class="kapasitas">

                                            {{ $aula->kapasitas }}

                                            orang

                                        </span>

                                    </td>


                                    <td>

                                        <div class="keterangan">

                                            {{ $aula->keterangan }}

                                        </div>

                                    </td>


                                    <td>

                                        <div class="fasilitas">

                                            {{ $aula->fasilitas ?? '-' }}

                                        </div>

                                    </td>


                                    <td>


                                        <div class="actions">


                                            <a
                                                href="{{
                                                    route(
                                                        'admin.aulas.show',
                                                        $aula->id
                                                    )
                                                }}"
                                                class="btn btn-detail"
                                            >
                                                DETAIL
                                            </a>


                                            <a
                                                href="{{
                                                    route(
                                                        'admin.aulas.edit',
                                                        $aula->id
                                                    )
                                                }}"
                                                class="btn btn-edit"
                                            >
                                                EDIT
                                            </a>


                                            <form
                                                action="{{
                                                    route(
                                                        'admin.aulas.destroy',
                                                        $aula->id
                                                    )
                                                }}"
                                                method="POST"
                                                onsubmit="return confirm(
                                                    'Apakah Anda yakin ingin menghapus aula ini?'
                                                )"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="btn btn-hapus"
                                                >
                                                    HAPUS
                                                </button>


                                            </form>


                                        </div>


                                    </td>


                                </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>


            @else


                <div class="empty">


                    <h3>
                        Belum Ada Data Aula
                    </h3>


                    <p>
                        Silakan tambahkan data aula
                        terlebih dahulu.
                    </p>


                    <a
                        href="{{
                            route('admin.aulas.create')
                        }}"
                        class="btn btn-tambah"
                    >
                        + TAMBAH AULA
                    </a>


                </div>


            @endif


        </div>


    </div>


</main>


</body>

</html>