<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileDesa;
use Illuminate\Support\Facades\DB;

class ProfileDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data yang ada terlebih dahulu
        DB::table('profile_desa')->truncate();

        // Data Kepala Desa
        ProfileDesa::create([
            'nama' => 'Moh Naufal Al Bardany',
            'jabatan' => 'Kepala Desa',
            'keterangan' => 'Memimpin penyelenggaraan pemerintahan desa dan pembangunan untuk kesejahteraan masyarakat.',
            'user_created' => 1,
        ]);

        // Data Kepala Seksi (Kasi)
        $kasi = [
            [
                'nama' => 'Zainul',
                'jabatan' => 'Kasi Pemerintahan',
                'keterangan' => 'Bertanggung jawab atas urusan pemerintahan desa.',
                'user_created' => 1,
            ],
            [
                'nama' => 'Mujianto',
                'jabatan' => 'Kasi Kemasyarakatan',
                'keterangan' => 'Bertanggung jawab atas urusan kemasyarakatan desa.',
                'user_created' => 1,
            ],
            [
                'nama' => 'Nur Kholidah',
                'jabatan' => 'Kasi Pelayanan',
                'keterangan' => 'Bertanggung jawab atas urusan pelayanan masyarakat desa.',
                'user_created' => 1,
            ],
        ];

        foreach ($kasi as $data) {
            ProfileDesa::create($data);
        }

        // Data Kepala Dusun (Kasun)
        $kasun = [
            [
                'nama' => 'Sholikhan',
                'jabatan' => 'Kepala Dusun Gedong',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Akhmad Zaini',
                'jabatan' => 'Kepala Dusun Klari',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Sukandar',
                'jabatan' => 'Kepala Dusun Dampet',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Mokhamad Saiful Buchori',
                'jabatan' => 'Kepala Dusun Mlanggeng',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Askari',
                'jabatan' => 'Kepala Dusun Boyosari',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Mujianto',
                'jabatan' => 'Kepala Dusun Nataan PJ',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Suut',
                'jabatan' => 'Kepala Dusun Ngujungjobo',
                'keterangan' => null,
                'user_created' => 1,
            ],
        ];

        foreach ($kasun as $data) {
            ProfileDesa::create($data);
        }

        // Data Sekretaris Desa & Kepala Urusan
        $sekdes_kaur = [
            [
                'nama' => 'Zainul',
                'jabatan' => 'Sekretaris Desa',
                'keterangan' => 'PJ',
                'user_created' => 1,
            ],
            [
                'nama' => 'Hartini',
                'jabatan' => 'Kaur Keuangan',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => 'Zakaria',
                'jabatan' => 'Kaur Perencanaan',
                'keterangan' => null,
                'user_created' => 1,
            ],
            [
                'nama' => '-',
                'jabatan' => 'Kaur Umum',
                'keterangan' => null,
                'user_created' => 1,
            ],
        ];

        foreach ($sekdes_kaur as $data) {
            ProfileDesa::create($data);
        }
    }
}