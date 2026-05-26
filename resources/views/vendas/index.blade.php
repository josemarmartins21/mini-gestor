@use('Carbon\Carbon')
@extends('layouts.main')

@section('title', 'Vendas')

@section('content')
    <x-title-section>Vendas</x-title-section>
    <x-container>
        <x-table-container>
            <thead class="bg-cyan-700 text-white p-5 text-xl">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço Uni.</th>
                    <th>Preço Total</th>
                    <th>Qtd</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <x-table-body class="[&_td]:py-2.5">
                @foreach ($vendas as $venda) 
                    <tr class="py-5">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $venda->nome }}</td>
                        <td>{{ $venda->preco_unitario }}</td>
                        <td>{{ $venda->preco_total }}</td>
                        <td>{{ $venda->quantidade }}</td>
                        <td>{{ Carbon::parse($venda->date_time)->diffForHumans() }}</td>
                        <td>
                            <x-btn-edit :route="'#'" />
                            <form class="inline" method="POST" action="{{ route('vendas.destroy', $venda->id) }}">
                                @csrf
                                @method('DELETE')
                                <x-btn-delete />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table-body>
        </x-table-container>

    <x-btn-float href="{{ route('vendas.create') }}" />
</x-container>
@endsection