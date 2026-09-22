<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | SAPA</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #1f2937;
        }

        /* =========================
           LAYOUT
        ========================= */

        .container {
            display: flex;
            min-height: 100vh;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: #12355b;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .sidebar-header h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 11px;
            color: #d7e3ef;
            line-height: 1.5;
        }


        /* =========================
           MENU
        ========================= */

        .menu {
            padding: 20px 0;
        }

        .menu-title {
            padding: 0 20px 10px;
            font-size: 10px;
            text-transform: uppercase;
            color: #aebfd0;
            font-weight: bold;
        }

        .menu a {
            display: block;
            padding: 13px 20px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #1c4b78;
        }

        .menu a.active {
            background: #1c4b78;
            border-left: 4px solid white;
            padding-left: 16px;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 25px;
        }

        .logout button {
            width: 100%;
            padding: 10px;

            background: transparent;
            color: white;

            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 4px;

            cursor: pointer;
            font-size: 13px;

            transition: 0.2s;
        }

        .logout button:hover {
            background: rgba(255,255,255,0.1);
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            background: white;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            border-bottom: 1px solid #e5e7eb;
        }

        .topbar h1 {
            font-size: 20px;
            color: #12355b;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            display: block;
            font-size: 14px;
        }

        .user-info span {
            font-size: 11px;
            color: #6b7280;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px;
        }


        /* =========================
           WELCOME
        ========================= */

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h2 {
            color: #12355b;
            font-size: 24px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }


        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 13px 16px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #eaf6ee;
            color: #23613b;
            border: 1px solid #ccebd7;
        }

        .alert-error {
            background: #fcebea;
            color: #8a2525;
            border: 1px solid #f4c7c7;
        }


        /* =========================
           SECTION TITLE
        ========================= */

        .section-title {
            font-size: 18px;
            color: #12355b;
            margin-bottom: 15px;
        }


        /* =========================
           MENU CARDS
        ========================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 6px;

            padding: 25px;

            min-height: 190px;
        }

        .card h3 {
            font-size: 17px;
            color: #12355b;
            margin-bottom: 10px;
        }

        .card p {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
        }


        /* =========================
           CLICKABLE CARD
        ========================= */

        .card.clickable {
            cursor: pointer;

            text-decoration: none;
            color: inherit;

            display: block;

            transition: 0.2s;
        }

        .card.clickable:hover {
            transform: translateY(-3px);

            border-color: #12355b;

            box-shadow: 0 5px 15px rgba(0,0,0,.08);
        }

        .card-label {
            display: inline-block;

            margin-top: 18px;

            padding: 7px 11px;

            border-radius: 4px;

            background: #eaf1f7;
            color: #12355b;

            font-size: 11px;
            font-weight: bold;
        }

        .card.clickable:hover .card-label {
            background: #12355b;
            color: white;
        }


        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            background: white;

            border: 1px solid #e5e7eb;
            border-left: 4px solid #12355b;

            border-radius: 5px;

            padding: 18px 20px;

            margin-top: 25px;
        }

        .info-box h3 {
            font-size: 14px;
            color: #12355b;
            margin-bottom: 7px;
        }

        .info-box p {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.6;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 40px;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;

            color: #9ca3af;

            font-size: 11px;

            text-align: center;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

        }


        @media (max-width: 550px) {

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .container {
                display: block;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .logout {
                position: static;
                padding: 20px;
            }

            .topbar {
                height: auto;

                padding: 15px 20px;

                gap: 10px;
            }

        }

    </style>

</head>


<body>

<div class="container">


    <!-- =========================
         SIDEBAR USER
    ========================== -->

    <aside class="sidebar">

        <div class="sidebar-header">

            <h2>
                SAPA
            </h2>

            <p>
                Sistem Aplikasi Pemakai Aula<br>
            </p>

        </div>


        <div class="menu">

            <div class="menu-title">
                Menu 
            </div>


            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}" class="active">
                Dashboard
            </a>


            <!-- DAFTAR AULA -->

            <a href="{{ route('aulas') }}">
                Daftar Aula
            </a>


            <!-- RIWAYAT -->

            <a href="{{ route('pendaftaran.history') }}">
                Riwayat Pendaftaran
            </a>

        </div>


        <!-- =========================
             LOGOUT
        ========================== -->

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">
                    Keluar
                </button>

            </form>

        </div>

    </aside>



    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main">


        <!-- =========================
             TOPBAR
        ========================== -->

        <div class="topbar">

            <h1>
                Dashboard
            </h1>


            <div class="user-info">

                <strong>
                    {{ $user->name }}
                </strong>

                <span>
                    Pemohon
                </span>

            </div>

        </div>



        <!-- =========================
             CONTENT
        ========================== -->

        <div class="content">


            <!-- =========================
                 WELCOME
            ========================== -->

            <div class="welcome">

                <h2>
                    <h1>Selamat Datang di SAPA</h1>
                </h2>

                <p>
                    Selamat datang di SAPA. 
                    Silakan pilih menu yang tersedia untuk 
                    melihat informasi aula atau mengajukan pemakaian aula.
                </p>

            </div>



            <!-- =========================
                 ALERT SUCCESS
            ========================== -->

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif



            <!-- =========================
                 ALERT ERROR
            ========================== -->

            @if(session('error'))

                <div class="alert alert-error">

                    {{ session('error') }}

                </div>

            @endif



            <!-- =========================
                 MENU USER
            ========================== -->

            <h3 class="section-title">
                Menu Pemakaian Aula
            </h3>


            <div class="cards">


                <!-- =========================
                     DAFTAR AULA
                ========================== -->

                <a href="{{ route('aulas') }}" class="card clickable">

                    <h3>
                        Daftar Aula
                    </h3>

                    <p>
                        Lihat informasi aula yang tersedia,
                        kapasitas, fasilitas, dan keterangan aula.
                        Pilih aula untuk melakukan pendaftaran.
                    </p>

                    <span class="card-label">
                        LIHAT AULA →
                    </span>

                </a>



                <!-- =========================
                     RIWAYAT PENDAFTARAN
                ========================== -->

                <a href="{{ route('pendaftaran.history') }}" class="card clickable">

                    <h3>
                        Riwayat Pendaftaran
                    </h3>

                    <p>
                        Lihat seluruh riwayat pendaftaran,
                        jadwal peminjaman, dan status pengajuan.
                    </p>

                    <span class="card-label">
                        LIHAT RIWAYAT →
                    </span>

                </a>


            </div>



            <!-- =========================
                 INFORMASI PEMINJAMAN
            ========================== -->

            <div class="info-box">

                <h3>
                    Informasi Pemakaian Aula 
                </h3>

                <p>
                  Pastikan tanggal, waktu, jumlah peserta, 
                  dan keperluan kegiatan telah diisi dengan benar. 
                  Pengajuan akan diperiksa dan diproses oleh administrator SAPA.
                </p>

            </div>



            <!-- =========================
                 FOOTER
            ========================== -->

            <div class="footer">

                SAPA &copy; {{ date('Y') }}

                <br>

                Sistem Aplikasi Pemakaian Aula 

            </div>


        </div>

    </main>

</div>

</body>

</html>