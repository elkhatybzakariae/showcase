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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('id_Cl')->primary();
            $table->string('nomcomplet');
            $table->string('email')->unique();
            $table->string('Phone')->nullable();
            $table->string('ville')->nullable();
            // $table->foreign('ville')->on('villes')->references('id_V');
            $table->string('adress');
            $table->string('password');
            $table->text('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
