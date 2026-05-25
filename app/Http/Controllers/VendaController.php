<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaRequest;
use App\Models\Produto;
use App\Models\Venda;
use App\services\contracts\VendaInterface;
use Illuminate\Http\Request;

class VendaController extends Controller
{

    public function __construct(
        private VendaInterface $vendaProxy,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendas.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
