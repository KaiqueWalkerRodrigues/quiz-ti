@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
        <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <div class="col-md-6 offset-md-3 mt-5">
            <br>
                <div class="alert alert-primary text-center">Seus Pontos: <b class="@if(Auth::user()->points < 1) text-danger @else text-success @endif">{{ Auth::user()->points }}</b></div>
            <br>
            <table class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th class="col-2">TOP</th>
                        <th class="col-1">Avatar</th>
                        <th class="col-4">Nome</th>
                        <th class="col-5">Pontos</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n = 1;
                    @endphp
                        <style>
                            .avatar{
                                height: 50px;
                            }
                        </style>
                        @foreach ($user as $u)
                        <tr>
                        <td>{{ $n }}°</td>
                        <td><img src="/avatares/{{ $u->avatar->avatar }}" class="avatar" alt="..."></td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->points }}</td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </div>

@endsection