@extends('layouts.main')

@section('title', 'Vendas')

@section('content')
    <x-title-section>Vendas</x-title-section>
    <x-container>
        <table class="w-full text-center rounded-tl-2xl rounded-tr-2xl overflow-hidden">
            <thead class="bg-cyan-700 text-white p-5 text-xl">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-zinc-600">
                <tr class="p-2">
                    <td>1</td>
                    <td>Produto 1</td>
                    <td>R$ 10,00</td>
                    <td>
                        <a href="#" class="text-blue-500 hover:text-blue-700">Editar</a>
                        <a href="#" class="text-red-500 hover:text-red-700 ml-2">Excluir</a>
                    </td>
                </tr>
                <tr class="p-2">
                    <td>1</td>
                    <td>Produto 1</td>
                    <td>R$ 10,00</td>
                    <td>
                        <a href="#" class="text-blue-500 hover:text-blue-700">Editar</a>
                        <a href="#" class="text-red-500 hover:text-red-700 ml-2">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>

    <x-btn-float href="{{ route('vendas.create') }}" />
</x-container>
@endsection