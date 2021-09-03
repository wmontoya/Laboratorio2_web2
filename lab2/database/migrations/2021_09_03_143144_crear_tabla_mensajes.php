<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMensajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tbl_mensajes')) {
            Schema::create('tbl_mensajes', function (Blueprint $table) {
                $table->increments('id_mensaje');
                $table->string('mensaje');
                $table->string('fecha');
            });
        }
        if (Schema::hasTable('tbl_mensajes')) {
            Schema::table('tbl_mensajes', function (Blueprint $table) {
                $table->unsignedInteger('id_usuario');

                $table->foreign('id_usuario')
                    ->references('id_usuario')
                    ->on('tbl_usuarios')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
