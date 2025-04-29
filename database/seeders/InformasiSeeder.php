<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informasiData = [
            [
                'judul' => 'Pengumuman Penting: Jadwal Vaksinasi COVID-19',
                'slug' => 'pengumuman-penting-jadwal-vaksinasi-covid-19',
                'ringkasan' => 'Informasi mengenai jadwal vaksinasi COVID-19 untuk warga Desa Gedungboyountung.',
                'konten' => '<p>Kepada seluruh warga Desa Gedungboyountung,</p>
                            <p>Dengan ini kami sampaikan bahwa akan dilaksanakan program vaksinasi COVID-19 untuk seluruh warga desa pada:</p>
                            <ul>
                                <li>Tanggal: 15-16 Februari 2024</li>
                                <li>Waktu: 08.00 - 15.00 WIB</li>
                                <li>Tempat: Balai Desa Gedungboyountung</li>
                            </ul>
                            <p>Mohon membawa KTP dan Kartu Keluarga saat pendaftaran. Untuk informasi lebih lanjut, silakan hubungi kantor desa.</p>',
                'gambar_sampul' => 'vaksinasi.jpg',
                'status' => 'published',
                'user_id' => 1,
                'user_created' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_updated' => null,
                'deleted_at' => null,
                'user_deleted' => null,
                'deleted' => null
            ],
            [
                'judul' => 'Program Pemberdayaan UMKM Desa',
                'slug' => 'program-pemberdayaan-umkm-desa',
                'ringkasan' => 'Informasi tentang program pemberdayaan UMKM untuk meningkatkan ekonomi desa.',
                'konten' => '<p>Desa Gedungboyountung akan meluncurkan program pemberdayaan UMKM untuk meningkatkan ekonomi desa.</p>
                            <p>Program ini meliputi:</p>
                            <ol>
                                <li>Pelatihan kewirausahaan</li>
                                <li>Bantuan modal usaha</li>
                                <li>Pendampingan pemasaran produk</li>
                                <li>Fasilitasi perizinan usaha</li>
                            </ol>
                            <p>Pendaftaran dibuka mulai tanggal 1 Maret 2024. Silakan mendaftar di kantor desa dengan membawa fotokopi KTP dan proposal usaha sederhana.</p>',
                'gambar_sampul' => 'umkm.jpg',
                'status' => 'published',
                'user_id' => 1,
                'user_created' => 1,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
                'user_updated' => null,
                'deleted_at' => null,
                'user_deleted' => null,
                'deleted' => null
            ],
            [
                'judul' => 'Perbaikan Jalan Desa Tahap II',
                'slug' => 'perbaikan-jalan-desa-tahap-ii',
                'ringkasan' => 'Informasi mengenai jadwal dan lokasi perbaikan jalan desa tahap kedua.',
                'konten' => '<p>Diinformasikan kepada seluruh warga bahwa akan dilaksanakan perbaikan jalan desa tahap II yang meliputi:</p>
                            <ul>
                                <li>Jalan Mawar (sepanjang 500m)</li>
                                <li>Jalan Melati (sepanjang 350m)</li>
                                <li>Jalan Anggrek (sepanjang 200m)</li>
                            </ul>
                            <p>Pekerjaan akan dimulai pada tanggal 10 Maret 2024 dan diperkirakan selesai dalam waktu 45 hari. Selama masa perbaikan, mohon warga untuk berhati-hati dan menggunakan jalan alternatif yang telah disediakan.</p>
                            <p>Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>',
                'gambar_sampul' => 'jalan.jpg',
                'status' => 'published',
                'user_id' => 2,
                'user_created' => 2,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
                'user_updated' => null,
                'deleted_at' => null,
                'user_deleted' => null,
                'deleted' => null
            ],
            [
                'judul' => 'Lomba Desa Bersih dan Sehat 2024',
                'slug' => 'lomba-desa-bersih-dan-sehat-2024',
                'ringkasan' => 'Informasi tentang lomba kebersihan dan kesehatan lingkungan antar RT di desa.',
                'konten' => '<p>Dalam rangka meningkatkan kesadaran masyarakat akan pentingnya kebersihan dan kesehatan lingkungan, Desa Gedungboyountung akan menyelenggarakan "Lomba Desa Bersih dan Sehat 2024".</p>
                            <p>Kriteria penilaian meliputi:</p>
                            <ol>
                                <li>Kebersihan lingkungan</li>
                                <li>Pengelolaan sampah</li>
                                <li>Penghijauan</li>
                                <li>Sanitasi</li>
                                <li>Partisipasi warga</li>
                            </ol>
                            <p>Lomba akan dilaksanakan pada bulan April 2024 dengan hadiah total sebesar Rp 10.000.000. Mari kita wujudkan desa yang bersih dan sehat!</p>',
                'gambar_sampul' => 'lomba.jpg',
                'status' => 'draft',
                'user_id' => 1,
                'user_created' => 1,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
                'user_updated' => null,
                'deleted_at' => null,
                'user_deleted' => null,
                'deleted' => null
            ],
            [
                'judul' => 'Pelatihan Keterampilan Digital untuk Pemuda Desa',
                'slug' => 'pelatihan-keterampilan-digital-untuk-pemuda-desa',
                'ringkasan' => 'Program pelatihan keterampilan digital untuk meningkatkan kompetensi pemuda desa.',
                'konten' => '<p>Desa Gedungboyountung bekerjasama dengan Kementerian Komunikasi dan Informatika akan menyelenggarakan pelatihan keterampilan digital untuk pemuda desa.</p>
                            <p>Materi pelatihan meliputi:</p>
                            <ul>
                                <li>Dasar-dasar komputer dan internet</li>
                                <li>Media sosial untuk pemasaran</li>
                                <li>Desain grafis sederhana</li>
                                <li>Pembuatan website dasar</li>
                                <li>Digital marketing</li>
                            </ul>
                            <p>Pelatihan akan dilaksanakan setiap hari Sabtu selama 5 minggu berturut-turut mulai tanggal 20 Maret 2024. Pendaftaran dibuka untuk pemuda/i usia 17-30 tahun dan dapat dilakukan secara online melalui website desa atau langsung ke kantor desa.</p>',
                'gambar_sampul' => 'pelatihan.jpg',
                'status' => 'published',
                'user_id' => 2,
                'user_created' => 2,
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(15),
                'user_updated' => null,
                'deleted_at' => null,
                'user_deleted' => null,
                'deleted' => null
            ],
        ];

        DB::table('informasi')->insert($informasiData);
    }
}