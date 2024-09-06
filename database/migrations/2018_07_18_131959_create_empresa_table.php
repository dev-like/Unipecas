<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomefantasia',150);
            $table->string('celular',45)->nullable();
            $table->string('telefone',45)->nullable();
            $table->string('email',30)->nullable();
            $table->string('rua',500)->nullable();
            $table->string('bairro',500)->nullable();
            $table->string('instagram',250)->nullable();
            $table->string('facebook',250)->nullable();
            $table->string('whatsapp',250)->nullable();
            $table->string('missao',350)->nullable();
            $table->string('visao',350)->nullable();
            $table->string('valores',350)->nullable();
            $table->text('tradicao')->nullable();
            $table->string('cidade',350)->nullable();
            $table->string('estado',350)->nullable();
            $table->string('video',45)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
