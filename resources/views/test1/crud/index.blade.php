@extends('test1.crud.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  {{-- @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif --}}
  <div class="form-inline mb-2">
    <a href= {{ URL::to('/')}} class="btn btn-success">Home</a>
    <a href="{{ route('teacher.create')}}" class="btn btn-primary ml-2">Add Data</a>
  </div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>Umur</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($teacher as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->age}}</td>
            <td><a href="{{ route('teacher.edit', $item->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('teacher.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection