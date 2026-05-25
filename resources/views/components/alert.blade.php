@if (session()->has('error'))
    <p class="text-red-600 font-thin">{{ $message }}</p>
@endif

@if (session()->has('success'))
    <p class="text-green-600 font-thin">{{ $message }}</p>
@endif
