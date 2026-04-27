<!DOCTYPE html>
<html>
<head>
    <title>Berita Acara</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            line-height: 1.7;
        }

        .center {
            text-align: center;
        }

        .ttd-table {
            width: 100%;
            margin-top: 40px;
        }

        .ttd-table td {
            text-align: center;
            border: none;
        }

        .table-barang {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-barang, .table-barang th, .table-barang td {
            border: 1px solid black;
        }

        .table-barang th, .table-barang td {
            padding: 5px;
            text-align: center;
        }

        .no-border td {
            border: none;
        }
    </style>
</head>
<body>

    <!-- JUDUL -->
    <h3 class="center"><b>BERITA ACARA PENGELUARAN BARANG</b></h3>

    <!-- PEMBUKA -->
    <p>
        Kami yang bertanda tangan di bawah ini. Pada periode 
        <b>{{ $tanggalAwal ?? '-' }}</b> s/d <b>{{ $tanggalAkhir ?? '-' }}</b>
    </p>

    <!-- PIHAK PERTAMA -->
    <table class="no-border">
        <tr>
            <td width="20%">Nama</td>
            <td>: __________________</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: Bendahara BOS</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: __________________</td>
        </tr>
    </table>

    <p>Selanjutnya disebut sebagai <b>PIHAK PERTAMA</b></p>

    <!-- PIHAK KEDUA -->
    <table class="no-border">
        <tr>
            <td width="20%">Nama</td>
            <td>: __________________</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: Bendahara Barang</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: __________________</td>
        </tr>
    </table>

    <p>Selanjutnya disebut sebagai <b>PIHAK KEDUA</b></p>

    <!-- ISI -->
    <p>
        PIHAK PERTAMA menyerahkan barang keluar kepada PIHAK KEDUA, dan PIHAK KEDUA 
        menyatakan telah menerima barang dari PIHAK PERTAMA dengan baik sesuai 
        dengan informasi yang tercantum di dalam daftar terlampir:
    </p>

    <!-- PENUTUP -->
    <p>
        Demikian berita acara pengeluaran barang ini telah dibuat oleh kedua belah pihak, 
        adapun barang-barang tersebut diserahkan dalam keadaan baik dan lengkap, sejak 
        penandatanganan berita acara ini, maka barang tersebut menjadi tanggung jawab 
        dari PIHAK KEDUA.
    </p>

    <!-- TTD ATAS -->
    <table class="ttd-table">
        <tr>
            <td>
                Yang Menyerahkan:<br>
                PIHAK PERTAMA<br><br><br><br>
                (......................................)
            </td>
            <td>
                Yang Menerima:<br>
                PIHAK KEDUA<br><br><br><br>
                (......................................)
            </td>
        </tr>
    </table>

    <br><br>

    <!-- LAMPIRAN -->
    <p><b>Lampiran.</b></p>

    <table class="table-barang">
        <thead>
            <tr>
                <th style="width: 40px;">NO</th>
                <th>NAMA BARANG</th>
                <th style="width: 80px;">JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaris as $item)
            <tr>
                <td style="width: 40px;">{{ $loop->iteration }}</td>
                <td>{{ $item->inventaris->nama }}</td>
                <td>{{ $item->jumlah_keluar ?? '0' }} buah</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- TTD BAWAH -->
    <table class="ttd-table">
        <tr>
            <td>
                Yang Menyerahkan:<br>
                PIHAK PERTAMA<br><br><br><br>
                (......................................)
            </td>
            <td>
                Yang Menerima:<br>
                PIHAK KEDUA<br><br><br><br>
                (......................................)
            </td>
        </tr>
    </table>

</body>
</html>