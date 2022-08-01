@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

        <br>
        <h4>Cadastro de Nova Categoria</h4>

        <br>

        <form action="" method="post">
            <div class="row">
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

    </div>
    
@endsection