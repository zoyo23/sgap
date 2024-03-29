<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaEmbalaOvos extends Migration
{

    public function up()
    {
        Schema::create("embala_ovos", function (Blueprint $table) {
            $table->increments("id"); //Id de cadastro
            $table->date("data"); //Data de embalagem
            $table->time("hora"); //Hora de embalagem
            $table->string("lote"); //Lote de embalagem
            $table->integer("quantidade_embalada"); //Quantidade de embalagens
            $table->string("tipo_embalagem"); //Tipo de embalagem
            $table->integer("id_usuario")->unsigned(); //Id usuário autenticado
            $table->foreign("id_usuario")->references("id")->on("usuario");
            $table->string("observacoes"); //Observações sobre embalagem de ovos
            $table->boolean("ativo")->default(1); //Exclusão simulada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("embala_ovos");
    }

}
