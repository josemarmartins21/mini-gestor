@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <x-title-section>Produtos</x-title-section>
    <x-container>
        <x-table-container>
            <thead class="bg-cyan-700 text-white p-5 text-xl">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Qtd</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <x-table-body class="[&_td]:py-2">
                @foreach ($produtos as $produto)
                    <tr class="p-2">
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>

                            <x-btn-edit :route="route('produtos.edit', ['produto' => $produto->id])" />

                            <x-form-container 
                                hx-post="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" 
                                class="inline" 
                                hx-target="#message"
                                
                            >
                                @csrf

                                @method('DELETE')

                                <x-btn-delete />
                            </x-form-container>
                        </td>
                    </tr>
                @endforeach
            </x-table-body>
        </x-table-container>
        <div id="message"></div>
    <x-btn-float href="{{ route('produtos.create') }}" />
</x-container>
@endsection