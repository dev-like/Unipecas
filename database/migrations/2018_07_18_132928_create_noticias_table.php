<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
          $table->increments('id');
          $table->string('titulo', 100);
          $table->string('descricao', 2000)->nullable();
          $table->string('tags', 255)->nullable();
          $table->date('datapublicacao')->now('');
          $table->text('conteudo');
          $table->string('imagem')->nullable();
          $table->string('slug');

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
        Schema::dropIfExists('noticias');
    }
}
