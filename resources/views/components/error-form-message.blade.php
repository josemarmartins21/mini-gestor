@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class=" font-thin text-red-500 mt-1.5">{{ $error }}</p>
    @endforeach
@endif

