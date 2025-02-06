<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            font-size: 12pt;
            line-height: 1.6;
        }
        .container {
            max-width: 21cm;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            padding-top: 20px;
        }
        .logo {
            position: absolute;
            left: 40px;
            top: 0;
            width: 80px;
            height: 80px;
        }
        .header p {
            margin: 0;
            line-height: 1.4;
            font-weight: bold;
        }
        .title {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
            text-decoration: underline;
        }
        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            text-align: justify;
        }
        .data-row {
            display: flex;
            margin: 5px 0;
        }
        .label {
            width: 150px;
        }
        .separator {
            width: 20px;
            text-align: center;
        }
        .value {
            flex: 1;
        }
        .sign-right {
            width: 250px;
            text-align: center;
            margin-left: auto;
        }
        .signature {
            margin-top: 60px;
            text-decoration: underline;
            font-weight: bold;
        }
        .date {
            width: 100%;
            text-align: right;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .border-bottom {
            border-bottom: 3px solid black;
            margin-bottom: 10px;
        }
        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body {
                margin: 1.6cm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/api/placeholder/80/80" alt="Logo Kabupaten Lamongan" class="logo">
            <div class="border-bottom">
                <p>PEMERINTAH KABUPATEN LAMONGAN</p>
                <p>KECAMATAN TURI</p>
                <p>DESA GEDONGBOYOUNTUNG</p>
                <p>Jln. Poros Desa Gedongboyountung Kecamatan Turi – Lamongan 62252</p>
            </div>
        </div>

        <div class="title">SURAT KETERANGAN</div>
        <div class="nomor">Nomor : 470/ /413.321.19/2025</div>

        <div class="content">
            <p>Yang bertanda tangan dibawah ini Kepala Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan, Dengan ini menerangkan bahwa :</p>

            <div class="data-row">
                <div class="label">Nama</div>
                <div class="separator">:</div>
                <div class="value">SEJO</div>
            </div>
            <div class="data-row">
                <div class="label">NIK</div>
                <div class="separator">:</div>
                <div class="value"></div>
            </div>
            <div class="data-row">
                <div class="label">Tempat/Tgl Lahir</div>
                <div class="separator">:</div>
                <div class="value">Lamongan,</div>
            </div>
            <div class="data-row">
                <div class="label">Pekerjaan</div>
                <div class="separator">:</div>
                <div class="value">Nelayan</div>
            </div>
            <div class="data-row">
                <div class="label">Alamat</div>
                <div class="separator">:</div>
                <div class="value">Nataan RT. 016 RW.008 Desa Gedongboyountung Kecamatan Turi Kabupaten Lamongan</div>
            </div>
            <div class="data-row">
                <div class="label">Keterangan</div>
                <div class="separator">:</div>
                <div class="value">Bahwa Orang tersebut diatas benar-benar penduduk Desa Gedungboyountung Kecamatan Turi Kabupaten Lamongan dan termasuk dalam keluarga tidak mampu.</div>
            </div>
            <div class="data-row">
                <div class="label">Keperluan</div>
                <div class="separator">:</div>
                <div class="value">Digunakan untuk mengajukan PKH</div>
            </div>

            <p>Demikian Surat Keterangan ini dibuat dan dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="date">
            <p>Gedongboyountung, 22 Januari 2025</p>
        </div>

        <div class="sign-right">
            <p>Kepala Desa Gedongboyountung</p>
            <p class="signature">MOH. NAUFAL AL BARDANY</p>
        </div>
    </div>
</body>
</html>
