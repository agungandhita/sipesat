<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12pt;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 80px;
            height: auto;
            position: absolute;
            left: 30px;
            top: 20px;
        }
        .header-text {
            font-size: 12pt;
            font-weight: bold;
            margin: 0;
            padding: 0;
        }
        .alamat {
            font-size: 11pt;
            margin-bottom: 10px;
        }
        .border-bottom {
            border-bottom: 3px double #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            text-decoration: underline;
            margin: 30px 0 5px;
        }
        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin: 0 30px;
        }
        .opening {
            margin-bottom: 20px;
            text-align: justify;
        }
        .data-table {
            margin-left: 30px;
            border-spacing: 0 10px;
        }
        .data-table td:first-child {
            width: 150px;
            vertical-align: top;
        }
        .data-table td:nth-child(2) {
            width: 20px;
            vertical-align: top;
        }
        .data-table td:last-child {
            text-align: justify;
        }
        .closing {
            margin-top: 20px;
            text-align: justify;
        }
        .signature-container {
            margin-top: 40px;
            width: 100%;
        }
        .signature-right {
            text-align: left;
            float: right;
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/lamongan.png') }}">
        <div class="border-bottom">
            <div class="header-text">PEMERINTAH KABUPATEN LAMONGAN</div>
            <div class="header-text">KECAMATAN TURI</div>
            <div class="header-text">DESA GEDONGBOYOUNTUNG</div>
            <div class="alamat">Jln. Raya Desa Gedongboyountung Kecamatan Turi - Lamongan 62252</div>
        </div>
    </div>

    <div class="title">SURAT KETERANGAN DOMISILI</div>
    <div class="nomor">Nomor: {{ $nomor_surat }}</div>

    <div class="content">
        <div class="opening">
            Yang bertanda tangan dibawah ini Kepala Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan. Dengan ini menerangkan bahwa:
        </div>

        <table class="data-table">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $domisili->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $domisili->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>:</td>
                <td>{{ $domisili->tempat_lahir }}, {{ \Carbon\Carbon::parse($domisili->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $domisili->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>Nomor RT. 015/008 Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $domisili->keterangan }}</td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td>:</td>
                <td>{{ $domisili->keperluan }}</td>
            </tr>
        </table>

        <div class="closing">
            Demikian Surat Keterangan ini dibuat dan dapat dipergunakan sebagaimana mestinya.
        </div>

        <table style="width: 100%; margin-top: 30px;">
            <tr>
                <td style="width: 50%; text-align: center;">
                    Yang Bersangkutan
                </td>
                <td style="width: 50%; text-align: center;">
                    Gedongboyountung, {{ \Carbon\Carbon::now()->format('d F Y') }}
                    <br>
                    Kepala Desa Gedongboyountung
                </td>
            </tr>
            <tr>
                <td style="padding-top: 80px; text-align: center;">
                    <span style="text-decoration: underline; font-weight: bold;">{{ strtoupper($domisili->nama) }}</span>
                </td>
                <td style="padding-top: 80px; text-align: center;">
                    <span style="text-decoration: underline; font-weight: bold;">MOH. NAUFAL AL BARDANY</span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
