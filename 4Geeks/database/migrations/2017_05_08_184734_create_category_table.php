<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category',function(Blueprint $table)
        {
            /**
            *   Creacion de tabla user en Base de datos fidelización.
            *   Comando: php artisan migrate - Uso: Debes ubicarte en la carpeta del proyecto y ejecutarlo.
            **/
            $table->Increments('id');
            $table->string('category',45);
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
        /**
        *   Eliminacion de tabla user en Base de datos fidelización.
        *   comando: php artisan migrate:rollback - Uso: Debes ubicarte en la carpeta del proyecto y ejecutarlo.
        **/
        Schema::dropIfExists('category');
    }
}
