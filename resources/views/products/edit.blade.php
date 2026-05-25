@extends('layouts.main')

@section('title', 'Editar ' . $produto->nome)

@section('content')
<x-title-section>Editar Produto</x-title-section>

    <x-container>
        <x-form-container
            method="POST"
            action="{{ route('produtos.update', ['produto' => $produto->id]) }}"
        >

            @csrf
            
            @method('PUT')
            
            <input-container>
                <label-input>Nome</label-input>
                <x-input-text name="nome" id="nome" value="{{ old('nome', $produto->nome) }}" />
            </input-container>

            <x-input-container>
                <label-input>Preço</label-input>
                <x-input-text name="preco" id="preco" value="{{ old('preco', $produto->preco) }}" />
            </x-input-container>
   
            <x-form-button>
                Atualizar Produto
            </x-form-button>
            
            <div id="message"></div>
        </x-form-container>

        <x-error-form-message />
        
        <x-alert />
    </x-container>  
@endsection