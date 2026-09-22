<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pemakaian Aula | SAPA</title>

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

        /* NAVBAR */
        .navbar {
            height: 70px;
            background: #12355b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .brand-subtitle {
            font-size: 12px;
            opacity: 0.85;
            margin-top: 3px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 18px;
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
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #e9eef4;
        }

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #12355b;
            text-decoration: none;
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
            color: #12355b;
            font-size: 28px;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #667085;
            font-size: 14px;
        }

        /* SUCCESS */
        .success-box {
            background: #ecfdf3;
            border: 1px solid #abefc6;
            color: #067647;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: #12355b;
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eaecf0;
            font-size: 13px;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .aula-name {
            font-weight: 700;
            color: #12355b;
        }

        .date {
            font-weight: 600;
            color: #344054;
        }

        .time {
            white-space: nowrap;
            color: #667085;
        }

        .purpose {
            max-width: 220px;
            line-height: 1.5;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-menunggu {
            background: #fff4cc;
            color: #946200;
        }

        .status-disetujui {
            background: #dcfae6;
            color: #067647;
        }

        .status-ditolak {
            background: #fee4e2;
            color: #b42318;
        }

        .status-dibatalkan {
            background: #eaecf0;
            color: #475467;
        }

        /* EMPTY */
        .empty {
            padding: 55px 20px;
            text-align: center;
        }

        .empty h3 {
            color: #344054;
            margin-bottom: 8px;
        }

        .empty p {
            color: #667085;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            background: #12355b;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn:hover {
            background: #0d2947;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

            .navbar {
                padding: 0 20px;
            }

            .brand-subtitle,
            .user-name {
                display: none;
            }

            .page-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div>
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

        <a href="{{ route('dashboard') }}" class="back-link">
            ← Kembali ke Dashboard
        </a>


        <div class="page-header">

            <h1>
                Riwayat Pemakaian Aula
            </h1>

            <p>
                Daftar pengajuan pemakaian aula yang telah Anda lakukan.
            </p>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if (session('success'))

            <div class="success-box">
                {{ session('success') }}
            </div>

        @endif


        <div class="table-card">

            @if ($pendaftarans->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Aula</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Unit Organisasi</th>
                                <th>Jumlah Peserta</th>
                                <th>Pihak Luar</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($pendaftarans as $pendaftaran)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        <div class="aula-name">
                                            {{ $pendaftaran->aula->nama_aula ?? '-' }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="date">
                                            {{ \Carbon\Carbon::parse($pendaftaran->tanggal)
                                                ->locale('id')
                                                ->translatedFormat('d F Y') }}
                                        </div>

                                        <small>
                                            {{ \Carbon\Carbon::parse($pendaftaran->tanggal)
                                                ->locale('id')
                                                ->translatedFormat('l') }}
                                        </small>

                                    </td>


                                    <td>

                                        <div class="time">
                                            {{ \Carbon\Carbon::parse($pendaftaran->jam_mulai)->format('H:i') }}
                                            -
                                            {{ \Carbon\Carbon::parse($pendaftaran->jam_selesai)->format('H:i') }}
                                        </div>

                                    </td>


                                    <td>
                                        {{ $pendaftaran->unit_organisasi ?? '-' }}
                                    </td>


                                    <td>
                                        {{ $pendaftaran->jumlah_peserta }}
                                        orang
                                    </td>


                                    <td>

                                        @if ($pendaftaran->peserta_pihak_luar === 'ada')
                                            Ada
                                        @else
                                            Tidak Ada
                                        @endif

                                    </td>


                                    <td>

                                        <div class="purpose">
                                            {{ $pendaftaran->keperluan }}
                                        </div>

                                    </td>


                                    <td>

                                        @if ($pendaftaran->status === 'menunggu')

                                            <span class="status status-menunggu">
                                                Menunggu
                                            </span>

                                        @elseif ($pendaftaran->status === 'disetujui')

                                            <span class="status status-disetujui">
                                                Disetujui
                                            </span>

                                        @elseif ($pendaftaran->status === 'ditolak')

                                            <span class="status status-ditolak">
                                                Ditolak
                                            </span>

                                        @elseif ($pendaftaran->status === 'dibatalkan')

                                            <span class="status status-dibatalkan">
                                                Dibatalkan
                                            </span>

                                        @else

                                            <span class="status status-menunggu">
                                                {{ ucfirst($pendaftaran->status) }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">

                    <h3>
                        Belum Ada Pengajuan
                    </h3>

                    <p>
                        Anda belum memiliki riwayat pemakaian aula.
                    </p>

                    <a
                        href="{{ route('aulas') }}"
                        class="btn"
                    >
                        Lihat Daftar Aula
                    </a>

                </div>

            @endif

        </div>

    </main>

</body>

</html>