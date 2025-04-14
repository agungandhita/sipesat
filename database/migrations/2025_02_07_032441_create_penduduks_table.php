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
            $table->string('nik')->unique();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
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
        Schema::dropIfExists('penduduks');
    }
};
