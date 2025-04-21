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
        Schema::create('sktms', function (Blueprint $table) {
            $table->id('sktm_id');
            $table->unsignedBigInteger('pengajuan_id')->nullable(); // Make nullable
            $table->string('nik', 16);
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->text('keterangan');
            $table->string('keperluan');
            $table->timestamps();
            $table->softDeletes();
        });

        if (Schema::hasTable('pengajuans')) {
            Schema::table('sktms', function (Blueprint $table) {
                $table->foreign('pengajuan_id')
                    ->references('pengajuan_id')
                    ->on('pengajuans')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sktms');
    }
};
