<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->after('informasi_id');
            $table->foreign('parent_id')->references('komentar_id')->on('komentar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};