<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domisilis', function (Blueprint $table) {
            $table->id('domisili_id');
            $table->unsignedBigInteger('pengajuan_id');
            $table->string('nama');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan')->nullable();
            $table->text('alamat');
            $table->text('keterangan');
            $table->string('keperluan');
            $table->timestamps();

            $table->foreign('pengajuan_id')->references('pengajuan_id')->on('pengajuans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domisilis');
    }
};
