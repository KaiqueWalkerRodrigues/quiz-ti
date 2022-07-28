<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz - T.I</title>
    {{-- Boostrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- Boostrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/a71781511a.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <br>
        <a href="{{ route('create') }}" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i></a>
        <a href="{{ route('categorias.index') }}" class="btn btn-outline-primary">CAT</a>
        <a href="{{ route('user.index') }}" class="btn btn-outline-warning">RANK</a>
        <a href="{{ route('logout') }}" class="btn btn-outline-danger">LOG-OUT</a>
        
        <div class="col-md-8 offset-md-2">
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

    </div>
    
</body>
</html>