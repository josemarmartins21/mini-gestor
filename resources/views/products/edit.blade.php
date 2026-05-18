@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<x-title-section>Editar Produto</x-title-section>

    <x-container>
        <x-form-container>
            @csrf
  
            <input-container>
                <label-input>Nome</label-input>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </input-container>

            <x-input-container>
                <label-input>Preço</label-input>
                <input type="number" name="price" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </x-input-container>
   
            <x-form-button>
                Atualizar Produto
            </x-form-button>
        </x-form-container>
    </x-container>  
@endsection