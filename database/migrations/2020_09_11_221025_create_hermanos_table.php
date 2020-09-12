<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHermanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hermanos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('identificacion');
            $table->string('nombre');
            $table->bigInteger('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('tipo', ['Hermano', 'Amigo', 'Apartado'])->nullable();
            $table->enum('bautizado', ['Si', 'No'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hermanos');
    }
}
