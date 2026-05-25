<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();  
        return view('products.index', compact('produtos'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {   
        try {

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:50',
                'preco' => 'required|numeric|min:50',
                'quantidade' => 'required|integer|min:0',
            ], [
                'nome.required' => 'O :attribute é obrigatório.',
                'nome.string' => 'O :attribute deve ser uma string.',
                'nome.max' => 'O :attribute não pode ter mais de :max caracteres.',
                'preco.required' => 'O :attribute é obrigatório.',
                'preco.numeric' => 'O :attribute deve ser numérico.',
                'preco.min' => 'O :attribute deve ser no mínimo 0.',
                'quantidade.required' => 'A :attribute é obrigatória.',
                'quantidade.integer' => 'A :attribute deve ser um número inteiro.',
                'quantidade.min' => 'A :attribute deve ser no mínimo 0.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validator->errors());
            }

            Produto::create($validator->validated());
            
            return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit(Produto $produto)
    {
        return view('products.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {

        
        try {

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:50',
                'preco' => 'required|numeric|min:50',
            ], [
                'nome.required' => 'O :attribute é obrigatório.',
                'nome.string' => 'O :attribute deve ser uma string.',
                'nome.max' => 'O :attribute não pode ter mais de :max caracteres.',
                'preco.required' => 'O :attribute é obrigatório.',
                'preco.numeric' => 'O :attribute deve ser numérico.',
                'preco.min' => 'O :attribute deve ser no mínimo 0.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validator->errors());
            }

            $validated = $validator->validated();

            $produto->update([
                'nome' => $validated['nome'],
                'preco' => $validated['preco']
            ]);

            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Produto $produto)
    {
        try {
            $produto->delete();

            return view('components.success', ['message' => 'Produto eliminado com sucesso!']);

        } catch (\Throwable $th) {
            return view('components.error', ['message' => $th->getMessage()]);
        }
    }

}
