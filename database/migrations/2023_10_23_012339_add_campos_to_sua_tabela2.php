<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id(); // Adiciona um campo 'id' com auto incremento
            $table->string('nome');
            $table->string('email');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('razaosocial')->nullable();
            $table->string('apelido')->nullable();
            $table->string('nomefantasia')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefones')->nullable();
            $table->string('sexo')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->enum('tipopessoa', ['Física', 'Jurídica']);
            $table->timestamps(); // Adiciona os campos 'created_at' e 'updated_at' para registrar timestamps
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sua_tabela2', function (Blueprint $table) {
            //
        });
    }
};
