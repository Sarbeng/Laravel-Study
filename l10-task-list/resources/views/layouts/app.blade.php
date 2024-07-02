<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
@applyrounded-md px-2 py-1 text-center text-slate-700  font-medium shadow-sm ring-1 ring-slate-300 hover:bg-slate-50
           }
           .link {
@applyfont-medium decoration-pink-500 underline text-gray-700
           }
           label {
@applyblock uppercase text-slate-700
           }
           input,textarea {
@applyshadow-sm appearance-none border w-full py-2 leading-tight focus:outline-none
           }

           .error {
@applytext-red-500 text-sm
           }
        </style>
    {{-- blade-formatter-enable --}}

</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">

    <h1 class="mb-4 text-2xl">@yield('title')</h1>

    <!-- <div>{{ session('success') }}</div> -->
    <!-- @if (session()->has('success'))
            <div>{{ session('success') }}</div>
@endif-->

    @if (session()->has('success'))
    <div x-data="{flash : true }">
        <h2 role="alert" x-show="flash"
            class="relative mb-10 border border-green-400 bg-green-100 px-4 py-3 text-green-900 rounded text-lg">
            <strong class="font-bold">Success!</strong>
           <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </h2>
    </div>
    @endif
    <div>
        @yield('content')
    </div>
</body>

</html>