@extends('template.main')




@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<h1 class="text-center my-5">Bienvenue sur la page Article</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">date_publication</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($datas as $data )
          
      <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->nom}}</td>
        <td>{{$data->description}}</td>
        <td>{{$data->date_publication}}</td>
        <td class="d-flex justify-content-evenly ">
            <a href="{{route('articles.show',$data->id)}}" class="btn btn-info me-2">SHOW</a>
            <a href="{{route('articles.edit',$data->id)}}" class="btn btn-warning me-2">EDIT</a>

            <form action="{{route('articles.destroy',$data->id)}}" method="post">
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

    <a href="{{route('articles.create')}}" class="btn btn-success p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-light fs-2"></i></a>
</div>
@endsection