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


 <h1 class="text-center my-3"> Create User</h1>

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    
<div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text"   class="form-control" id="nom" name="nom" >
</div>

<div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text"   class="form-control" id="prenom" name="prenom" >
</div>


<div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number"   class="form-control" min="1" max="100" id="age" name="age" >
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password"  class="form-control" id="password" name="password">
</div>

<div class="mb-3">
    <label for="date_naissance" class="form-label">Date naissance</label>
    <input type="date"  class="form-control" id="date_naissance" name="date_naissance">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text"  class="form-control" id="email" name="email">
</div>

<div class="mb-3 ">
        <label class="form-label" for="photo">Photo</label>
        <input type="file"  class="form-control" id="photo" name="photo">
    </div>  
<button type="submit" class="btn btn-primary">Submit</button>

</form>   
@endsection