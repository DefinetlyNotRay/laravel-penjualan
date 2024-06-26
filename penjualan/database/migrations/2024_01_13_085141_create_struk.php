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
        Schema::create('struk', function (Blueprint $table) {
            $table->id('id_struk');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('items'); // Column to store items as a JSON array
            $table->integer('jumlah_barang');
            $table->integer('diskon');
            $table->integer('total');
            $table->integer('tunai');
            $table->integer('jumlah-total');
            $table->integer('kembalian');
            $table->timestamps();
           
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struk');
    }
};