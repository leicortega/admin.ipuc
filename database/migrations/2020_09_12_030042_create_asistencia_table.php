<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();

            $table->float('temperatura')->nullable();

            $table->enum('sintomas', ['Si', 'No'])->nullable();
            $table->enum('contacto_personas_infectadas', ['Si', 'No'])->nullable();

            $table->foreignId('culto_id')
                ->constrained('cultos')
                ->onDelete('cascade');

            $table->foreignId('hermano_id')
                ->constrained('hermanos')
                ->onDelete('cascade');

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
        Schema::dropIfExists('asistencia');
    }
}
