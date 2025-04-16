<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 5px 0;
        }
        .content {
            margin-bottom: 30px;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.data td {
            padding: 5px 0;
            vertical-align: top;
        }
        table.data td:first-child {
            width: 150px;
        }
        .signature {
            float: right;
            width: 40%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>PEMERINTAH KABUPATEN LAMONGAN</h2>
        <h2>KECAMATAN TURI</h2>
        <h2>DESA GEDUNGBOYOUNTUNG</h2>
        <hr>
        <h2>SURAT KETERANGAN DOMISILI</h2>
        <p>Nomor: {{ $nomor_surat }}</p>
    </div>
    
    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Kepala Desa Gedungboyountung, Kecamatan Turi, Kabupaten Lamongan, dengan ini menerangkan bahwa:</p>
        
        <table class="data">
            <tr>
                <td>Nama</td>
                <td>: {{ $domisili->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $domisili->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>: {{ $domisili->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $domisili->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $domisili->alamat }}</td>
            </tr>
        </table>
        
        <p>{{ $domisili->keterangan }}</p>
        
        <p>Surat keterangan ini dibuat untuk keperluan: <strong>{{ $domisili->keperluan }}</strong></p>
        
        <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
    
    <div class="signature">
        <p>Gedungboyountung, {{ $tanggal }}</p>
        <p>Kepala Desa Gedungboyountung</p>
        <br><br><br>
        <p><strong>____________________</strong></p>
    </div>
</body>
</html>