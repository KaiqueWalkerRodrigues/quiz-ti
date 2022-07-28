<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz T.i</title>
    {{-- Boostrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- Boostrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/a71781511a.js" crossorigin="anonymous"></script>
</head>
<body> 

    <div class="container">

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
    
</body>
</html>