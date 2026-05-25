@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <x-title-section>Produtos</x-title-section>
    <x-container>
        <table class="w-full text-center rounded-tl-2xl rounded-tr-2xl overflow-hidden">
            <thead class="bg-cyan-700 text-white p-5 text-xl">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Qtd</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-zinc-600">
                @foreach ($produtos as $produto)
                    <tr class="p-2">
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->qtd }}</td>
                        <td>
                            <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}" class="text-blue-500 hover:text-blue-700">
                                Editar
                            </a>
                            <x-form-container 
                                hx-post="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" 
                                class="inline" 
                                hx-target="#message"
                                onclick="return confirm('Tem a certeza que deseja eliminar?')"
                            >
                                @csrf

                                @method('DELETE')

                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                    Excluir
                                </button>
                            </x-form-container>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="message"></div>
    <x-btn-float href="{{ route('produtos.create') }}" />
</x-container>
@endsection