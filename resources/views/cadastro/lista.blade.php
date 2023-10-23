@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{ route('cadastro.index') }}">Voltar</a>

                <div class="card-header">Listagem de clientes</div>

                <div class="card-body">



                    <form class="form-control" method='POST'>

                        @csrf
                        <div class="row">
                            <div class="col">
                                <select class="form-control" id="filtro" name="filtro" required>
                                    <option value="">Selecione o tipo de filtro</option>
                                    <option {{ request()->has('filtro') && request()->get('filtro') == 'contem' ? 'selected' : '' }} value="contem">Contém</option>
                                    <option {{ request()->has('filtro') && request()->get('filtro') == 'comeca' ? 'selected' : '' }} value="comeca">Começa</option>
                                    <option {{ request()->has('filtro') && request()->get('filtro') == 'finaliza' ? 'selected' : '' }} value="finaliza">Finaliza</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name='busca' placeholder="Digite aqui">


                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="container">
                <h1>Listagem de Clientes</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome/Razão Social</th>
                            <th>Email</th>
                            <th>Telefones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            @if ($cliente->tipopessoa == 'Física' )
                            <td>{{ $cliente->nome }}</td>
                            @else
                            <td>{{ $cliente->razaosocial }}</td>
                            @endif
                            <td>{{ $cliente->email }}</td>
                            <td>
                                @if ($cliente->telefones!= null)
                                @foreach($cliente->telefones as $telefone)

                                <p>{{ $telefone->telefone }}</p>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection