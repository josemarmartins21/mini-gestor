@if (session()->has('error'))
    <p class="text-red-600 font-thin">{{ session('error') }}</p>
@endif

@if (session()->has('success'))
    <p class="text-green-600 font-thin">{{ session('success') }}</p>
@endif
