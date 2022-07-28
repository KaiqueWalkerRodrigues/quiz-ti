<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Turma 90') }}</title>
    {{-- CSS --}}
    <!-- LOCAL -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- BOOSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- /CSS --}}
</head>
<body>

    <div class="container mt-3">
        {{-- MENU --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    {{ Auth::user()->name }}
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('produto.index') }}" class="text-decoration-none">Produtos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lista.index') }}" class="text-decoration-none">Listas de Compras</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('sair') }}" class="text-decoration-none text-danger">Sair</a>
                </li>
                @yield('menu')
            </ol>
        </nav>
        <hr>
        {{-- /MENU --}} 
         {{-- CONTEUDO --}}
         @yield('conteudo')
         {{-- /CONTEUDO --}}
    </div>


{{-- JS --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('script')
{{-- /JS --}}
</body>