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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id_Pr')->primary();
            $table->string('pic')->nullable();
            $table->string('proName');
            $table->float('price');
            $table->float('oldPrice');
            $table->string('description');
            $table->integer('stockQuantity');
            $table->boolean('valider')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
