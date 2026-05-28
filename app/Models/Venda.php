<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HistoricoVenda;

class Venda extends Model
{
    protected $fillable = [
        'date_time',
        'preco_total',
    ];

    public function historicoVendas()
    {
        return $this->hasOne(HistoricoVenda::class);
    }
}
