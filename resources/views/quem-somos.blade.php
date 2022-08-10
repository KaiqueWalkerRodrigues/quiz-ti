@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

    <br>

    <h2 class="text-light text-center">Quiz Desenvolvido by:</h2>

    <br>
    <style>
        #photo {
            margin-left: 30%;
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>
    <div class="row">
        <div class="col-md-3 offset-md-2">
            <div class="card text-center" style="width: 18rem;">
                <img src="avatares/avatar7.png" id="photo" width="100" height="100" alt="...">
                <div class="card-body">
                <h5 class="card-title">Kaique Rodrigues</h5>
                <p class="card-text">Developer Back End</p>
                <a href="https://www.linkedin.com/in/kaique-rodrigues-856609235/" target="_blank" class="btn btn-outline-info">LinkedIn</a>
                <a href="https://github.com/KaiqueWalkerRodrigues" target="_blank" class="btn btn-secondary">GitHub</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="width: 18rem;">
                <img src="avatares/avatar17.png"  id="photo" width="100" height="100" alt="...">
                <div class="card-body">
                <h5 class="card-title">Pedro Oliveira</h5>
                <p class="card-text">Web Designer</p>
                <a href="https://www.linkedin.com/in/pedro-oliveira-12a851235/" target="_blank" class="btn btn-outline-info">LinkedIn</a>
                <a href="https://github.com/PedrodOliveira" target="_blank" class="btn btn-secondary">GitHub</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="width: 18rem;">
                <img src="avatares/avatar9.png" id="photo" width="100" height="100" alt="...">
                <div class="card-body">
                <h5 class="card-title">Richard Camargo</h5>
                <p class="card-text">Web Designer</p>
                <a href="http://pudim.com.br/" target="_blank" class="btn btn-outline-info text-decoration-line-through">LinkedIn</a>
                <a href="https://github.com/RichardCSNZ" target="_blank" class="btn btn-secondary">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <h5 class="text-light">->( Kaique Rodrigues -> <a href="" class="text-warning"><strong>LinkedIn</strong></a> )</h5>
    <h5 class="text-light">->( Pedro Oliveira -> <a href="" class="text-warning"><strong>LinkedIn</strong></a> )</h5>
    <h5 class="text-light">->( Richard Camargo -> <a href="" class="text-warning"><strong>LinkedIn</strong></a> )</h5> --}}

    <br>
    {{-- <h5 class="text-warning"> Tempo de Projeto: 2 Semanas</h5> --}}

@endsection