@extends('./layouts/app')

@section('page-content')
<fieldset>
<legend>Formulaire de connexion</legend>
<div class="card" style="align-items:center !important">
    {{-- @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-info">{{$error}}</div>
            <br>
        @endforeach 
    @endif --}}
    <div class="card-body" style="width:50% !important">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h4>Connexion</h4>
        <form action="{{route('login')}}" method="POST" class="form-product">
            @csrf
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
           <button class="btn btn-primary" type="submit">Se connecter</button>
           <center><p>Pas encore de compte? <a href="{{route('register')}}">S'inscrire</a></p></center>
        </form>
    </div>
</div>

</fieldset>
@endsection