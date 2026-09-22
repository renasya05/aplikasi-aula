<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | SAPA</title>


    <style>

        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================
           BODY
        ========================= */

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }


        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: #17365d;
            color: white;

            padding: 25px 15px;

            min-height: 100vh;

            flex-shrink: 0;
        }


        /* =========================
           LOGO
        ========================= */

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h2 {
            font-size: 25px;
            letter-spacing: 1px;
        }

        .logo p {
            font-size: 11px;
            color: #dbeafe;
            line-height: 1.5;
            margin-top: 7px;
        }


        /* =========================
           SIDEBAR MENU
        ========================= */

        .menu a {
            display: block;

            text-decoration: none;

            color: white;

            padding: 13px 15px;

            margin-bottom: 8px;

            border-radius: 6px;

            font-size: 14px;

            transition: 0.2s;
        }

        .menu a:hover {
            background: #244d7d;
        }

        .menu a.active {
            background: #244d7d;
        }


        /* =========================
           MAIN
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 70px;

            background: white;

            border-bottom: 1px solid #ddd;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 0 30px;
        }

        .topbar h3 {
            color: #17365d;
            font-size: 20px;
        }


        /* =========================
           ADMIN INFO
        ========================= */

        .admin-info {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .admin-name {
            font-size: 14px;
            font-weight: bold;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout button {
            background: #dc3545;

            color: white;

            border: none;

            padding: 9px 15px;

            border-radius: 5px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s;
        }

        .logout button:hover {
            background: #b02a37;
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
            margin-bottom: 25px;
        }

        .welcome h2 {
            color: #17365d;

            margin-bottom: 7px;

            font-size: 24px;
        }

        .welcome p {
            color: #6b7280;

            font-size: 14px;
        }


        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .stat {
            background: white;

            border-radius: 8px;

            padding: 22px;

            box-shadow:
                0 2px 8px rgba(0,0,0,0.05);

            border-left: 4px solid #17365d;
        }


        .stat small {
            display: block;

            color: #6b7280;

            font-size: 13px;

            margin-bottom: 10px;
        }


        .stat strong {
            font-size: 30px;

            color: #17365d;
        }


        /* =========================
           MENU ADMINISTRASI
        ========================= */

        .card {
            background: white;

            border-radius: 8px;

            padding: 25px;

            box-shadow:
                0 2px 8px rgba(0,0,0,0.05);
        }


        .card > h3 {
            color: #17365d;

            margin-bottom: 20px;

            font-size: 20px;
        }


        /* =========================
           MENU GRID
        ========================= */

        .menu-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 15px;

            align-items: stretch;
        }


        /* =========================
           MENU CARD
        ========================= */

        .menu-card {
            border: 1px solid #e5e7eb;

            border-radius: 7px;

            padding: 20px;

            text-decoration: none;

            color: #1f2937;

            transition: 0.2s;

            min-height: 190px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;
        }


        .menu-card:hover {
            border-color: #17365d;

            background: #f8fafc;

            transform: translateY(-2px);

            box-shadow:
                0 4px 10px rgba(0,0,0,0.05);
        }


        .menu-card h4 {
            color: #17365d;

            margin-bottom: 10px;

            font-size: 18px;
        }


        .menu-card p {
            color: #6b7280;

            font-size: 13px;

            line-height: 1.6;

            margin-bottom: 15px;
        }


        /* =========================
           BUTTON MENU
        ========================= */

        .menu-button {
            display: inline-block;

            align-self: flex-start;

            background: #17365d;

            color: white;

            padding: 9px 14px;

            border-radius: 4px;

            font-size: 12px;

            font-weight: bold;

            text-decoration: none;

            transition: 0.2s;
        }


        .menu-button:hover {
            background: #244d7d;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

        }


        @media (max-width: 650px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;

                min-height: auto;

                padding: 20px;
            }

            .logo {
                margin-bottom: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                height: auto;

                padding: 15px;

                gap: 10px;
            }

            .content {
                padding: 20px 15px;
            }

        }

    </style>

</head>


<body>


<div class="layout">


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">


        <div class="logo">

            <h2>
                SAPA
            </h2>

            <p>
                Sistem Aplikasi Pemakaian Aula
            </p>

        </div>


        <div class="menu">


            <!-- DASHBOARD -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="active"
            >
                Dashboard
            </a>


            <!-- DATA AULA -->

            <a
                href="{{ route('admin.aulas') }}"
            >
                Data Aula
            </a>


            <!-- RIWAYAT -->

            <a
                href="{{ route('admin.history') }}"
            >
                Riwayat Pendaftaran
            </a>


        </div>


    </aside>



    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">


        <!-- =========================
             TOPBAR
        ========================== -->

        <div class="topbar">


            <h3>
                Dashboard Admin
            </h3>


            <div class="admin-info">


                <span class="admin-name">
                    {{ $user->name }}
                </span>


                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="logout"
                >

                    @csrf

                    <button type="submit">
                        Logout
                    </button>

                </form>


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
                    Selamat Datang, {{ $user->name }}
                </h2>


                <p>
                    Kelola pendaftaran dan pemakaian aula
                    melalui halaman administrasi SAPA.
                </p>


            </div>



            <!-- =========================
                 STATISTICS
            ========================== -->

            <div class="stats">


                <!-- TOTAL -->

                <div class="stat">

                    <small>
                        Total Pendaftaran
                    </small>

                    <strong>
                        {{ $stats['total'] }}
                    </strong>

                </div>


                <!-- MENUNGGU -->

                <div class="stat">

                    <small>
                        Menunggu
                    </small>

                    <strong>
                        {{ $stats['menunggu'] }}
                    </strong>

                </div>


                <!-- DISETUJUI -->

                <div class="stat">

                    <small>
                        Disetujui
                    </small>

                    <strong>
                        {{ $stats['disetujui'] }}
                    </strong>

                </div>


                <!-- DITOLAK -->

                <div class="stat">

                    <small>
                        Ditolak
                    </small>

                    <strong>
                        {{ $stats['ditolak'] }}
                    </strong>

                </div>


            </div>



            <!-- =========================
                 MENU ADMINISTRASI
            ========================== -->

            <div class="card">


                <h3>
                    Menu Administrasi
                </h3>


                <div class="menu-grid">


                    <!-- =====================
                         RIWAYAT PENDAFTARAN
                    ====================== -->

                    <div class="menu-card">


                        <div>

                            <h4>
                                Riwayat Pendaftaran
                            </h4>


                            <p>
                                Melihat seluruh data pendaftaran
                                dan status pengajuan peminjaman aula.
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.history') }}"
                            class="menu-button"
                        >
                            LIHAT PENDAFTARAN →
                        </a>


                    </div>



                    <!-- =====================
                         DATA AULA
                    ====================== -->

                    <div class="menu-card">


                        <div>

                            <h4>
                                Data Aula
                            </h4>


                            <p>
                                Kelola informasi aula yang tersedia,
                                kapasitas, fasilitas, dan keterangan aula.
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.aulas') }}"
                            class="menu-button"
                        >
                            KELOLA AULA →
                        </a>


                    </div>


                </div>


            </div>


        </div>


    </main>


</div>


</body>

</html>