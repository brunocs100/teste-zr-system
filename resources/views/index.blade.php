@extends('layouts.app')


@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1>Bem-vindo!</h1>
            <p>Escolha uma das opções abaixo:</p>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="{{ route('cadastro.lista') }}" class="btn btn-primary btn-block">Listagem de Clientes</a>
        </div>
        <div class="col-sm-6 col-md-2">
            <a href="{{ route('cadastro.cadastro') }}" class="btn btn-success btn-block">Cadastro de Clientes</a>
        </div>
    </div>
</div>
@endsection