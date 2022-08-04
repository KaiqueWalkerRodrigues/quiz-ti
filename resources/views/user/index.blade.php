@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
        <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <div class="col-md-6 offset-md-3 mt-5   ">
            <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Nome</th>
                        <th>Pontos</th>
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
                        <td>{{ $n }}</td>
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
    </div>

@endsection