<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToSuaTabela extends Migration
{

    public function up()
    {
        Schema::create('sua_tabela2', function (Blueprint $table) {
            $table->id(); // Adiciona um campo 'id' com auto incremento
            $table->string('nome');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('razaosocial')->nullable();
            $table->string('apelido')->nullable();
            $table->string('nomefantasia')->nullable();
            $table->enum('tipopessoa', ['Física', 'Jurídica']);
            $table->timestamps(); // Adiciona os campos 'created_at' e 'updated_at' para registrar timestamps
        });
    }

    public function down()
    {
        Schema::table('sua_tabela2', function (Blueprint $table) {
            $table->dropColumn('nome');
            $table->dropColumn('cpf');
            $table->dropColumn('cnpj');
            $table->dropColumn('tipopessoa');
            $table->dropColumn('razaosocial');
            $table->dropColumn('apelido');
            $table->dropColumn('nomefantasia');
        });
    }
}
