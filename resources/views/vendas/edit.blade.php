@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<x-title-section>Editar Venda</x-title-section>

    <x-container>
        <x-form-container>
            @csrf
  
            <x-input-container>
                <x-label-input for="nome">Nome</x-label-input>
                <x-input-text placeholder="Nome" name="name" id="nome" value="{{ old('nome', $venda->nome) }}" />
            </x-input-container>

            <x-input-container>
                <x-label-input for="preco_unitario">Preço</x-label-input>
                <x-input-text placeholder="Preço" name="price" id="preco_unitario" value="{{ old('preco_unitario', $venda->preco_unitario) }}" />
            </x-input-container>
   
            <x-form-button>
                Atualizar Venda
            </x-form-button>

            <x-error-form-message />

            <x-alert />
        </x-form-container>
    </x-container>  
@endsection