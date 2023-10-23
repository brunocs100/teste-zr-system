@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{ route('cadastro.index') }}">Voltar</a>

                    Cadastro de clientes



                </div>



                <div class="card-body">

                    <form method="POST" name="formCadastro" action="{{ route('cadastro.store') }}">
                        @csrf
                        <input type="hidden" class="form-control" value='{{ $tipopessoa }}' id="tipopessoa" name="tipopessoa">

                        <div class="row comeca">


                            <div class="col-sm-12 col-md-6 col-lg-4  {{ !in_array('nome', $records['campos'])?'inactive':'' }}">

                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('razaosocial', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="nome">Razão Social</label>
                                    <input type="text" class="form-control" id="razaosocial" name="razaosocial">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('cpf', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('cnpj', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" class="form-control" id="cnpj" name="cnpj">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('email', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('apelido', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="apelido">Apelido</label>
                                    <input type="text" class="form-control" id="apelido" name="apelido">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('nomefantasia', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="nomefantasia">Nome Fantasia</label>
                                    <input type="text" class="form-control" id="nomefantasia" name="nomefantasia">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('data_nascimento', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('sexo', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 {{ !in_array('endereco', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="endereco">Endereço Completo</label>
                                    <textarea class="form-control" id="endereco" name="endereco"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 telefones {{ !in_array('telefones', $records['campos'])?'inactive':'' }}">
                                <div class="form-group">
                                    <label for="telefones">Telefone</label>
                                    <input type="text" class="form-control" id="telefones" name="telefones[]">
                                    <a href="javascript:void" class='form-control add-telefone'>+ Telefone</a>
                                </div>



                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<templete class='telefone' style='display: none;'>
    <div class="form-group">
        <label for="telefones">Telefone</label>
        <input type="text" class="form-control" id="telefones" name="telefones[]">
    </div>
</templete>
@endsection