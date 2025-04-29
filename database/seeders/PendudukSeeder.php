<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Daftar dusun di desa
        $dusunList = ['Krajan', 'Sumbersari', 'Tegalrejo', 'Karanganyar', 'Sukamaju'];
        
        // Membuat 100 data penduduk dummy
        for ($i = 0; $i < 100; $i++) {
            $jenis_kelamin = $faker->randomElement(['laki-laki', 'perempuan']);
            $rt = sprintf('%02d', $faker->numberBetween(1, 10));
            $rw = sprintf('%02d', $faker->numberBetween(1, 5));
            $dusun = $faker->randomElement($dusunList);
            
            Penduduk::create([
                'nama' => $faker->name($jenis_kelamin == 'laki-laki' ? 'male' : 'female'),
                'alamat' => $faker->address,
                'rt' => $rt,
                'rw' => $rw,
                'dusun' => $dusun,
                'kelamin' => $jenis_kelamin,
                'jenis_kelamin' => $jenis_kelamin,
                'nik' => $faker->unique()->numerify('################'), // 16 digit NIK
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-80 years', '-1 year')->format('Y-m-d'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pekerjaan' => $faker->randomElement(['Petani', 'Nelayan', 'Pedagang', 'PNS', 'TNI/Polri', 'Swasta', 'Wiraswasta', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga', 'Tidak Bekerja']),
                'pendidikan' => $faker->randomElement(['Tidak/Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1/D2/D3', 'D4/S1', 'S2', 'S3']),
                'user_created' => 1, // ID admin default
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
