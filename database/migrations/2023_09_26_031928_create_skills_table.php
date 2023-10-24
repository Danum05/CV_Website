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
        Schema::create('skill', function (Blueprint $table) {
            $table->string('id');
            $table->unique('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nama_skill');
            $table->string('persen_skill');

            $table->foreign('identitas_id')->references('id')->on('identitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill');
    }
};
