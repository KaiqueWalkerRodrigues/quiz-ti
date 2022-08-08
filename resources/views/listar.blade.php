@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <a href="{{ route('create') }}" class="btn btn-dark">NOVO QUIZ</a>
            </div>

            <style>
                .card-title{
                    height: 100px;
                }
                .card-text{
                    height: 170px;
                }
            </style>
            @foreach ($categorias as $cat)
                <h3 class="mt-5">{{$cat->categoria}}</h3>
                @foreach ($quiz->where('id_categoria',$cat->id_categoria) as $q)
                <div class="col-md-4 mt-5 text-center">
                    <div class="card" style="width: 19rem; height: 26rem;" id="degrade-1">
                        <div class="card ms-4 mt-4" style="width: 16rem; height: 23rem; bg-white">
                        <div class="card-body">
                        <h5 class="card-title">{{ $q->titulo }}</h5>
                        <p class="card-text">{{ $q->descricao}}</p>
                        <div>
                        <footer>
                        @if(Auth::user()->id != $q->id_user or Auth::user()->id == 3)
                            <a href="{{ route('play', ['id'=>$q->id_quiz]) }}" class="btn btn-dark"><i class="bi bi-controller"></i></a>
                        @endif
                        @if(Auth::user()->id == $q->id_user or Auth::user()->id == 3)
                            <a href="{{ route('show', ['id'=>$q->id_quiz]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('edit', ['id'=>$q->id_quiz]) }}" class="btn btn-secondary"><i class="fa-solid fa-wrench"></i></a>
                            <a href="{{ route('destroy', ['id'=>$q->id_quiz]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        @endif
                        </footer>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    
        <br>
        <br>
        <br>
        <br>
        <br>
@endsection