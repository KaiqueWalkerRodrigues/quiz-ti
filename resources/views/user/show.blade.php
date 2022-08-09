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
        <h3 class="text-light">{{$user->name}}</h3>
        <p class="text-light"><b class="text-success">{{$user->points}}</b> Pontos</p>
        <a href="{{ route('avatar.edit', ['id'=>Auth::user()->id]) }}" class="btn btn-primary">Alterar Avatar</a>
    </div> 

@endsection