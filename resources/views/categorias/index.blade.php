@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
            <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br>

        <h4 class="text-center">Cadastro de Nova Categoria</h4>

        <br><br>

        @if($cat != '')
            {{-- EDITAR --}}
            <form method="POST" action="{{ route('categorias.update',['id'=>$cat->id_categoria]) }}">
        @else 
            <form method="POST" action="{{ route('categorias.store') }}">
        @endif
            @csrf
                <div class="row offset-md-4">
                    <div class="col-md-4">
                        <label for="categoria" class="form-label">Nome Da Categoria *</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" value="@if($cat != '') {{ $cat->categoria }} @endif">
                    </div>
                    <div class="col-md-4">
                        <br>
                        <button type="submit" class="btn @if($cat != '') btn-primary @else btn-success @endif mt-2">@if($cat != '') Editar @else Cadastrar @endif</button>
                        @if($cat != '')
                            <a href="{{ route('categorias.index') }}" class="btn btn-danger mt-2">Cancelar</a>
                        @endif
                    </div>
                </div>
            </form>

        <br><br>

        <div class="col-md-8 offset-md-2">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoria as $c)
                    <tr>
                        <td>
                            <a href="{{ route('categorias.destroy', ['id'=>$c->id_categoria]) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{ route('categorias.edit', ['id'=>$c->id_categoria]) }}" class="btn btn-primary"><i class="fa-solid fa-wrench"></i></a>
                        </td>
                        <td>{{ $c->categoria }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>
    
@endsection