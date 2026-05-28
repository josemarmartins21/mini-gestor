<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaRequest;
use App\Models\HistoricoVenda;
use App\Models\Produto;
use App\Models\Venda;
use App\services\contracts\VendaCrud;
use App\services\contracts\VendaInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendaController extends Controller
{

    public function __construct(
        private VendaInterface $vendaProxy,
        private VendaCrud $venda,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd($this->venda->list());
        
        return view('vendas.index', [
            'vendas' => $this->venda->list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::select(
            'id', 
            'nome',
        )->orderBy('nome')
        ->get();
        
        return view('vendas.create', compact('produtos'));
    }

    public function store(VendaRequest $request)
    {
        try {
            $validated = $request->validated();
    
            $this->vendaProxy->create($validated);
    
            return redirect()->route('vendas.index');

        } catch (\InvalidArgumentException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());  
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        return view('vendas.edit', compact('venda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'price' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $validated = $validator->validated();

            $venda->update([
                'nome' => $validated['name'],
                'preco_unitario' => $validated['price'],
            ]);

            return redirect()->route('vendas.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        try {
            $venda->historicoVendas->delete();
            $venda->delete();

            return redirect()->route('vendas.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
