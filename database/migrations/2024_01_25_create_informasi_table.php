<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id('informasi_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('konten');
            $table->string('gambar_sampul')->nullable();
            $table->enum('kategori', ['pengumuman', 'berita', 'agenda']);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
};
