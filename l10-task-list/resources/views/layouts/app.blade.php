<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 10 Task List App</title>
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
           .btn{
            @apply rounded-md px-2 py-1 text-center text-slate-700  font-medium shadow-sm ring-1 ring-slate-300 hover:bg-slate-50 
           }
           .link {
            @apply font-medium decoration-pink-500 underline text-gray-700
           }
           label {
            @apply block uppercase text-slate-700
           }
           input,textarea {
            @apply shadow-sm appearance-none border w-full py-2 leading-tight focus:outline-none
           }

           .error {
            @apply text-red-500 text-sm
           }
        </style>
        {{-- blade-formatter-enable --}}
       
    </head>
    <body class="container mx-auto mt-10 mb-10 max-w-lg">
      
        <h1 class="mb-4 text-2xl">@yield('title')</h1>
        <div class="mb-10 font-bold">This is a flash message <div>
        <!-- <div>{{ session('success')}}</div> -->
        <!-- @if (session()->has('success'))
            <div>{{ session('success')}}</div>
        @endif -->
        <div>
            @yield('content')
        </div>
    </body>
</html>