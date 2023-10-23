<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteTelefone;

class CadastroController extends Controller
{


    public function index()
    {
        return view('index');
    }


    public function campos(Request $request)
    {
        $records = $request->all();
        if (!isset($records['campos'])) {
            return view('cadastro.index', ['erros' => 'Selecione pelo menos um campo para prosseguir']);
        } else {
            return view(
                'cadastro.finalizar',
                [
                    'records' => $records,
                    'tipopessoa' => $records['tipopessoa'],
                    'erros' => null
                ]
            );
        }
    }



    public function lista(Request $request)
    {
        $clientes = Cliente::getAll();

        $busca = $request->input("busca");
        $filtro = $request->input("filtro");


        if ($busca != '') {
            $clientes = array_filter($clientes, function ($cadastro) use ($busca, $filtro) {

                $nome = strtolower($cadastro['nome']);
                $busca = strtolower($busca);




                if ($filtro == 'comeca' and str_starts_with($nome, $busca)) {
                    return true;
                }
                if ($filtro == 'contem' and stripos($nome, $busca) !== false) {
                    return true;
                }
                if ($filtro == 'finaliza' and str_ends_with($nome, $busca)) {
                    return true;
                }
            });
        }

        return view('cadastro.lista', [
            'clientes' => $clientes,
        ]);
    }


    public function cadastro()
    {
        return view('cadastro.index', ['erros' => null]);
    }


    public function store(Request $request)
    {

        try {

            $cliente = new Cliente;
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->cnpj = $request->input('cnpj');
            $cliente->apelido = $request->input('apelido');
            $cliente->razaosocial = $request->input('razaosocial');
            $cliente->sexo = $request->input('sexo');
            $cliente->tipopessoa = $request->input('tipopessoa');
            $cliente->nomefantasia = $request->input('nomefantasia');
            $cliente->tipopessoa = $request->input('tipopessoa');
            $cliente->endereco = $request->input('endereco');
            $cliente->data_nascimento = $request->input('data_nascimento');
            $cliente->save();

            $telefones = $request->input('telefones', null);

            if ($telefones != null) {
                foreach ($telefones as $telefone) {
                    $clientetelefone = new ClienteTelefone();
                    $clientetelefone->cliente_id = $cliente->id;
                    $clientetelefone->telefone = $telefone;
                    $clientetelefone->save();
                }
            }

            $json = json_encode($cliente);

            return response()->json(
                [
                    'success' => true,
                    'msg' => 'Cadastro salvo com sucesso!',
                    "json" => $json
                ],
                200
            );
        } catch (\Illuminate\Database\QueryException $ex) {
            var_dump($ex->getMessage());
            exit();
        }
    }
}
