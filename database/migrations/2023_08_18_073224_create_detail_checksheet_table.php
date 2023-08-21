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
        Schema::create('detail_checksheet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_checksheet');
            $table->integer('id_item_checksheet');
            $table->boolean('dilakukan');
            $table->boolean('hasil');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_checksheet');
    }
};
