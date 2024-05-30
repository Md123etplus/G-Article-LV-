@extends('./../layouts/app')

@section('page-content')

<div class="card">
    <div class="card-body mb-5">
        
        
    </div>
    <div class="card-footer">
        <a  href="{{route('login')}}" style="text-decoration:none;padding:1%" class="alert alert-success ">Se connecter</a>
        <a href="{{route('registration')}}" style="text-decoration:none;padding:1%" class="alert alert-success">S'inscrire</a>
    </div>
</div>
@endsection