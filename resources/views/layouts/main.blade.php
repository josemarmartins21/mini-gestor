<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mini Gestor')</title>

    {{-- TailwindCSS --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- TailwindCSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- HTMX --}}
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.10/dist/htmx.min.js" integrity="sha384-H5SrcfygHmAuTDZphMHqBJLc3FhssKjG7w/CeCpFReSfwBWDTKpkzPP8c+cLsK+V" crossorigin="anonymous"></script>

</head>
<body class="h-screen bg-zinc-100" >
    <header class="bg-blue-600 p-7.5 ">
        <menu class="w-8/10 mx-auto">
            <ul class="flex gap-10 justify-center text-2xl text-white font-bold">
                <li>
                    <a href="
                        {{ route('home') }}"
                         class="hover:text-yellow-300"
                     >
                        <i class="fa-solid fa-house" style="color: rgb(255, 255, 255);"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('produtos.index') }}" class="hover:text-yellow-300">
                        <i class="fa-brands fa-product-hunt" style="color: rgb(255, 255, 255);"></i>
                        Produtos
                    </a>
                </li>
                <li>
                    <a href="{{ route('vendas.index') }}" class="hover:text-yellow-300">
                        <i class="fa-solid fa-shopping-cart" style="color: rgb(255, 255, 255);"></i> Vendas
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:text-yellow-300">
                        <i class="fa-solid fa-chart-pie" style="color: rgb(255, 255, 255);"></i> Relatórios
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:text-yellow-300">
                        <i class="fa-solid fa-right-from-bracket"></i> Sair
                    </a>
                </li>
            </ul>
        </menu>
    </header>
            <main class="w-[1000px] m-auto  mb-50">
                @yield('content')
            </main> 
    <footer class="absolute bottom-0 w-full bg-gray-200 text-center p-4">
        <p>&copy; {{ date('Y') }} Mini Gestor. Todos os direitos reservados.</p>
    </footer>
</body>
</html>