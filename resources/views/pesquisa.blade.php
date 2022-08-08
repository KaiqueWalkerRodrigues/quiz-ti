@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')
        <div class="row">

            <style>
                .card-title{
                    height: 100px;
                }
                .card-text{
                    height: 170px;
                }
            </style>
            @foreach ($quiz as $q)
            <div class="col-md-3 mt-5 text-center">
                <div class="card" style="width: 19rem; height: 26rem;" id="degrade-1">
                    <div class="card ms-4 mt-4" style="width: 16rem; height: 23rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $q->titulo }}</h5>
                      <p class="card-text">{{ $q->descricao}}</p>
                     <a href="{{ route('play', ['id'=>$q->id_quiz]) }}" class="btn btn-dark rounded-circle"><i class="bi bi-controller"></i></a>
                    @if(Auth::user()->id == $q->id_user or Auth::user()->id == 3)
                        <a href="{{ route('show', ['id'=>$q->id_quiz]) }}" class="btn btn-primary rounded-circle"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('edit', ['id'=>$q->id_quiz]) }}" class="btn btn-secondary rounded-circle"><i class="fa-solid fa-wrench"></i></a>
                        <a href="{{ route('destroy', ['id'=>$q->id_quiz]) }}" class="btn btn-danger rounded-circle"><i class="fa-solid fa-trash-can"></i></a>
                    @endif
                    </div>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    
@endsection