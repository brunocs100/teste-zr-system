<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClienteTelefone extends Model
{
    protected $table = 'clientetelefone';
    protected $fillable = [
        'cliente_id',
        'telefone'
    ];
}
