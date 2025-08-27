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
        Schema::create('venta_have_producto', function (Blueprint $table) {
            
             // Relación con la tabla venta
            $table->foreignId('id_venta')->constrained(table: 'venta', column: 'id');

            // Relación con la tabla producto
            $table->foreignId('producto_id')->constrained(table: 'producto', column: 'id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_have_producto');
    }
};
