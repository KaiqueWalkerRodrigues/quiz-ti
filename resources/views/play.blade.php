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
    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/a71781511a.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">

        <br>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <br>
            <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
        <br><br>

        <form method="POST" action="{{ route('corfirma_resposta') }}">
            @csrf

            @foreach( $questoes->where('id_quiz',$id)->random(1) as $q)

                <input type="hidden" name="id_quiz" id="id_quiz" value="{{ $q->id_quiz }}">
                <h4>{{ $q->titulo }}</h4>

                <br>
                @php
                    $n = 1
                @endphp

                @foreach($respostas->where('id_questao',$q->id_questao)->where('certa','0')->random(4) as $res)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $res->id_resposta }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $n }}">
                            {{$res->resposta}}
                        </label>
                    </div>
                    @php
                        $n++
                    @endphp
                @endforeach

                @foreach($respostas->where('id_questao',$q->id_questao)->where('certa','1') as $res)
                    <div class="form-check">
                        <input type="hidden" name="certa" id="certa" value="{{ $res->id_resposta }}">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $n }}" value="{{ $res->id_resposta }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $n }}">
                                {{$res->resposta}}
                        </label>
                    </div>
                @endforeach

                <br>
                
                <div class="col-md-2 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        Proximo >
                    </button>
                </div>

            @endforeach

        </form>

    </div>
    
</body>
</html>