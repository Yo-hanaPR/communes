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
        Schema::create('customers', function (Blueprint $table) {
            
            
            $table->string('dni', 45)->comment('Documento de identidad');
            $table->integer('id_reg')->comment('ID de la región');
            $table->integer('id_com')->comment('ID de la comuna');
            $table->string('email', 120)->comment('Correo electrónico');
            $table->string('name', 45)->comment('Nombre');
            $table->string('lastname', 45)->comment('Apellido');
            $table->string('address', 255)->comment('Dirección');
            $table->dateTime('date_reg')->comment('Fecha y hora del registro');
            $table->enum('status', ['A', 'I', 'TRASH'])->default('A')->comment('Estado del registro: A - Activo, I - Inactivo, TRASH - Registro eliminado');
            

            $table->primary(['dni', 'id_reg', 'id_com'])->comment('Clave primaria compuesta'); //La llave primaria compuesta hace que Cada combinación de DNI, ID_REG, e ID_COM es única para cada registro. Es decir, no pueden haber dos registros con DNI, ID_REG, e ID_COM iguales.

            $table->index(['id_com', 'id_reg'])->comment('Índice de llave foránea');//indice compuesto para buscar registros que coincidan 
            $table->unique('email')->comment('Índice único para el campo email');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
