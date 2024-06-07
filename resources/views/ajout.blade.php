@extends('./layouts/app')

@section('page-content')
    <div class="container mt-2">
        <div class="row">
            <!-- Colonne pour la liste des articles -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <h4 class="text-center">Articles disponibles</h4>
                            @forelse($articles as $article)
                                <li class="list-group-item mb-4">
                                    <div><a style="text-decoration:none" href="/ajouterTitre/{{$article->id}}"><h4 style="color:rgb(41, 99, 187);font-weight:bold"> {{ $article->titre }}</h4></a></div>
                                    <div><strong>Description:</strong> <a href="/ajouterTitre/{{$article->id}}">Cliquer pour voir.</a></div>
                                    <div> <em>Ecrit par <strong>{{$article->proprietaire->name}}</strong></em></div>
                                </li>
                            @empty
                                <li class="list-group-item"><em>Aucun article trouvé !</em></li>
                            @endforelse
                        </ul>
                        <div class="container">
                            {{$articles->onEachSide(2)->links()}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne pour le formulaire -->
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @auth
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{route('articles')}}" method="POST" class="form-product">
                                @csrf
                                <h4>Enregistrer un article</h4>
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" placeholder="Ajouter un titre" name="titre" value="{{ old('titre') }}">
                                    @error('titre')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Entrer la description...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-primary" type="submit">Ajouter</button>
                            </form>
                        @else
                        <p class="text-monospace">Connecter vous pour ajouter un article</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection