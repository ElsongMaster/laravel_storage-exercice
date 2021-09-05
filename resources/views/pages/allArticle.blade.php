@extends('template.main')




@section('content')
{{-- <h1 class="text-center my-5">Bienvenue sur la page User</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($datas as $data )
          
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->nom}}</td>
        <td>{{$data->prenom}}</td>
        <td>@{{$data->age}}</td>
        <td>
            <a href="{{route('users.show',$data->id)}}" class="btn btn-info">SHOW</a>
            <a href="{{route('users.edit',$data->id)}}" class="btn btn-warning">EDIT</a>

            <form action="{{route('users.destroy',$data->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
        </td>

      </tr>
      @endforeach

  </tbody>
</table> --}}
@endsection