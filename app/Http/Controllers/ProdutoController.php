<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('products.index');
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(ProdutoRequest $request)
    {   
        try {

            $validated = $request->validated();

            Produto::create($validated);
            
            if ($request->header('HX-Request')) {
                return response('', 200)
                    ->header('HX-Redirect', route('products.index'));
            }

            return redirect()->route('products.index');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro ao criar produto.');
        }
    }

    public function edit($id)
    {
        return view('products.edit', compact('id'));
    }

}
