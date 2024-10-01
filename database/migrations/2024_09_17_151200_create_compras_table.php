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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->foreignId('proveedors_id')
            ->constrained('proveedors')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('productos_id')
            ->constrained('productos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->integer('cantidad'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
