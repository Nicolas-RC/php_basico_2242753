@extends('templates.template')
@section('contenido')
    <legend>Audio formtas</legend>
    <form action="{{ route('mediatype.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="form-label">Upload file</label>
            <input type="file" class="form-control" name="input" id="input">
        </div>
        <div class="col-md-4">
          <button type="submit" name="btn" class="btn btn-primary">Upload</button>
        </div>
    </form>
@endsection
