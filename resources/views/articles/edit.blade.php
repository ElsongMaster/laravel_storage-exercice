@extends('template.main')




@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
          <li>{{$error}}</li>  
        @endforeach
    </ul>
</div>
@endif
<h1 class="text-center my-3"> Mise à jour données de l'article</h1>

<form action="{{route('articles.update',$article->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    
    
<div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text"  value="{{$article->nom}}" class="form-control" id="nom" name="nom" >
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text"  value="{{$article->description}}" class="form-control" id="description" name="description" >
</div>





<div class="mb-3">
    <label for="date_publication" class="form-label">Date de publication</label>
    <input type="date" value="{{$article->date_publication}}" class="form-control" id="date_publication" name="date_publication">
</div>

<div class="mb-3">
    <label for="auteur" class="form-label">Auteur</label>
    <input type="text" value="{{$article->auteur}}" class="form-control" id="auteur" name="auteur">
</div>

<div class="mb-3 ">
        <label class="form-label" for="image">Image</label>
        <input type="file" value="{{$article->image}}" class="form-control" id="image" name="image">
    </div>  
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection