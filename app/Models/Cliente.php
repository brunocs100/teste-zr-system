<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{
    protected $telefones = [];
    protected $table = 'cliente';
    protected $fillable = [
        'id',
        'nome',
        'email',
        'cpf',
        'cnpj',
        'apelido',
        'razaosocial',
        'sexo',
        'tipopessoa',
        'nomefantasia',
        'data_nascimento',
        'sexo',
        'endereco'
    ];

    public static function getAll()
    {
        //$rows = Cliente::all();
        $rows = Cliente::orderBy('id', 'desc')->get();
        $rows = $rows->toArray();
        //var_dump($rows);
        //exit();
        $records = array();
        foreach ($rows as $row) {
            $row = (object)$row;
            $row->telefones = array();
            $records[$row->id] = $row;
        }


        if (!empty($records)) {
            $ids = array_keys($records);

            $clientestelefone = ClienteTelefone::whereIn('cliente_id', $ids)
                ->get();

            //var_dump($ids);
            //var_dump($clientestelefone);
            //exit();
            foreach ($clientestelefone as $telefone) {

                ///var_dump($records[$telefone->cliente_id]);
                //exit();
                $records[$telefone->cliente_id]->telefones[] = $telefone;
            }
        }

        return $records;
    }
}
