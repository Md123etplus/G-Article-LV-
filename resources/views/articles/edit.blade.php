@extends('./../layouts/app')
    @section('page-content')
    <div class="container mt-5">
        <form action="{{route('articles.update',$article->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{route('so')}}">&#9664; Retour</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="titre" class="form-label"><strong>Titre:</strong></label>
                            <input name="titre" id="titre" type="text" class="form-control" value="{{ $article->titre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="description" class="form-label"><strong>Description:</strong></label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $article->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-info">Actualiser</button>
                    <button type="reset" class="btn btn-danger">Réinitialiser</button>
                </div>
            </div>
        </form>
    </div>
    @endsection