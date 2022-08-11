@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')
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
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="{{ route('create') }}" class="btn" id="botaonovo">NOVO QUIZ</a>
            </div>
            

            <style>
                .card-title{
                    height: 100px;
                }
                .card-text{
                    height: 170px;
                }
            </style>
            @foreach ($quiz as $q)
            <div class="col-md-4 mt-5 text-center">
                <div class="card text-center bg-imagem" style="width: 19rem; height: 26rem;" id="degrade-1">
                    <div class="card carde ms-4 mt-4" style="width: 16rem; height: 23rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $q->titulo }}</h5>
                      <p class="card-text">{{ $q->descricao}}</p>
                    <div>
                      <footer>
                    @if(Auth::user()->id != $q->id_user or Auth::user()->id == 3)
                        <a href="{{ route('play', ['id'=>$q->id_quiz]) }}" class="btn btn-dark rounded-circle"><i class="bi bi-controller"></i></a>
                    @endif
                    @if(Auth::user()->id == $q->id_user or Auth::user()->id == 3)
                        <a href="{{ route('show', ['id'=>$q->id_quiz]) }}" class="btn btn-primary rounded-circle"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('edit', ['id'=>$q->id_quiz]) }}" class="btn btn-secondary rounded-circle"><i class="fa-solid fa-wrench"></i></a>
                        {{-- <a href="{{ route('destroy', ['id'=>$q->id_quiz]) }}" class="btn btn-danger rounded-circle"><i class="fa-solid fa-trash-can"></i></a> --}}
                        {{-- Modal --}}
                        <button type="button" class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal" data-nome="(!) Deseja mesmo excluir o quiz : {{ $q->titulo }}" data-url="{{ route('destroy', ['id'=>$q->id_quiz]) }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        
                    @endif
                    </footer>
                    </div>
                    </div>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <br>
            <br>
            <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="GET" id="excluir">
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Isso excluirá o quiz permanentemente, está de acordo com tal ato?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    
@endsection
@section('script')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            let nome = button.data('nome')
            let url = button.data('url')
            console.log(url)
            $('#exampleModalLabel').text(nome)
            $('#excluir').attr('action', url)
        })
    </script>
@endsection