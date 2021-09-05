@extends('template.main')




@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
          <li>{{$error}}</li>  
        @endforeach
    </ul>
</div>
@endif


 <h1 class="text-center my-3"> Create Article</h1>

<form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    
<div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text"   class="form-control" id="nom" name="nom" >
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text"   class="form-control" id="description" name="description" >
</div>




<div class="mb-3">
    <label for="date_publication" class="form-label">Date de publication</label>
    <input type="date"  class="form-control" id="date_publication" name="date_publication">
</div>

<div class="mb-3">
    <label for="auteur" class="form-label">Auteur</label>
    <input type="text"  class="form-control" id="auteur" name="auteur">
</div>

<div class="mb-3 ">
        <label class="form-label" for="image">Image</label>
        <input type="file"  class="form-control" id="image" name="image">
    </div>  
<button type="submit" class="btn btn-primary">Submit</button>

</form>   
@endsection