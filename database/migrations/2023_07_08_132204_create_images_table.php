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
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger(('adv_id'))->nullable();
            $table->foreign(('adv_id'))->references('id')->on('advs')->onDelete('cascade'); //cascade mi dice che quando si cancellano le immagini, "a cascata" verrà cancellato anche l'annuncio
            $table->string('path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
