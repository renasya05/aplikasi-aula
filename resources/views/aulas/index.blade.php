<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Aula | SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: white;
            line-height: 1.6;
        }

        /* =====================================================
           HEADER
        ====================================================== */

        .header {
            background: #12355b;
            color: white;
            padding: 24px 5%;
        }

        .header-inner {
            max-width: 1180px;
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .brand h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .brand p {
            font-size: 16px;
            opacity: 0.92;
        }

        .back-dashboard {
            color: white;
            text-decoration: none;

            border: 1px solid rgba(255, 255, 255, 0.45);

            padding: 10px 17px;
            border-radius: 8px;

            font-size: 15px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .back-dashboard:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        /* =====================================================
           CONTAINER
        ====================================================== */

        .container {
            width: 92%;
            max-width: 1180px;

            margin: 32px auto 50px;
        }

        /* =====================================================
           TITLE
        ====================================================== */

        .page-heading {
            margin-bottom: 28px;
        }

        .page-heading h2 {
            color: #12355b;
            font-size: 30px;
            font-weight: 800;

            margin-bottom: 4px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 16px;
        }

        /* =====================================================
           GRID AULA
        ====================================================== */

        .aula-list {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 24px;

            align-items: stretch;
        }

        /* =====================================================
           FULL FOTO CARD
        ====================================================== */

        .aula-card {
            position: relative;

            height: 520px;

            border-radius: 18px;

            overflow: hidden;

            background: #12355b;

            box-shadow:
                0 8px 30px
                rgba(15, 23, 42, 0.16);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .aula-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 14px 35px
                rgba(15, 23, 42, 0.22);
        }

        /* =====================================================
           FOTO FULL
        ====================================================== */

        .aula-photo {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            overflow: hidden;
        }

        .aula-photo img {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;

            transition:
                transform 0.4s ease;
        }

        .aula-card:hover .aula-photo img {
            transform: scale(1.04);
        }

        /* =====================================================
           OVERLAY FOTO
        ====================================================== */

        .aula-photo::after {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.08) 0%,
                    rgba(0, 0, 0, 0.20) 35%,
                    rgba(0, 0, 0, 0.78) 100%
                );

            z-index: 1;
        }

        /* =====================================================
           CONTENT DI ATAS FOTO
        ====================================================== */

        .aula-content {
            position: absolute;

            inset: 0;

            z-index: 2;

            padding: 28px;

            display: flex;

            flex-direction: column;

            justify-content: flex-end;
        }

        /* =====================================================
           JUDUL AULA
        ====================================================== */

        .aula-title {
            margin-bottom: 18px;
        }

        .aula-title h3 {
            font-size: 30px;

            font-weight: 800;

            color: white;

            margin-bottom: 3px;

            text-shadow:
                0 2px 5px rgba(0, 0, 0, 0.35);
        }

        .aula-title span {
            font-size: 14px;

            color: rgba(255, 255, 255, 0.9);
        }

        /* =====================================================
           INFO AULA
        ====================================================== */

        .aula-info-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;

            margin-bottom: 18px;
        }

        .info-box {
            background:
                rgba(255, 255, 255, 0.14);

            border:
                1px solid
                rgba(255, 255, 255, 0.25);

            border-radius: 10px;

            padding: 12px;

            backdrop-filter: blur(4px);
        }

        .info-label {
            display: block;

            font-size: 12px;

            color:
                rgba(255, 255, 255, 0.78);

            font-weight: 700;

            margin-bottom: 4px;
        }

        .info-value {
            display: block;

            font-size: 14px;

            color: white;

            font-weight: 800;

            line-height: 1.4;
        }

        /* =====================================================
           FASILITAS
        ====================================================== */

        .facility {
            margin-bottom: 20px;

            padding: 13px 15px;

            border-radius: 10px;

            background:
                rgba(0, 0, 0, 0.28);

            border:
                1px solid
                rgba(255, 255, 255, 0.16);
        }

        .facility-title {
            font-size: 14px;

            font-weight: 800;

            color: white;

            margin-bottom: 3px;
        }

        .facility-text {
            color:
                rgba(255, 255, 255, 0.92);

            font-size: 14px;
        }

        /* =====================================================
           BUTTON
        ====================================================== */

        .aula-action {
            display: flex;

            justify-content: flex-end;
        }

        .btn-pilih {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 46px;

            padding: 11px 24px;

            background: white;

            color: #12355b;

            text-decoration: none;

            border-radius: 8px;

            font-size: 15px;

            font-weight: 800;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }

        .btn-pilih:hover {
            background: #e8eef5;

            transform: translateY(-1px);
        }

        /* =====================================================
           RESPONSIVE TABLET
        ====================================================== */

        @media (max-width: 900px) {

            .aula-list {
                grid-template-columns: 1fr;
            }

            .aula-card {
                height: 500px;
            }
        }

        /* =====================================================
           RESPONSIVE MOBILE
        ====================================================== */

        @media (max-width: 600px) {

            .header-inner {
                flex-direction: column;

                align-items: flex-start;
            }

            .back-dashboard {
                width: 100%;

                text-align: center;
            }

            .page-heading h2 {
                font-size: 25px;
            }

            .aula-card {
                height: 540px;

                border-radius: 14px;
            }

            .aula-content {
                padding: 22px;
            }

            .aula-title h3 {
                font-size: 25px;
            }

            .aula-info-grid {
                grid-template-columns: 1fr;
            }

            .aula-action {
                justify-content: stretch;
            }

            .btn-pilih {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    {{-- ==========================================================
         HEADER
    =========================================================== --}}

    <header class="header">

        <div class="header-inner">

            <div class="brand">

                <h1>SAPA</h1>

                <p>
                    Sistem Aplikasi Pemanfaatan Aula
                </p>

            </div>

            <a
                href="{{ route('dashboard') }}"
                class="back-dashboard"
            >
                ← Kembali ke Dashboard
            </a>

        </div>

    </header>


    {{-- ==========================================================
         CONTENT
    =========================================================== --}}

    <main class="container">

        <div class="page-heading">

            <h2>
                Daftar Aula
            </h2>

            <p>
                Pilih aula yang sesuai dengan kebutuhan kegiatan Anda.
            </p>

        </div>


        {{-- ======================================================
             DAFTAR AULA
        ======================================================= --}}

        <div class="aula-list">

            @foreach ($aulas as $aula)

                @php

                    $namaAula = strtolower(
                        $aula->nama_aula ?? ''
                    );

                    if (
                        str_contains(
                            $namaAula,
                            'kecil'
                        )
                    ) {

                        $foto = asset(
                            'images/aula-kecil.jpg'
                        );

                        $optimal = '11 orang';

                        $ukuran = '7,6 × 4 meter';

                        $fasilitas =
                            'TV 65 inch, Sound System';

                    } else {

                        $foto = asset(
                            'images/aula-besar.jpg'
                        );

                        $optimal =
                            'Sesuai kebutuhan';

                        $ukuran =
                            '15,22 × 10,9 meter';

                        $fasilitas =
                            'Sistem Audio, Videotron';
                    }

                @endphp


                <article class="aula-card">


                    {{-- ==================================================
                         FOTO FULL
                    =================================================== --}}

                    <div class="aula-photo">

                        <img
                            src="{{ $foto }}"
                            alt="{{ $aula->nama_aula }}"
                        >

                    </div>


                    {{-- ==================================================
                         SEMUA INFORMASI DI ATAS FOTO
                    =================================================== --}}

                    <div class="aula-content">


                        {{-- ==================================================
                             JUDUL AULA
                        =================================================== --}}

                        <div class="aula-title">

                            <h3>
                                {{ $aula->nama_aula }}
                            </h3>

                            <span>
                                Sistem Aplikasi Pemanfaatan Aula
                            </span>

                        </div>


                        {{-- ==================================================
                             INFO AULA
                        =================================================== --}}

                        <div class="aula-info-grid">

                            {{-- KAPASITAS OPTIMAL --}}

                            <div class="info-box">

                                <span class="info-label">
                                    Kapasitas Optimal
                                </span>

                                <span class="info-value">
                                    {{ $optimal }}
                                </span>

                            </div>


                            {{-- KAPASITAS MAKSIMUM --}}

                            <div class="info-box">

                                <span class="info-label">
                                    Kapasitas Maksimum
                                </span>

                                <span class="info-value">
                                    {{ $aula->kapasitas }} orang
                                </span>

                            </div>


                            {{-- UKURAN AULA --}}

                            <div class="info-box">

                                <span class="info-label">
                                    Ukuran Aula
                                </span>

                                <span class="info-value">
                                    {{ $ukuran }}
                                </span>

                            </div>

                        </div>


                        {{-- ==================================================
                             FASILITAS
                        =================================================== --}}

                        <div class="facility">

                            <div class="facility-title">
                                Fasilitas
                            </div>

                            <div class="facility-text">
                                {{ $fasilitas }}
                            </div>

                        </div>


                        {{-- ==================================================
                             BUTTON
                        =================================================== --}}

                        <div class="aula-action">

                            <a
                                href="{{ route('pendaftaran.create', $aula) }}"
                                class="btn-pilih"
                            >
                                Pilih Aula
                            </a>

                        </div>


                    </div>

                </article>

            @endforeach

        </div>

    </main>

</body>

</html>