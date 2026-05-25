@extends('layouts.main')

@section('title', 'Novo Produto')

@section('content')
<x-title-section>Novo Produto</x-title-section>

    <x-container>
        <x-form-container
            method="POST"
            action="{{ route('vendas.store') }}"
        >
            @csrf

            <input-container>
                <label-input>Produto</label-input>
                <x-input-select name="produto_id" id="produto_id">
                    <option value="">Selecione um produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </x-input-select>
            </input-container>

            <x-input-container>
                <label-input>Quantidade</label-input>
                <x-input-text name="quantidade" id="quantidade" placeholder="Quantidade"/>
            </x-input-container>
   
            <x-form-button>
                Criar Produto
            </x-form-button>

            <x-error-form-message />

            <x-alert />
        </x-form-container>
    </x-container>  
@endsection