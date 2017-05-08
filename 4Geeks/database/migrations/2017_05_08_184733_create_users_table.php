<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table)
        {
            /**
            *   Creacion de tabla user en Base de datos fidelización.
            *   Comando: php artisan migrate - Uso: Debes ubicarte en la carpeta del proyecto y ejecutarlo.
            **/
            $table->Increments('id');
            $table->string('name',45);
            $table->string('email',100);
            $table->string('password',255);
            $table->integer('type_user_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();


        });

        Schema::table('users', function(Blueprint $table){
            
            $table->foreign('type_user_id')->references('id')->on('type_user')->onUpdate('cascade');
            
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
        Schema::dropIfExists('users');
    }
}
