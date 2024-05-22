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
        Schema::table('layanan', function (Blueprint $table) {
            if (Schema::hasColumn('layanan', 'kategori_layanan')){
                $table->dropColumn('kategori_layanan');
            };

            $table->unsignedBigInteger('kategori_layanan');
            $table->foreign('kategori_layanan')->on('kategori_layanans')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('layanan', function (Blueprint $table) {
            //
        });
    }
};