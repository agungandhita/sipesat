<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kematian</title>
    <style>
        @page {
            margin: 1cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.3;
            font-size: 11pt;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            position: absolute;
            left: 30px;
            top: 20px;
            width: 55px;
        }

        .header h2 {
            margin: 0;
            font-size: 12pt;
            text-transform: uppercase;
        }

        .alamat {
            margin: 0;
            font-size: 10pt;
        }

        .line {
            border-bottom: 2px solid black;
            margin-bottom: 2px;
        }

        .double-line {
            border-bottom: 3px double black;
            margin-bottom: 15px;
        }

        .title {
            text-align: center;
            margin-bottom: 15px;
        }

        .title h3 {
            margin: 0;
            text-transform: uppercase;
            text-decoration: underline;
            font-size: 12pt;
        }

        .nomor {
            margin: 3px 0;
            text-align: center;
        }

        .content {
            margin-bottom: 8px;
        }

        table.data {
            margin-left: 40px;
            border-spacing: 0 2px;
        }

        table.data td:first-child {
            width: 120px;
            vertical-align: top;
        }

        table.data td:nth-child(2) {
            width: 15px;
            vertical-align: top;
        }

        .signature {
            float: right;
            margin-top: 15px;
            margin-right: 40px;
            text-align: center;
        }

        .signature-name {
            margin-top: 50px;
            text-decoration: underline;
            font-weight: bold;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('img/lamongan.png') }}" class="logo">
    <div class="header">
        <h2>PEMERINTAH KABUPATEN LAMONGAN</h2>
        <h2>KECAMATAN TURI</h2>
        <h2>DESA GEDONGBOYOUNTUNG</h2>
        <p class="alamat">Jln. Raya Desa Gedongboyountung Kecamatan Turi Kab. Lamongan 62252</p>
    </div>

    <div class="line"></div>
    <div class="double-line"></div>

    <div class="title">
        <h3>SURAT KETERANGAN KEMATIAN</h3>
        <p class="nomor">Nomor: {{ $nomor_surat }}</p>
    </div>

    <div class="content">
        Yang bertanda tangan dibawah ini :
    </div>

    <table class="data">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ strtoupper($meninggal->nama_pejabat) }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $meninggal->jabatan }}</td>
        </tr>
    </table>

    <div class="content" style="margin-top: 10px;">
        Dengan ini menerangkan dengan sebenarnya bahwa :
    </div>

    <table class="data">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $meninggal->nik_almarhum }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ strtoupper($meninggal->nama_almarhum) }}</td>
        </tr>
        <tr>
            <td>Tempat / Tgl Lahir</td>
            <td>:</td>
            <td>{{ $meninggal->tempat_lahir_almarhum }},
                {{ \Carbon\Carbon::parse($meninggal->tanggal_lahir_almarhum)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $meninggal->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $meninggal->agama }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $meninggal->pekerjaan_almarhum }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $meninggal->alamat_almarhum }}</td>
        </tr>
    </table>

    <div class="content" style="margin-top: 10px;">
        Orang tersebut diatas telah meninggal dunia pada :
    </div>

    <table class="data">
        <tr>
            <td>Hari dan tanggal kematian</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($meninggal->tanggal_meninggal)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Sebab kematian</td>
            <td>:</td>
            <td>{{ $meninggal->sebab_meninggal }}</td>
        </tr>
        <tr>
            <td>Tempat Kematian</td>
            <td>:</td>
            <td>{{ $meninggal->tempat_meninggal }}</td>
        </tr>
    </table>

    <div class="content" style="margin-top: 10px;">
        Yang melaporkan :
    </div>

    <table class="data">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $meninggal->nik_pelapor }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ strtoupper($meninggal->nama_pelapor) }}</td>
        </tr>
        <tr>
            <td>Tempat / Tgl Lahir</td>
            <td>:</td>
            <td>{{ $meninggal->tempat_lahir_pelapor }},
                {{ \Carbon\Carbon::parse($meninggal->tanggal_lahir_pelapor)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $meninggal->jenis_kelamin_pelapor }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $meninggal->alamat_pelapor }}</td>
        </tr>
    </table>

    <div class="content" style="margin-top: 10px;">
        Demikian Surat Keterangan ini kami buat dengan sebenar - benarnya dan dapat dipergunakan sebagaimana mestinya.
    </div>

    <div class="signature">
        Gedongboyountung, {{ \Carbon\Carbon::parse($tanggal)->isoFormat('D MMMM Y') }}<br>
        Kepala Desa<br>
        <div class="signature-name">
            {{ strtoupper($meninggal->nama_pejabat) }}
        </div>
    </div>
    <div class="clear"></div>
</body>

</html>
