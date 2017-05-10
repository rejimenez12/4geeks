<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note',function(Blueprint $table)
        {
            /**
            *   Creacion de tabla user en Base de datos fidelización.
            *   Comando: php artisan migrate - Uso: Debes ubicarte en la carpeta del proyecto y ejecutarlo.
            **/
            $table->Increments('id');
            $table->string('title',45);
            $table->longText('description');
            $table->string('mark',1)->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();


        });

        Schema::table('note', function(Blueprint $table){
            
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            
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
        Schema::dropIfExists('note');
    }
}
