<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz - T.I</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">

    @if($quiz)
        <h1>Editar Quiz: {{ $quiz->id_quiz }}</h1>
    @else
        <h1>Novo Quiz</h1>
    @endif

    <br>

    @if($quiz)
        {{-- EDITAR --}}
        <form method="POST" action="{{ route('update',['id'=>$quiz->id_quiz]) }}">
    @else 
        {{-- Cadastrar --}}
        <form method="POST" action="{{ route('store') }}">
    @endif


        @csrf

        <div class="row g-3">
            <div class="col-md-4">
                <label for="titulo" class="form-label">Titulo do Quiz *</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $quiz ? $quiz->titulo : '' }}" required>
            </div>
            <div class="col-md-2">
                <label for="id_categoria" class="form-label">Categoria *</label>
                <select name="id_categoria" id="id_categoria" class="form-control">
                    @if($quiz)
                        <option value="{{ $quiz->id_categoria }}" selected="selected">{{ $categoria->categoria }}</option>
                        @foreach ($categorias->where('id_categoria','!=',$categoria->id_categoria) as $c)
                            <option value="{{ $c->id_categoria }}">{{ $c->categoria }}</option>
                        @endforeach
                    @else
                        <option value="" selected="selected">Selecione..</option>
                        @foreach ($categoria as $c)
                            <option value="{{ $c->id_categoria }}">{{ $c->categoria }}</option>
                        @endforeach
                    @endif
                </select>
                {{-- <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="{{ $quiz ? $quiz->id_categoria : '' }}" required> --}}
            </div>
            <div class="col-md-2">
                <label for="id_usuario" class="form-label">Dono *</label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{ $quiz ? $quiz->id_usuario : '' }}" required>
            </div>
            <div class="col-md-4">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" name="descricao" cols="30" rows="3" class="form-control">{{ $quiz ? $quiz->descricao : '' }}</textarea>
            </div>
            <div class="col-md-2 offset-md-8 text-end">
                <a href="{{ route('index') }}" class="btn btn-danger">Cancelar</a>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">@if($quiz) Editar Quiz @else Criar Quiz @endif</button>
            </div>
        </div>

    </form>
    {{-- /Cadastrar --}}

    </div>

</body>
</html>