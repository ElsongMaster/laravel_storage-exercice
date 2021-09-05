@extends('template.main')




@section('content')

<div class="container d-flex justify-content-center align-items-center my-5">

    <div class="card" style="width: 18rem;">
    @if (Storage::disk('public')->exists('img/'.$article->image))
    
    <img src="{{asset('img/'.$article->image)}}" class="card-img-top" alt="...">
    @else
    
    <img src="{{$article->image}}" class="card-img-top" alt="...">
    {{-- <img src="{{$article->photo}}" class="card-img-top" alt="..."> --}}
    @endif
      <div class="card-body">
        <h4 class="card-title">ID: {{$article->id}}</h4>
        <h5 class="card-title">Nom: {{$article->nom}}</h5>
        <h5 class="card-title">Description: {{$article->description}}</h5>

        <h5 class="card-title">Date de publication: {{$article->date_publication}}</h5>
        <p class="card-text">Auteur: {{$article->auteur}} </p>
        <a href="{{route('articles.index')}}" class="btn btn-primary">Go back</a>
      </div>
    </div>
</div>
@endsection