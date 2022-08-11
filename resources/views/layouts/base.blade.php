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
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    {{-- Local --}}
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="container" id="page-top">
        <div class="row">

            <nav id="menu" class="navbar">
                <div class="container-fluid">
                    <a id="name-site" class="navbar-brand" href="{{ route('index')}}"><img src="../../img/LOGO.png" alt="" width="40" height="40" class="d-inline-block align-text-top">QUIZ-T.I</a>
                        <a href="#menu-toggle" class="btn btn-outline-info" id="menu-toggle"><i id="icon" class="fa-solid fa-arrow-right"></i></a>
        <style>
            #pesquisa{
                margin-left: 550px;
            }
            #search{
                margin-left:100px !important; 
            }
            .user{
                margin-right: 25px;
                margin-left: 200px;
            }
            .avatar{
                height: 25px;
            }
            .ola{
                float: left;
                margin-top: 8px;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
        </style>

        <form action="{{ route('pesquisa') }}" method="POST">
            @csrf
            {{-- <div class="pesquisa"> --}}
                <input class="form-control me-2" type="search" placeholder="Pesquisar por nome de Quiz" id="search" name="search">
                <button class="btn btn-outline-info" type="submit" id="pesquisa"><i class="bi bi-search"></i></button>
            {{-- </div> --}}
        </form>

        <div class="dropdown">
            <button class="btn btn-outline-info dropdown-toggle user" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('user.show',['id'=>Auth::user()->id]) }}">Meu Perfil</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        </div>
      </nav>
    
    

  
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

            <br>
            <li>
                <p class="text-light d-none ml-3 mt-3" id="tab">Olá, <b class="text-decoration-underline">{{ Auth::user()->name }}</b>!</p>
            </li>
            <li>
                <a href="{{ route('index') }}"><i class="bi bi-controller"></i><span>Quiz</span></a>
            </li>
            <li>
                <a href="{{ route('lista') }}"><i class="fa-solid fa-c"></i><span>Categorias</span></a>
            </li>
            <li>
                <a href="{{ route('user.index') }}"><i class="fa-solid fa-crown"></i><span>Rank</span></a>
            </li>
            <li>
                <a href="{{ route('quem-somos') }}"><i class="bi bi-people-fill"></i><span>Quem Somos</span></a>
            </li>

            @if(Auth::user()->id == 3)
            {
                <li>
                    <a href="{{ route('categorias.index') }}"><i class="fa-solid fa-c"></i><span>Categorias ADM</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-door-open"></i><span>Logout</span></a>
                </li>
            }
            @endif
            
        </ul>
    </div>
    <!-- /sidebar-->
         {{-- CONTEUDO --}}
         <br>
         <br>
         <br>
         <br>
         @yield('conteudo')
         <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
         {{-- /CONTEUDO --}}
    </div>
</div>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>
{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Menu Toggle Script -->
<script>
    var aberto = false;
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        if( aberto == false)
        {
            $("#sidebar-wrapper ").css("margin-left","250px");
            $("#menu-toggle").css ("left", "10%");
            $("#icon").removeClass("fa-solid fa-arrow-right");
            $("#icon").addClass("fa-solid fa-arrow-left");
            $("#wrapper ").css("padding-left","250px");
            $(".sidebar-nav li span").css("display", "inline-block");
            $(".sidebar-nav li").css("margin-left", "0px");
            $(".sidebar-nav li").css("text-align", "left");
            $("#tab").removeClass("d-none");
            aberto = true;
        }
        else
        {
            $("#sidebar-wrapper ").css("margin-left","5%");
            $("#menu-toggle").css ("left", "4px");
            $("#icon").removeClass("fa-solid fa-arrow-left");
            $("#icon").addClass("fa-solid fa-arrow-right");
            $("#wrapper ").css("padding-left","60px");
            $(".sidebar-nav li span").css("display", "none");
            $(".sidebar-nav li").css("margin-right", "30px");
            $(".sidebar-nav li").css("text-align", "right");
            $("#tab").addClass("d-none");
            aberto = false;
        }
    });
    </script>
@yield('script')
{{-- /JS --}}
</body>
</html>