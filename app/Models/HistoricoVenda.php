<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoVenda extends Model
{
    protected $table = 'historico_vendas';
    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'preco_unitario',

    ];
}
