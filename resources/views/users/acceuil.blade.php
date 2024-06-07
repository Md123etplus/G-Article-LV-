@extends('./layouts/app')

@section('page-content')

<div class="card mt-2" style="align-items:center !important">
    {{-- @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-info">{{$error}}</div>
            <br>
        @endforeach 
    @endif --}}
    <div class="card-body" style="width:50% !important;">
        <h4>Nouvel utilisateur</h4>
        <form action="{{route('register')}}" method="POST" class="form-product">
            @csrf
            <div class="form-group">
                <label for="nom">Nom </label>
                <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom" value={{old('nom')}}>
                @error('nom')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>            
            
            <div class="form-group">
                <label for="prenom">Prenom </label>
                <input type="text" id="prenom" class="form-control" placeholder="Entrez votre prenom" name="prenom" value={{old('prenom')}}>
                @error('prenom')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>            
            <div class="form-group">
                <label for="mail">Email </label>
                <input type="email" id="mail" class="form-control" placeholder="Entrez votre email" name="email" value={{old('email')}}>
                @error('email')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe  </label>
                <input type="password" id="motdepasse" class="form-control" placeholder="Entrez votre mot de passe" name="motdepasse" value={{old('motdepasse')}}>
                @error('motdepasse')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
           <button class="btn btn-primary" type="submit">S'inscrire</button>
           <center><p>Deja un compte? <a href="{{route('login')}}">Se connecter</a></p></center>
        </form>
    </div>
</div>


@endsection