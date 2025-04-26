<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 30px;
            line-height: 1.5;
            font-size: 12pt;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            position: absolute;
            left: 30px;
            top: 30px;
            width: 70px;
        }

        .header h2 {
            margin: 0;
            font-size: 14pt;
        }

        .alamat {
            margin: 0;
            font-size: 11pt;
        }

        .line {
            border-bottom: 2px solid black;
            margin-bottom: 3px;
        }

        .double-line {
            border-bottom: 3px double black;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .title h3 {
            margin: 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .nomor {
            margin: 5px 0;
        }

        .content {
            margin-bottom: 20px;
        }

        table.data {
            margin-left: 30px;
            border-spacing: 0 5px;
        }

        table.data td:first-child {
            width: 120px;
            vertical-align: top;
        }

        table.data td:nth-child(2) {
            width: 20px;
            vertical-align: top;
        }

        .signature {
            width: 100%;
            margin-top: 30px;
        }

        .signature td {
            width: 50%;
            vertical-align: top;
        }

        .signature-content {
            text-align: center;
        }

        .underline {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('img/lamongan.png') }}" class="logo">
    <div class="header">
        <h2>PEMERINTAH KABUPATEN LAMONGAN</h2>
        <h2>KECAMATAN TURI</h2>
        <h2>DESA GEDONGBOYOUNTUNG</h2>
        <p class="alamat">Jln. Raya Desa Gedongboyountung Kecamatan Turi - Lamongan 62252</p>
    </div>

    <div class="line"></div>
    <div class="double-line"></div>

    <div class="title">
        <h3>SURAT KETERANGAN TIDAK MAMPU</h3>
        <p class="nomor">Nomor: {{ $nomor_surat }}</p>
    </div>

    <div class="content">
        Yang bertanda tangan dibawah ini Kepala Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan, Dengan ini
        menerangkan bahwa :
    </div>

    <table class="data">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $sktm->nama }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $sktm->nik }}</td>
        </tr>
        <tr>
            <td>Tempat/Tgl Lahir</td>
            <td>:</td>
            <td>{{ $sktm->tempat_lahir }}, {{ \Carbon\Carbon::parse($sktm->tanggal_lahir)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $sktm->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $sktm->alamat }}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>{{ $sktm->keterangan }}</td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td>{{ $sktm->keperluan }}</td>
        </tr>
    </table>

    <div class="content" style="margin-top: 20px;">
        Demikian Surat Keterangan ini dibuat dan dapat dipergunakan sebagaimana mestinya.
    </div>

    <table class="signature">
        <tr>
            <td>
                <div class="signature-content">
                    Yang Bersangkutan
                </div>
            </td>
            <td>
                <div class="signature-content">
                    Gedongboyountung, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}<br>
                    Kepala Desa Gedongboyountung
                </div>
            </td>
        </tr>
        <tr>
            <td style="height: 80px;"></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <div class="signature-content">
                    <span class="underline">{{ $sktm->nama }}</span>
                </div>
            </td>
            <td>
                <div class="signature-content">
                    <span class="underline">MOH. NAUFAL AL BARDANY</span>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
