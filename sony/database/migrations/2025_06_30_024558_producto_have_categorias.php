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
        Schema::create('producto_have_categorias', function (Blueprint $table) {
            
            $table->foreignId('producto_id')->constrained(table: 'producto', column: 'id');
            $table->unsignedSmallInteger('categoria_fk');
            $table->foreign('categoria_fk')->references('categoria_id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_have_categorias');
    }
};
