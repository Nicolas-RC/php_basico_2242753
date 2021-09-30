@extends('templates.template')
@section('contenido')
<form method="POST" action="{{ url('customer')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <legend>New Customer</legend>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Name</label>
      <div class="col-md-4">
      <input name="name" type="text" placeholder="Name customer" class="form-control input-md" value="{{ old('name') }}">
      </div>
      <strong style="color: red">{{ $errors->first('name')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Lastname</label>
      <div class="col-md-4">
      <input name="lastname" type="text" placeholder="Lastname customer" class="form-control input-md" value="{{ old('lastname') }}">
      </div>
      <strong style="color: red">{{ $errors->first('lastname')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Email</label>
      <div class="col-md-4">
      <input name="email" type="text" placeholder="Email customer" class="form-control input-md" value="{{ old('email') }}">
      </div>
      <strong style="color: red">{{ $errors->first('email')}}</strong>
    </div>
    <br/>

    <!--button-->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
        <button name="btn" class="btn btn-primary">Save</button>
      </div>
    </div>

    </fieldset>
    <br/>
    <a href="{{ url('../customer') }}">Back</a>
</form>
@endsection
