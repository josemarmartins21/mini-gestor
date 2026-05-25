@extends('layouts.main')

@section('title', 'Novo Produto')

@section('content')
<x-title-section>Novo Produto</x-title-section>

    <x-container>
        <x-form-container 
            action="{{ route('produtos.store') }}"
            method="POST"
        >
            @csrf

  
            <x-input-container>
                <x-label-input for="nome">Nome</x-label-input>
                <x-input-text name="nome" id="nome" placeholder="Nome"/>
            </x-input-container>    

            <x-input-container>
                <x-label-input for="preco">Preço</x-label-input>
                <x-input-text name="preco" id="preco" placeholder="Preço"/>
            </x-input-container>

            <x-input-container>
                <x-label-input for="quantidade">Quantidade</x-label-input>
                <x-input-text name="quantidade" id="quantidade" placeholder="Quantidade"/>
            </x-input-container>
   
            <x-form-button>
                Criar Produto
            </x-form-button>
        </x-form-container>

        <x-error-form-message />

        <x-alert />
    </x-container>  
@endsection