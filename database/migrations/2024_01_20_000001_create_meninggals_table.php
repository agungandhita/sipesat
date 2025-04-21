<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id('meninggal_id');
            $table->unsignedBigInteger('pengajuan_id')->constrained('pengajuans', 'pengajuan_id')->onDelete('cascade');
            $table->string('nama_pejabat');
            $table->string('jabatan');
            $table->string('nik_almarhum', 16);
            $table->string('nama_almarhum');
            $table->string('tempat_lahir_almarhum');
            $table->date('tanggal_lahir_almarhum');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('warga_negara');
            $table->string('agama');
            $table->string('pekerjaan_almarhum');
            $table->text('alamat_almarhum');
            $table->date('tanggal_meninggal');
            $table->string('sebab_meninggal');
            $table->string('tempat_meninggal');
            $table->string('nik_pelapor', 16);
            $table->string('nama_pelapor');
            $table->string('tempat_lahir_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->enum('jenis_kelamin_pelapor', ['Laki-laki', 'Perempuan']);
            $table->text('alamat_pelapor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meninggals');
    }
};
