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
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double black;
            padding-bottom: 10px;
        }

        .logo {
            width: 70px;
            height: auto;
            float: left;
            margin-right: 15px;
        }

        .header-text {
            font-weight: bold;
        }

        .title {
            font-size: 14pt;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            text-decoration: underline;
        }

        .nomor {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .content {
            text-align: justify;
            line-height: 1.5;
        }

        .opening {
            margin-bottom: 20px;
        }

        .data-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .data-table td {
            padding: 5px 0;
            vertical-align: top;
        }

        .data-table td:first-child {
            width: 120px;
        }

        .data-table td:nth-child(2) {
            width: 10px;
        }

        .closing {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .signature {
            float: right;
            width: 40%;
            text-align: center;
        }

        .signature-left {
            float: left;
            width: 40%;
            text-align: center;
        }

        .signature-name {
            margin-top: 60px;
            font-weight: bold;
            text-decoration: underline;
            display: inline-block;
            width: 100%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/lamongan.png') }}" class="logo">
        <div class="header-text">PEMERINTAH KABUPATEN LAMONGAN</div>
        <div class="header-text">KECAMATAN TURI</div>
        <div class="header-text">DESA GEDONGBOYOUNTUNG</div>
        <div style="font-size: 9pt;">Jl. Raya Desa Gedongboyountung Kecamatan Turi - Lamongan 62252</div>
    </div>

    <div class="title">SURAT KETERANGAN DOMISILI</div>
    <div class="nomor">Nomor:
        470/{{ explode('/', $nomor_surat)[1] }}/413.321.19/{{ explode('/', $nomor_surat)[3] }}
    </div>

    <div class="content">
        <div class="opening">
            Yang bertanda tangan dibawah ini Kepala Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan. Dengan ini
            menerangkan bahwa:
        </div>

        <table class="data-table">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ strtoupper($domisili->nama) }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $domisili->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>:</td>
                <td>{{ $domisili->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $domisili->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $domisili->alamat }}</td>
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
                <td style="width: 50%; text-align: center; vertical-align: top; margin-top: 2px">
                    <div>Yang Bersangkutan</div>
                    <div style="margin-top: 80px; font-weight: bold; text-decoration: underline;">
                        {{ strtoupper($domisili->nama) }}
                    </div>
                </td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div>Gedongboyountung, {{ date('d') }} agustus {{ date('Y') }}</div>
                    <div>Kepala Desa Gedongboyountung</div>
                    <div style="margin-top: 60px; font-weight: bold; text-decoration: underline;">
                        MOH. NAUFAL AL BARDANY
                    </div>
                </td>
            </tr>
        </table>

        <div class="clear"></div>
    </div>
</body>

</html>
