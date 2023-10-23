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


                <form method="POST" action="{{ route('cadastro.campos') }}">


                    @csrf
                    <div class="card-body">
                        @if ($erros!=null)
                        <small style='color: red;'>ERRO: {{ $erros }}</small>
                        @endif

                        <h5>Selecione o tipo de pessoa para prosseguir:</h5>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="tipopessoa">Tipo de Pessoa</label>
                                    <select class="form-control" id="tipopessoa" name="tipopessoa">
                                        <option value="">Selecione</option>
                                        <option value="Física">Física</option>
                                        <option value="Jurídica">Jurídica</option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="row contem" style='display: none;'>
                            <div class="col-sm-12">
                                <h5>Selecione os campos desejados:</h5>
                                <div class='row campos'>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <button type="submit" class="btn btn-primary mb-2">Avancar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<templete class='campos' style='display: none;'>
    <div class="col-md-4  pessoa-fisica">
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="nome" id="checkbox-nome">
            <label class="form-check-label" for="checkbox-nome">Nome</label>
        </div>


        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="apelido" id="checkbox-apelido">
            <label class="form-check-label" for="checkbox-apelido">Apelido</label>
        </div>


        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="cpf" id="checkbox-cpf">
            <label class="form-check-label" for="checkbox-cpf">CPF</label>
        </div>
    </div>

    <div class="col-md-4 pessoa-juridica">
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="cnpj" id="checkbox-cnpj">
            <label class="form-check-label" for="checkbox-cnpj">CNPJ</label>
        </div>


        <div class="form-check ">
            <input class="form-check-input" name='campos[]' type="checkbox" value="nomefantasia" id="checkbox-nomefantasia">
            <label class="form-check-label" for="checkbox-nomefantasia">Nome Fantasia</label>
        </div>

        <div class="form-check ">
            <input class="form-check-input" name='campos[]' type="checkbox" value="razaosocial" id="checkbox-razaosocial">
            <label class="form-check-label" for="checkbox-razaosocial">Razão Social</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="sexo" id="checkbox-sexo">
            <label class="form-check-label" for="checkbox-sexo">Sexo</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="email" id="checkbox-email">
            <label class="form-check-label" for="checkbox-email">Email</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="telefones" id="checkbox-telefones">
            <label class="form-check-label" for="checkbox-telefones">Telefones</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="datanascimento" id="checkbox-datanascimento">
            <label class="form-check-label" for="checkbox-datanascimento">Data de Nascimento</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name='campos[]' type="checkbox" value="endereco" id="checkbox-endereco">
            <label class="form-check-label" for="checkbox-endereco">Endereço</label>
        </div>
    </div>
</templete>
@endsection