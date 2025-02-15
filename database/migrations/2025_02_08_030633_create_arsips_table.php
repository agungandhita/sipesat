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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('arsip_id');
            $table->foreign('pengajuan_id')->references('pengajuan_id')->on('pengajuans')->onDelete('set null');
            $table->string('nomor_surat')->nullable();
            $table->enum('jenis_surat', ['masuk', 'keluar'])->nullable();
            $table->string('perihal')->nullable();
            $table->date('tanggal_surat');
            $table->string('asal_surat')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file_surat');
            $table->unsignedBigInteger('pengajuan_id')->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
