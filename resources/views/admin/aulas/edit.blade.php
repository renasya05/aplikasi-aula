<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Aula | SAPA</title>

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
            max-width: 900px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #12355b;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .back:hover {
            color: #0d2946;
        }

        .card {
            background: white;
            border: 1px solid #dfe4ea;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            color: #12355b;
            font-size: 23px;
            margin-bottom: 7px;
        }

        .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 7px;
            color: #374151;
        }

        .required {
            color: #dc3545;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            background: white;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #12355b;
            box-shadow: 0 0 0 2px rgba(18, 53, 91, 0.08);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .help-text {
            margin-top: 5px;
            font-size: 12px;
            color: #6b7280;
        }

        .error-text {
            display: block;
            margin-top: 5px;
            color: #dc2626;
            font-size: 12px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 14px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error ul {
            padding-left: 20px;
            margin-top: 6px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .button-area {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            border: none;
            padding: 11px 22px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            transition: 0.2s;
        }

        .btn-primary {
            background: #12355b;
            color: white;
        }

        .btn-primary:hover {
            background: #0d2946;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

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
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="logo">
        <h1>SAPA</h1>
        <p>Sistem Aplikasi Pemakaian Aula</p>
    </div>

    <nav class="menu">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.history') }}">Riwayat Pendaftaran</a>
        <a href="{{ route('admin.aulas') }}" class="active">Data Aula</a>
    </nav>

</aside>

<!-- MAIN -->
<main class="main">

    <div class="topbar">
        <h2>Data Aula</h2>

        <div class="admin-area">
            <span>{{ $user->name }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="content">

        <a href="{{ route('admin.aulas') }}" class="back">
            ← Kembali ke Data Aula
        </a>

        <div class="card">

            <h2>Edit Data Aula</h2>
            <p class="subtitle">Perbarui informasi data aula <strong>{{ $aula->nama_aula }}</strong>.</p>

            @if($errors->any())
                <div class="alert-error">
                    <strong>Terjadi kesalahan input:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.aulas.update', $aula->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_aula">
                        Nama Aula <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="nama_aula"
                        name="nama_aula"
                        value="{{ old('nama_aula', $aula->nama_aula) }}"
                        placeholder="Contoh: Aula Serbaguna"
                        required
                        autofocus
                    >
                    @error('nama_aula')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kapasitas">
                        Kapasitas (orang) <span class="required">*</span>
                    </label>
                    <input
                        type="number"
                        id="kapasitas"
                        name="kapasitas"
                        value="{{ old('kapasitas', $aula->kapasitas) }}"
                        min="1"
                        placeholder="Contoh: 100"
                        required
                    >
                    <div class="help-text">Jumlah kapasitas maksimal peserta yang dapat ditampung.</div>
                    @error('kapasitas')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">
                        Keterangan <span class="required">*</span>
                    </label>
                    <textarea
                        id="keterangan"
                        name="keterangan"
                        placeholder="Deskripsi aula, peruntukan kegiatan, dan lokasi..."
                        required
                    >{{ old('keterangan', $aula->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fasilitas">
                        Fasilitas
                    </label>
                    <textarea
                        id="fasilitas"
                        name="fasilitas"
                        placeholder="Contoh: AC, Sound System, Proyektor, Meja, Kursi..."
                    >{{ old('fasilitas', $aula->fasilitas) }}</textarea>
                    <div class="help-text">Daftar fasilitas yang disediakan (opsional).</div>
                    @error('fasilitas')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="button-area">
                    <a href="{{ route('admin.aulas') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
                </div>

            </form>

        </div>

    </div>

</main>

</body>
</html>
