@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
    
        <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br>
        <br>
        <h4>Código: {{ $quiz->id_quiz }} - {{ $quiz->titulo }}</h4>
        <br>
        <p> Id-Categoria {{ $quiz->id_categoria }} <br>
        Id-Usuario  {{ $quiz->id_usuario }} </p>
        <p> {{ $quiz->descricao }} </p>

        <hr>
        
        
            <table class="table table-hover">
                <thead>
                    <th>Ações</th>
                    <th>Titulo</th>
                </thead>
                <tbody>
                    @foreach ($quiz->questoes()->get() as $item)
                    <tr>
                        <td>
                            <a href="{{ route('questoes.edit', ['id'=>$item->id_questao]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('questoes.destroy', ['id'=>$item->id_questao]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td>{{ $item->titulo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        

        <br>

        <form action="{{ route('questoes.store') }}" method="post">
            @csrf
            <input type="hidden" name="id_quiz" id="id_quiz" value="{{ $quiz->id_quiz }}">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="titulo" class="form-label">Titulo da Questão *</label>
                    <input type="text" class="form-control" placeholder="Ex: Qual era..." id="titulo" name="titulo">
                </div>
            </div>
            <div class="col-md-2 offset-md-2 text-end mt-2">
                <button type="submit" class="btn btn-success">Cadastrar Questão</button>
            </div>
        </form>
        {{-- <a href="{{ route('questoes.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i></a> --}}

    </div>

@endsection