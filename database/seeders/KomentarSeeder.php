<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $komentarData = [
            [
                'user_id' => 3,
                'informasi_id' => 1,
                'isi_komentar' => 'Terima kasih atas informasinya. Apakah vaksinasi ini untuk dosis pertama atau booster?',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2)
            ],
            [
                'user_id' => 1,
                'informasi_id' => 1,
                'isi_komentar' => 'Vaksinasi ini untuk dosis pertama, kedua, dan booster. Silakan datang sesuai dengan kebutuhan Anda.',
                'created_at' => Carbon::now()->subDays(1)->addHours(3),
                'updated_at' => Carbon::now()->subDays(1)->addHours(3)
            ],
            [
                'user_id' => 4,
                'informasi_id' => 1,
                'isi_komentar' => 'Apakah perlu membawa kartu vaksin sebelumnya untuk yang ingin booster?',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1)
            ],
            [
                'user_id' => 2,
                'informasi_id' => 2,
                'isi_komentar' => 'Program yang sangat bagus untuk memajukan ekonomi desa. Semoga banyak UMKM yang bisa berkembang.',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4)
            ],
            [
                'user_id' => 5,
                'informasi_id' => 2,
                'isi_komentar' => 'Saya tertarik dengan program ini. Apakah ada batasan jenis usaha yang bisa didaftarkan?',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3)
            ],
            [
                'user_id' => 1,
                'informasi_id' => 2,
                'isi_komentar' => 'Tidak ada batasan jenis usaha, semua jenis UMKM bisa mendaftar selama memenuhi kriteria yang ditentukan.',
                'created_at' => Carbon::now()->subDays(2)->addHours(5),
                'updated_at' => Carbon::now()->subDays(2)->addHours(5)
            ],
            [
                'user_id' => 3,
                'informasi_id' => 3,
                'isi_komentar' => 'Mohon informasi jalan alternatif yang bisa digunakan selama perbaikan Jalan Mawar.',
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8)
            ],
            [
                'user_id' => 2,
                'informasi_id' => 3,
                'isi_komentar' => 'Untuk alternatif Jalan Mawar, bisa melalui Jalan Dahlia dan Jalan Kenanga. Peta alternatif akan dipasang di beberapa titik strategis.',
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7)
            ],
            [
                'user_id' => 4,
                'informasi_id' => 5,
                'isi_komentar' => 'Apakah pelatihan ini gratis? Dan berapa kuota peserta yang bisa ikut?',
                'created_at' => Carbon::now()->subDays(12),
                'updated_at' => Carbon::now()->subDays(12)
            ],
            [
                'user_id' => 2,
                'informasi_id' => 5,
                'isi_komentar' => 'Ya, pelatihan ini gratis. Kuota terbatas untuk 30 peserta, jadi segera daftar untuk mendapatkan tempat.',
                'created_at' => Carbon::now()->subDays(11),
                'updated_at' => Carbon::now()->subDays(11)
            ],
        ];

        DB::table('komentar')->insert($komentarData);
    }
}