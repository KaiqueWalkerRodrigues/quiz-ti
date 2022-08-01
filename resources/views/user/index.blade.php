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
                        <th>Nome</th>
                        <th>Pontos</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                            $n = 1;
                            @endphp
                        @foreach ($user as $u)
                        <tr>
                        <td>{{ $n }}</td>
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