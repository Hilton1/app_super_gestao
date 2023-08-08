<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // adicionando a coluna motivo_contatos_id
    Schema::table('site_contatos', function (Blueprint $table) {
      $table->unsignedBigInteger('motivo_contatos_id');
    });

    // copiando os valores da coluna motivo_contatos para motivo_contatos_id
    DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

    // criando a fk e remover a coluna motivo_contato
    Schema::table('site_contatos', function (Blueprint $table) {
      $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
      $table->dropColumn('motivo_contato');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    // criar a columa motivo_contato e remover a fk
    Schema::table('site_contatos', function (Blueprint $table) {
      $table->integer('motivo_contato');
      $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
    });

    // copiando os valores da coluna motivo_contatos_id para motivo_contato
    DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

    // removendo a coluna motivo_contatos_id
    Schema::table('site_contatos', function (Blueprint $table) {
      $table->dropColumn('motivo_contatos_id');
    });
  }
}
