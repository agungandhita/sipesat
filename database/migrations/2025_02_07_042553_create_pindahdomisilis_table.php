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
        Schema::create('pindahdomisilis', function (Blueprint $table) {
            $table->id('pindah_id');
            $table->foreignId('pengajuan_id')->constrained('pengajuans', 'pengajuan_id');
            $table->string('kode_surat');
            $table->string('nama');
            $table->integer('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('keperluan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindahdomisilis');
    }
};
