@extends('template.main')




@section('content')
<h1 class="text-center my-5">Bienvenue sur la page User</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($datas as $data )
          
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->nom}}</td>
        <td>{{$data->prenom}}</td>
        <td>{{$data->age}}</td>
        <td class="d-flex justify-content-evenly ">
            <a href="{{route('users.show',$data->id)}}" class="btn btn-info me-2">SHOW</a>
            <a href="{{route('users.edit',$data->id)}}" class="btn btn-warning me-2">EDIT</a>

            <form action="{{route('users.destroy',$data->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
        </td>

      </tr>
      @endforeach
    </tbody>
</table>
<div class="container d-flex justify-content-center">

    <a href="{{route('users.create')}}" class="btn btn-success p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-light fs-2"></i></a>
</div>
@endsection