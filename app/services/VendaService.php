<?php

namespace App\services;

use App\Models\Venda;
use App\services\contracts\VendaCrud;
use App\services\contracts\VendaInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class VendaService implements VendaInterface, VendaCrud 
{
    public function create($data = []): void
    {
        $historicoVenda = $data['historico_venda'];

        $venda = Venda::select('id')->orderByDesc('id')
        ->first();

        $historicoVenda->update([
            'venda_id' => $venda->id,
        ]);
    }

    public function list(): LengthAwarePaginator
    {
        $vendas = DB::table('produtos')
            ->join(
                'historico_vendas', 
                'produtos.id', '=', 'historico_vendas.produto_id'
            )
            ->join(
                'vendas', 
                'vendas.id', '=', 'historico_vendas.venda_id'
            )
            ->select(
                'produtos.nome',
                'vendas.id',
                'historico_vendas.quantidade',    
                'vendas.preco_total', 
                'vendas.date_time',   
                'historico_vendas.preco_unitario',   
            )
            ->paginate(10);

        return $vendas;
    }
}
