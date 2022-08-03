<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- BOOSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- /CSS --}}
    {{-- Local --}}
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="container mt-3">
        {{-- <div > --}}
    <nav id="menu" class="navbar">
        <div class="container-fluid">
            <a id="name-site" class="navbar-brand">
                <img src="../img/LOGO.png" alt="" width="49" height="35" class="d-inline-block align-text-top">
                </i></a>
            <a href="#menu-toggle" class="btn btn-info" id="menu-toggle"> <i class="fa-solid fa-arrow-right"></i>

            </a>
          <form id="search" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Search">
            <button class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i></button>
            <div class="dropdown">
                <button class="btn btn-info mr-2 ml-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('user.index') }}">{{ Auth::user()->name }}</a></li>
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
          </form>
        </div>
      </nav>
  {{-- </div> --}}
  
  <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            {{-- <li class="sidebar-brand">
                <a href="#">
                  <img src="..." alt="" width="30" height="24" class="d-inline-block align-text-top">
                  <i class="fa-solid fa-bars"></i> <span> Menu </span> 
                </a>
            </li> --}}

            @if(Auth::user()->id == 3)
            {
                <li>
                    <a href="{{ route('index') }}"><i class="fa-solid fa-question"></i></i><span>Quiz</span></a>
                </li>
                <li>
                    <a href="{{ route('categorias.index') }}"><i class="fa-solid fa-c"></i><span>Categorias</span></a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"><i class="fa-solid fa-crown"></i><span>Rank</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-door-open"></i><span>Logout</span></a>
                </li>
            }
            <br>
            @endif
            <li>
                <a href="#"><i class="fa-solid fa-border-all"></i><span> Todos os temas</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-microchip"></i> <span>hardware </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-network-wired"></i><span> Redes </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-brands fa-ubuntu"></i><span> Sistemas </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-rotate-right"></i><span> Outros </span></a>
            </li>
        </ul>
    </div>
    <!-- /sidebar-->
         {{-- CONTEUDO --}}
         <br>
         <br>
         @yield('conteudo')
         {{-- /CONTEUDO --}}
    </div>


{{-- JS --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Menu Toggle Script -->
<script>
    var aberto = false;
    $("#menu-toggle").click(function(e) {
        e.preventDefault();

        if( aberto == false)
        {
            $("#sidebar-wrapper ").css("margin-left","250px");
            $("#menu-toggle").css ("left", "14%");
            $("#wrapper ").css("padding-left","250px");
            $(".sidebar-nav li span").css("display", "inline-block");
            $(".sidebar-nav li").css("margin-left", "0px");
            $(".sidebar-nav li").css("text-align", "left");
            aberto = true;
        }
        else
        {
            $("#sidebar-wrapper ").css("margin-left","5%");
            $("#menu-toggle").css ("left", "3.5%");
            // $(".sidebar-nav li").css("margin-right", "100%");
            $("#wrapper ").css("padding-left","60px");
            // $("#page-content-wrapper").css("margin-left", "2%");
            $(".sidebar-nav li span").css("display", "none");
            $(".sidebar-nav li").css("margin-right", "30px");
            $(".sidebar-nav li").css("text-align", "right");
            
            aberto = false;
        }
        
        

    });
    </script>
@yield('script')
{{-- /JS --}}
</body>