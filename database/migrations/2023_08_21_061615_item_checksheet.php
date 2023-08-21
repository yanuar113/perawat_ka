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
        //
        Schema::create('item_checksheet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kereta');
            $table->integer('id_kategori_checksheet');
            $table->string('nama_item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('item_checksheet');
    }
};
