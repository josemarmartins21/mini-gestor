<?php

namespace App\services;

use App\Models\Venda;
use App\services\contracts\VendaInterface;

class VendaService implements VendaInterface
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
}
