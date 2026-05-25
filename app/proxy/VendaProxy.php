<?php

namespace App\proxy;

use App\Models\HistoricoVenda;
use App\Models\Produto;
use App\services\contracts\VendaInterface;
use App\services\VendaService;

class VendaProxy implements VendaInterface 
{
    public function __construct(
        private VendaService $venda,
    )
    {
        
    }
    public function create($data = []): void
    {
        $produto = Produto::select('preco')
        ->where(
            'id', 
            $data['produto_id']
        )->first();

        $data['historico_venda'] = HistoricoVenda::create([
            'produto_id' => $data['produto_id'],
            'quantidade' => $data['quantidade'],
            'preco_unitario' => $produto->preco,
        ]);

        $this->venda->create($data);
    }
}