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
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/a71781511a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">

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

</body>
</html>