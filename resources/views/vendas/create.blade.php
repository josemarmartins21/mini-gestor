@extends('layouts.main')

@section('title', 'Novo Produto')

@section('content')
<x-title-section>Novo Produto</x-title-section>

    <x-container>
        <x-form-container>
            @csrf

            <input-container>
                <label-input>Produto</label-input>
                <x-input-select>
                    <option value="">Selecione um produto</option>
                </x-input-select>
            </input-container>

            <x-input-container>
                <label-input>Quantidade</label-input>
                <x-input-text name="quantidade" id="quantidade" placeholder="Quantidade"/>
            </x-input-container>
   
            <x-form-button>
                Criar Produto
            </x-form-button>
        </x-form-container>
    </x-container>  
@endsection