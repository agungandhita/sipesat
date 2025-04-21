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
            $table->unsignedBigInteger('user_id')->constrained('users')->onDelete('cascade'); // untuk mengetahui pembuat berita
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('konten');
            $table->string('gambar_sampul')->nullable(); // untuk thumbnail berita
            $table->string('excerpt')->nullable(); // untuk ringkasan berita
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('views')->default(0); // untuk menghitung jumlah view
            $table->timestamps();
            $table->softDeletes(); // untuk fitur trash/recycle bin
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
};
