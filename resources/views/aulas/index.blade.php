<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Aula | SAPA</title>

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
           NAVBAR
        ========================== */

        .navbar {
            background: #12355b;
            color: white;

            padding: 18px 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .brand h1 {
            font-size: 22px;
            margin-bottom: 4px;
        }


        .brand p {
            font-size: 13px;
            color: #dbe7f3;
        }


        .user-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            font-size: 14px;
        }


        /* =========================
           LOGOUT
        ========================== */

        .logout {
            border: none;

            background: #dc3545;
            color: white;
            padding: 9px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            transition: 0.2s;
        }

        .logout:hover {
            background: #bb2d3b;
        }


        /* =========================
           CONTAINER
        ========================== */

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }


        /* =========================
           TOP SECTION
        ========================== */

        .top-section {
            margin-bottom: 25px;
        }


        .top-section h2 {
            font-size: 27px;
            color: #12355b;
            margin-bottom: 8px;
        }


        .top-section p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }


        .back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #12355b;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }


        .back:hover {
            color: #0d2946;
        }


        /* =========================
           AULA GRID
        ========================== */

        .aula-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
        }


        /* =========================
           AULA CARD
        ========================== */

        .aula-card {
            background: white;
            border: 1px solid #e1e5ea;
            border-radius: 10px;
            padding: 25px;
            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            min-height: 360px;
            transition: 0.2s;
        }


        .aula-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 6px 18px rgba(0, 0, 0, 0.08);
            border-color: #cfd8e3;
        }


        .aula-card h3 {
            color: #12355b;
            font-size: 21px;
            margin-bottom: 18px;
        }


        /* =========================
           CAPACITY
        ========================== */

        .capacity {
            background: #e9f1f8;
            color: #12355b;
            padding: 10px 12px;
            border-radius: 6px;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 18px;
            width: fit-content;
        }


        /* =========================
           INFORMATION
        ========================== */

        .info {
            margin-bottom: 15px;
        }


        .info strong {
            display: block;
            margin-bottom: 5px;
            color: #374151;
            font-size: 14px;
        }


        .info p {
            color: #6b7280;
            line-height: 1.6;
            font-size: 14px;
        }


        /* =========================
           TOMBOL PILIH AULA
        ========================== */

        .btn-pilih {
            display: block;
            width: 100%;
            margin-top: auto;
            padding: 12px 18px;
            background: #12355b;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }


        .btn-pilih:hover {
            background: #0d2946;
        }


        /* =========================
           EMPTY DATA
        ========================== */

        .empty {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            border: 1px solid #e1e5ea;
            color: #6b7280;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 600px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }


            .user-area {
                width: 100%;
                justify-content: space-between;
            }

            .container {
                margin-top: 25px;
            }

            .aula-grid {
                grid-template-columns: 1fr;
            }

            .aula-card {
                min-height: auto;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================== -->

    <div class="navbar">


        <div class="brand">

            <h1>
                SAPA
            </h1>

            <p>
                Sistem Aplikasi Pemakaian Aula
            </p>

        </div>


        <div class="user-area">

            <span class="user-name">
                {{ $user->name }}
            </span>


            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout">
                    Logout
                </button>

            </form>

        </div>

    </div>



    <!-- =========================
         CONTENT
    ========================== -->

    <div class="container">


        <!-- =========================
             HEADER
        ========================== -->

        <div class="top-section">

            <h2>
                Daftar Aula
            </h2>

            <p>
                Lihat informasi aula yang tersedia untuk mengajukan pemakaian aula.
            </p>


            <a href="{{ route('dashboard') }}" class="back">
                ← Kembali ke Dashboard
            </a>

        </div>



        <!-- =========================
             DATA AULA
        ========================== -->

        @if($aulas->count() > 0)


            <div class="aula-grid">


                @foreach($aulas as $aula)


                    <!-- =========================
                         AULA CARD
                    ========================== -->

                    <div class="aula-card">


                        <h3>
                            {{ $aula->nama_aula }}
                        </h3>


                        <!-- KAPASITAS -->

                        <div class="capacity">

                            Kapasitas:
                            {{ $aula->kapasitas }}
                            orang

                        </div>



                        <!-- KETERANGAN -->

                        <div class="info">

                            <strong>
                                Keterangan
                            </strong>

                            <p>
                                {{ $aula->keterangan }}
                            </p>

                        </div>



                        <!-- FASILITAS -->

                        <div class="info">

                            <strong>
                                Fasilitas
                            </strong>

                            <p>
                                {{ $aula->fasilitas ?? 'Belum ada informasi fasilitas.' }}
                            </p>

                        </div>



                        <!-- PILIH AULA -->

                        <a
                            href="{{ route('pendaftaran.create', $aula->id) }}"
                            class="btn-pilih"
                        >
                            PILIH AULA
                        </a>


                    </div>


                @endforeach


            </div>


        @else


            <!-- =========================
                 DATA KOSONG
            ========================== -->

            <div class="empty">

                Belum ada data aula yang tersedia.

            </div>


        @endif


    </div>


</body>

</html>