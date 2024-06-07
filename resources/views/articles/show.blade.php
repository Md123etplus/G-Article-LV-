@extends('./../layouts/app')
    @section('page-content')
        <div class="card mt-5">
            <div class="card-body">
                <a href="{{route('so')}}">&#9664;Retour</a>
                <div class="titre mb-2"><h4 style="color:rgb(41, 99, 187);font-weight:bold"> {{ $article->titre }}</h4></div>
                <p><strong>Description:</strong>  {{$article->description}}</p>
            </div>
            @auth
            @if(Auth::user()->id==$article->user_id)
            <div class="card-footer">
                <div class="d-flex justify-content align-items-center">
                    <a href="{{route('articles.edit',$article->id)}}" class="btn btn-info m-1">Éditer</a>
                    <form action="{{route('articles.delete',$article->id)}}" method="post" class="m-0">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
            @endif
            @endauth
        </div>
    @endsection