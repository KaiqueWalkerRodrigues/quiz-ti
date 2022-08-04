@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
        <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br>
        <br>
        <img src="/avatares/{{ $avatar->avatar }}" alt="">
        <br>
        <h3>{{$user->name}}</h3>
        <p><b class="text-success">{{$user->points}}</b> Pontos</p>
    </div>

@endsection