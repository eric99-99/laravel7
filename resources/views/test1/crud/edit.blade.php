@extends('test1.crud.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Corona Virus Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('teacher.update', $teacher->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nama:</label>
              <input type="text" class="form-control" name="name" value="{{ $teacher->name }}"/>
          </div>
          
          <div class="form-group">
              <label for="age">Umur :</label>
              <input type="number" class="form-control" name="age" value="{{ $teacher->age }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
  </div>
</div>
@endsection