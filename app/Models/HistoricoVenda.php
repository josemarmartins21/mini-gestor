<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;

class HistoricoVenda extends Model
{
    protected $table = 'historico_vendas';
    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'preco_unitario',

    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }
}
