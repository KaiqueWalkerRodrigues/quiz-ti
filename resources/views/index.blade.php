@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')
        <div class="row">
            <a href="{{ route('create') }}" class="btn btn-outline-dark">+</a>
            @foreach ($quiz as $q)
            <div class="col-md-3 mt-5 text-center">
                <div class="card" style="width: 20rem; height: 30rem;" id="degrade-1">
                    <div class="card-body">
                      <h5 class="card-title">{{ $q->titulo }}</h5>
                      <p class="card-text">{{ $q->descricao}}</p>
                      <div>
                      <footer>
                      <a href="{{ route('play', ['id'=>$q->id_quiz]) }}" class="btn btn-dark"><i class="bi bi-controller"></i></a>
                      <a href="{{ route('show', ['id'=>$q->id_quiz]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('edit', ['id'=>$q->id_quiz]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('destroy', ['id'=>$q->id_quiz]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </footer>
                    </div>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    
@endsection

{{-- <br>    
        <a href="{{ route('create') }}" class="btn btn-outline-dark">+</a> -----------------
        <div class="col-md-10 offset-md-1">
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Dono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz as $q)
                    <tr>
                        <td class="col-md-3">
                            <div>
                                <a href="{{ route('play', ['id'=>$q->id_quiz]) }}" class="btn btn-dark"><i class="bi bi-controller"></i></a>
                                <a href="{{ route('show', ['id'=>$q->id_quiz]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('edit', ['id'=>$q->id_quiz]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('destroy', ['id'=>$q->id_quiz]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </td>
                        <td> {{ $q->titulo }} </td>
                        @foreach ($categorias->where('id_categoria',$q->id_categoria) as $cat)
                            <td> {{ $cat->categoria }} </td>
                        @endforeach
                        <td>{{ $q->id_user }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  

    </div> --}}