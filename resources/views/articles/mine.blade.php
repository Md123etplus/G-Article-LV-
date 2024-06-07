@extends('./../layouts/app')
    @section('page-content')
        <div class="card mt-5">
            <div class="row">
                <!-- Colonne pour la liste des articles -->
                <div class="card-body">
                    <ul class="list-group">
                        <h4 class="text-center">Articles disponibles</h4>
                        @forelse($myarticles as $article)
                            <li class="list-group-item mb-4">
                                <div><a style="text-decoration:none" href="/ajouterTitre/{{$article->id}}"><h4 style="color:rgb(41, 99, 187);font-weight:bold"> {{ $article->titre }}</h4></a></div>
                                <div><strong>Description:</strong> <a href="/ajouterTitre/{{$article->id}}">Cliquer pour voir.</a></div>
                            </li>
                        @empty
                            <li class="list-group-item"><em>Aucun article trouvé !</em></li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    @endsection