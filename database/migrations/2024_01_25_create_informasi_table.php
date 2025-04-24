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
            $table->text('ringkasan');
            $table->text('konten');
            $table->string('gambar_sampul')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('user_created')->nullable();
            $table->timestamps();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('informasi');
    }
};
