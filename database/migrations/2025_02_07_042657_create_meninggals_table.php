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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id('meninggal_id');
            $table->foreignId('pengajuan_id')->constrained('pengajuans', 'pengajuan_id');
            $table->string('kode_surat');
            // Data almarhum/almarhumah
            $table->string('nik_meninggal');
            $table->string('nama_meninggal');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('pekerjaan')->nullable();
            $table->text('alamat');
            // Data kematian
            $table->date('tanggal_meninggal');
            $table->string('sebab_meninggal');
            $table->string('tempat_meninggal');
            // Data pelapor
            $table->string('nik_pelapor');
            $table->string('nama_pelapor');
            $table->string('tempat_lahir_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->enum('jenis_kelamin_pelapor', ['Laki-laki', 'Perempuan']);
            $table->text('alamat_pelapor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meninggals');
    }
};
