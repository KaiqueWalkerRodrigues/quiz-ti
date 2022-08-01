@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
            <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br>

        <h4 class="text-center">Cadastro de Nova Categoria</h4>

        <br><br>

        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf
            <div class="row offset-md-4">
                <div class="col-md-4">
                    <label for="categoria" class="form-label">Nome Da Categoria *</label>
                    <input type="text" name="categoria" id="categoria" class="form-control">
                </div>
                <div class="col-md-4">
                    <br>
                    <button type="submit" class="btn btn-success mt-2">Cadastrar</button>
                </div>
            </div>
        </form>

        <br><br>

        <div class="col-md-8 offset-md-2">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoria as $c)
                    <tr>
                        <td>{{ $c->id_categoria }}</td>
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