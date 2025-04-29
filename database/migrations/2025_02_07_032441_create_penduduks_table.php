<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id('warga_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('rt')->nullable()->comment('Nomor RT');
            $table->string('rw')->nullable()->comment('Nomor RW');
            $table->string('dusun')->nullable()->comment('Nama Dusun');
            $table->enum('kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('nik')->unique();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'])->nullable();
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->nullable();
            $table->enum('pekerjaan', ['Petani', 'Nelayan', 'Pedagang', 'PNS', 'TNI/Polri', 'Swasta', 'Wiraswasta', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga', 'Tidak Bekerja', 'Lainnya'])->nullable();
            $table->enum('pendidikan', ['Tidak/Belum Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'D1/D2/D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            // Menambahkan indeks untuk mempercepat pencarian berdasarkan RT dan Dusun
            $table->index('rt');
            $table->index('dusun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
