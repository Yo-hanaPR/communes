<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            //$table->id();

            $table->increments('id_reg')->comment('Identificador único del registro');
            $table->string('descripcion', 90)->comment('Descripción del registro');
            $table->enum('status', ['A', 'I', 'TRASH'])->default('A')->comment('Estado del registro: A = Activo, I = Inactivo, TRASH = Papelera');
            $table->timestamps();
            $table->primary('id_reg');
        });

        DB::statement('ALTER TABLE regions ENGINE = MyISAM');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
