@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

    <br>

        <a href="{{ route('show', ['id'=>$questao->id_quiz]) }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a><h1>Editar Questão: {{ $questao->titulo }}</h1>

    <br>

        {{-- EDITAR --}}
        <form method="POST" action="{{ route('questoes.update',['id'=>$questao->id_questao]) }}">
            @csrf

            <div class="row g-3 offset-md-2">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Titulo da questao *</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $questao->titulo }}" required>
                </div>
                {{-- <div class="col-md-6"></div> --}}
                <div class="col-md-2 mt-5">
                    <button type="submit" class="btn btn-primary">Alterar Titulo</button>
                </div>
            </div>

        </form>

        <br>
        <h5 class="offset-md-5">Respostas</h5>
        <br>
        
        <div class="col-md-5 offset-md-3">
            <table class="table table-hover">
                <thead>
                    <th>Resposta</th>
                    <th>{C ou E}</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach($questao->resposta()->get() as $item)
                    <tr>
                        <td>{{ $item->resposta }}</td>
                        <td>@if($item->certa == 1) Certa @else Errada @endif</td>
                        <td><a href="{{ route('respostas.destroy', ['id'=>$item->id_resposta]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    

        <br>
        <h5 class="offset-md-4">Cadastro de Respostas</h5>
        
        <br>

        <form action="{{ route('respostas.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_questao" id="id_questao" value="{{ $questao->id_questao }}">

            <div class="row g-3 offset-md-2">
                <div class="col-md-5">
                    <label for="resposta" class="form-label">Resposta *</label>
                    <textarea name="resposta" id="resposta" cols="30" rows="4" class="form-control"></textarea>
                </div>
                @if ( $questao->resposta()->where('certa',1)->count() == 0)
                    <div class="col-md-2">
                        <label for="certa" class="form-label">Resposta: {C ou E}</label>
                        <select name="certa" id="certa" class="form-control">
                            <option value="0">Errada</option>
                            <option value="1">Certa</option>
                        </select>
                    </div>
                @else 
                <input type="hidden" name="certa" id="certa" value="0">
                @endif
                
                {{-- <div class="col-md-6"></div> --}}
                <div class="col-md-2 mt-5">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
            
        </form>

    </div>

@endsection