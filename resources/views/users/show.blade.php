@extends('template.main')




@section('content')

<div class="container d-flex justify-content-center align-items-center my-5">

    <div class="card" style="width: 18rem;">
    @if (Storage::disk('public')->exists('img/'.$user->photo))
    
    <img src="{{asset('img/'.$user->photo)}}" class="card-img-top" alt="...">
    @else
    
    <img src="{{$user->photo}}" class="card-img-top" alt="...">
    {{-- <img src="{{$user->photo}}" class="card-img-top" alt="..."> --}}
    @endif
      <div class="card-body">
        <h4 class="card-title">ID: {{$user->id}}</h4>
        <h5 class="card-title">Nom: {{$user->nom}}</h5>
        <h5 class="card-title">Prénom: {{$user->prenom}}</h5>
        <h5 class="card-title">Age: {{$user->age}}</h5>
        <h5 class="card-title">Password: {{$user->password}}</h5>
        <h5 class="card-title">Date naissance: {{$user->date_naissance}}</h5>
        <p class="card-text">Email: {{$user->email}} </p>
        <a href="{{route('users.index')}}" class="btn btn-primary">Go back</a>
      </div>
    </div>
</div>
@endsection