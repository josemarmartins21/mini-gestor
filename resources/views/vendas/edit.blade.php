@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<x-title-section>Editar Venda</x-title-section>

    <x-container>
        <x-form-container>
            @csrf
  
            <input-container>
                <label-input>Nome</label-input>
                <x-input-text placeholder="Nome" name="name" id="name" />
            </input-container>

            <x-input-container>
                <label-input>Preço</label-input>
                <x-input-text placeholder="Preço" name="price" id="price" />
            </x-input-container>
   
            <x-form-button>
                Atualizar Venda
            </x-form-button>
        </x-form-container>
    </x-container>  
@endsection