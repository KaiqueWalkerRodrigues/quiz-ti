@extends('layouts.base')
@section('menu')
@endsection
@section('conteudo')

    <br>
    <a href="{{ route('index') }}" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i></a>
    <br>
    <br>
    <h4>Alterando Avatar</h4>
    <br>
    <form action="{{ route('avatar.update',['id'=>Auth::user()->id]) }}" method="post">
        @csrf

        <div class="row">
            @php $n = 0 @endphp
        @foreach($avatares as $a)
            @php $n++ @endphp
        <br>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_avatar" id="avatar{{$n}}" value="{{ $a->id_avatar }}">
                    <label for="avatar{{$n}}" class="form-label mb-5"><img src="/avatares/{{ $a->avatar }}" alt=""></label>
                </div>
            </div> 
        @endforeach
            <button type="submit" class="btn btn-success col-md-2 offset-md-10">Alterar Avatar</button>
        </div>

    </form>

@endsection