<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Pemakaian Aula | SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #263238;
        }

        /* =========================
           NAVBAR
        ========================= */
        .navbar {
            height: 70px;
            background: #12355b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
        }

        .brand {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .brand-subtitle {
            font-size: 12px;
            margin-top: 3px;
            opacity: 0.85;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-name {
            font-size: 14px;
        }

        .logout-btn {
            background: white;
            color: #12355b;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #e9eef4;
        }

        /* =========================
           CONTAINER
        ========================= */
        .container {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            text-decoration: none;
            color: #12355b;
            font-weight: 600;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            color: #12355b;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #667085;
            font-size: 14px;
        }

        /* =========================
           FORM CARD
        ========================= */
        .form-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.07);
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #12355b;
            padding-bottom: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }

        .section-title span {
            display: inline-block;
            margin-right: 8px;
        }

        /* =========================
           FORM GRID
        ========================= */
        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 18px;
        }

        .row.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #344054;
        }

        .required {
            color: #c62828;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d0d5dd;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
            color: #344054;
            background: white;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #12355b;
            box-shadow: 0 0 0 3px rgba(18, 53, 91, 0.10);
        }

        input[readonly] {
            background: #f2f4f7;
            color: #667085;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* =========================
           INFO AULA
        ========================= */
        .aula-info {
            background: #eef4fa;
            border-left: 4px solid #12355b;
            padding: 17px 18px;
            border-radius: 7px;
            margin-bottom: 25px;
        }

        .aula-info strong {
            display: block;
            color: #12355b;
            font-size: 17px;
            margin-bottom: 5px;
        }

        .aula-info p {
            color: #667085;
            font-size: 13px;
            margin-top: 4px;
        }

        .capacity-info {
            font-weight: 600;
            color: #12355b !important;
        }

        /* =========================
           RADIO
        ========================= */
        .radio-group {
            display: flex;
            gap: 25px;
            align-items: center;
            padding-top: 5px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 14px;
            color: #344054;
        }

        .radio-option input {
            width: auto;
            margin: 0;
            accent-color: #12355b;
        }

        /* =========================
           ERROR
        ========================= */
        .error-box {
            background: #fff1f1;
            border: 1px solid #f3b5b5;
            color: #a61b1b;
            border-radius: 7px;
            padding: 14px 16px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .error-box ul {
            margin-left: 20px;
            margin-top: 5px;
        }

        .error-text {
            color: #c62828;
            font-size: 12px;
            margin-top: 6px;
        }

        /* =========================
           TOTAL PESERTA
        ========================= */
        .participant-info {
            margin-top: 8px;
            background: #f8fafc;
            border: 1px solid #e4e7ec;
            border-radius: 7px;
            padding: 13px 15px;
            font-size: 14px;
        }

        .participant-info strong {
            color: #12355b;
        }

        /* =========================
           BUTTON
        ========================= */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 10px;
            border-top: 1px solid #eaecf0;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 7px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary {
            background: #eaecf0;
            color: #344054;
        }

        .btn-secondary:hover {
            background: #dfe3e8;
        }

        .btn-primary {
            background: #12355b;
            color: white;
        }

        .btn-primary:hover {
            background: #0d2947;
        }

        .btn-primary:disabled {
            background: #98a2b3;
            cursor: not-allowed;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 700px) {

            .navbar {
                padding: 0 20px;
            }

            .brand-subtitle {
                display: none;
            }

            .user-name {
                display: none;
            }

            .form-card {
                padding: 22px;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .radio-group {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="brand">
            <div class="brand-title">
                SAPA
            </div>

            <div class="brand-subtitle">
                Sistem Aplikasi Pemakai Aula
            </div>
        </div>

        <div class="user-area">

            <div class="user-name">
                {{ $user->name }}
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Keluar
                </button>
            </form>

        </div>

    </nav>


    <!-- CONTENT -->
    <main class="container">

        <a href="{{ route('aulas') }}" class="back-link">
            ← Kembali ke Daftar Aula
        </a>


        <div class="page-header">

            <h1>
                Form Pemakaian Aula
            </h1>

            <p>
                Silakan lengkapi data pemakaian aula dengan benar.
            </p>

        </div>


        <!-- ERROR -->
        @if ($errors->any())

            <div class="error-box">

                <strong>
                    Terdapat kesalahan pada pengisian formulir:
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach
                </ul>

            </div>

        @endif


        <div class="form-card">


            <!-- INFO AULA -->
            <div class="aula-info">

                <strong>
                    {{ $aula->nama_aula }}
                </strong>

                <p>
                    {{ $aula->keterangan }}
                </p>

                <p class="capacity-info">
                    Kapasitas maksimal:
                    {{ $aula->kapasitas }} orang
                </p>

            </div>


            <form
                action="{{ route('pendaftaran.store') }}"
                method="POST"
                id="formPendaftaran"
            >

                @csrf

                <!-- AULA -->
                <input
                    type="hidden"
                    name="aula_id"
                    value="{{ $aula->id }}"
                >


                <!-- =========================
                     DATA PEMOHON
                ========================== -->

                <div class="section">

                    <div class="section-title">
                        Data Pemohon
                    </div>


                    <!-- EMAIL -->

                    <div class="row single">

                        <div class="form-group">

                            <label for="email">
                                Email
                                <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required
                            >

                            @error('email')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    <!-- NAMA + NIP -->

                    <div class="row">

                        <div class="form-group">

                            <label for="nama_pemohon">
                                Nama
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="nama_pemohon"
                                name="nama_pemohon"
                                value="{{ old('nama_pemohon', $user->name) }}"
                                placeholder="Masukkan nama pemohon"
                                required
                            >

                            @error('nama_pemohon')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="nip">
                                NIP
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="nip"
                                name="nip"
                                value="{{ old('nip') }}"
                                placeholder="Masukkan NIP"
                                required
                            >

                            @error('nip')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    <!-- JABATAN -->

                    <div class="row single">

                        <div class="form-group">

                            <label for="jabatan">
                                Jabatan
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="jabatan"
                                name="jabatan"
                                value="{{ old('jabatan') }}"
                                placeholder="Masukkan jabatan"
                                required
                            >

                            @error('jabatan')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- =========================
                     INSTANSI / ORGANISASI
                ========================== -->

                <div class="section">

                    <div class="section-title">
                        Instansi / Organisasi
                    </div>


                    <div class="row single">

                        <div class="form-group">

                            <label for="unit_organisasi">
                                Unit Organisasi
                                <span class="required">*</span>
                            </label>

                            <select
                                name="unit_organisasi"
                                id="unit_organisasi"
                                required
                            >

                                <option value="">
                                    -- Pilih Unit Organisasi --
                                </option>

                                <option
                                    value="Sekretariat"
                                    {{ old('unit_organisasi') == 'Sekretariat' ? 'selected' : '' }}
                                >
                                    Sekretariat
                                </option>

                                <option
                                    value="Bidang Informasi Publik dan Statistik"
                                    {{ old('unit_organisasi') == 'Bidang Informasi Publik dan Statistik' ? 'selected' : '' }}
                                >
                                    Bidang Informasi Publik dan Statistik
                                </option>

                                <option
                                    value="Bidang Komunikasi Publik"
                                    {{ old('unit_organisasi') == 'Bidang Komunikasi Publik' ? 'selected' : '' }}
                                >
                                    Bidang Komunikasi Publik
                                </option>

                                <option
                                    value="Bidang Aplikasi Informatika"
                                    {{ old('unit_organisasi') == 'Bidang Aplikasi Informatika' ? 'selected' : '' }}
                                >
                                    Bidang Aplikasi Informatika
                                </option>

                                <option
                                    value="Bidang Persandian dan Keamanan Informasi"
                                    {{ old('unit_organisasi') == 'Bidang Persandian dan Keamanan Informasi' ? 'selected' : '' }}
                                >
                                    Bidang Persandian dan Keamanan Informasi
                                </option>

                            </select>

                            @error('unit_organisasi')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- =========================
                     WAKTU
                ========================== -->

                <div class="section">

                    <div class="section-title">
                        Waktu Pemakaian
                    </div>


                    <!-- TANGGAL -->

                    <div class="row">

                        <div class="form-group">

                            <label for="tanggal">
                                Tanggal
                                <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal') }}"
                                required
                            >

                            @error('tanggal')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- HARI -->

                        <div class="form-group">

                            <label for="hari">
                                Hari
                            </label>

                            <input
                                type="text"
                                id="hari"
                                value="{{ old('tanggal') ? \Carbon\Carbon::parse(old('tanggal'))->locale('id')->translatedFormat('l') : '' }}"
                                placeholder="Otomatis berdasarkan tanggal"
                                readonly
                            >

                        </div>

                    </div>


                    <!-- JAM -->

                    <div class="row">

                        <div class="form-group">

                            <label for="jam_mulai">
                                Jam Mulai
                                <span class="required">*</span>
                            </label>

                            <input
                                type="time"
                                id="jam_mulai"
                                name="jam_mulai"
                                value="{{ old('jam_mulai') }}"
                                required
                            >

                            @error('jam_mulai')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="jam_selesai">
                                Jam Selesai
                                <span class="required">*</span>
                            </label>

                            <input
                                type="time"
                                id="jam_selesai"
                                name="jam_selesai"
                                value="{{ old('jam_selesai') }}"
                                required
                            >

                            @error('jam_selesai')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- =========================
                     KEPERLUAN
                ========================== -->

                <div class="section">

                    <div class="section-title">
                        Keperluan
                    </div>


                    <div class="row single">

                        <div class="form-group">

                            <label for="keperluan">
                                Keperluan
                                <span class="required">*</span>
                            </label>

                            <textarea
                                id="keperluan"
                                name="keperluan"
                                placeholder="Jelaskan keperluan pemakaian aula..."
                                required
                            >{{ old('keperluan') }}</textarea>

                            @error('keperluan')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- =========================
                     PESERTA
                ========================== -->

                <div class="section">

                    <div class="section-title">
                        Data Peserta
                    </div>


                    <div class="row">

                        <!-- JUMLAH PESERTA -->

                        <div class="form-group">

                            <label for="jumlah_peserta">
                                Jumlah Peserta
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                id="jumlah_peserta"
                                name="jumlah_peserta"
                                value="{{ old('jumlah_peserta') }}"
                                min="1"
                                max="{{ $aula->kapasitas }}"
                                placeholder="Jumlah peserta"
                                required
                            >

                            <div class="participant-info">

                                Kapasitas
                                <strong>
                                    {{ $aula->kapasitas }} orang
                                </strong>

                            </div>

                            @error('jumlah_peserta')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- PIHAK LUAR -->

                        <div class="form-group">

                            <label>
                                Peserta Pihak Luar
                                <span class="required">*</span>
                            </label>

                            <div class="radio-group">

                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="peserta_pihak_luar"
                                        value="ada"
                                        {{ old('peserta_pihak_luar') == 'ada' ? 'checked' : '' }}
                                        required
                                    >

                                    Ada

                                </label>


                                <label class="radio-option">

                                    <input
                                        type="radio"
                                        name="peserta_pihak_luar"
                                        value="tidak_ada"
                                        {{ old('peserta_pihak_luar') == 'tidak_ada' ? 'checked' : '' }}
                                        required
                                    >

                                    Tidak Ada

                                </label>

                            </div>

                            @error('peserta_pihak_luar')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="form-actions">

                    <a
                        href="{{ route('aulas') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="submitButton"
                    >
                        Ajukan Pemakaian
                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        const tanggalInput = document.getElementById('tanggal');
        const hariInput = document.getElementById('hari');

        const jumlahPesertaInput =
            document.getElementById('jumlah_peserta');

        const submitButton =
            document.getElementById('submitButton');

        const kapasitas =
            {{ $aula->kapasitas }};


        /*
        |--------------------------------------------------------------------------
        | OTOMATIS MENAMPILKAN HARI
        |--------------------------------------------------------------------------
        */

        tanggalInput.addEventListener('change', function () {

            if (!this.value) {
                hariInput.value = '';
                return;
            }

            const tanggal = new Date(this.value + 'T00:00:00');

            const hari = [
                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'
            ];

            hariInput.value =
                hari[tanggal.getDay()];
        });


        /*
        |--------------------------------------------------------------------------
        | CEK KAPASITAS PESERTA
        |--------------------------------------------------------------------------
        */

        jumlahPesertaInput.addEventListener('input', function () {

            const jumlah = parseInt(this.value) || 0;

            if (jumlah > kapasitas) {

                this.setCustomValidity(
                    'Jumlah peserta melebihi kapasitas aula.'
                );

                submitButton.disabled = true;

            } else {

                this.setCustomValidity('');

                submitButton.disabled = false;
            }
        });


        /*
        |--------------------------------------------------------------------------
        | CEK DATA LAMA SAAT HALAMAN DIBUKA
        |--------------------------------------------------------------------------
        */

        if (tanggalInput.value) {

            tanggalInput.dispatchEvent(
                new Event('change')
            );

        }

    </script>

</body>
</html>