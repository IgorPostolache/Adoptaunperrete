<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('avatar');
            $table->string('raza')->default('Mestizo');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('provincia');
            $table->mediumText('descripcion');           
            $table->integer('telefono');
            $table->string('correo');
            $table->integer('user_id');
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
        Schema::dropIfExists('anuncios');
    }
}
