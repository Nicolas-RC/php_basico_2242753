@extends('templates.template')
@section('contenido')
<form method="POST" action="{{ url('customer/' . $customer->CustomerId)}}" class="form-horizontal">
    @method('PUT')
    @csrf
    <fieldset>

    <legend>Modify Customer</legend>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Name</label>
      <div class="col-md-4">
      <input value="{{ $customer->FirstName }}" name="name" type="text" placeholder="Name customer" class="form-control input-md">
      </div>
      <strong style="color: red">{{ $errors->first('name')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Lastname</label>
      <div class="col-md-4">
      <input value="{{ $customer->LastName }}" name="lastname" type="text" placeholder="Lastname customer" class="form-control input-md">
      </div>
      <strong style="color: red">{{ $errors->first('lastname')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Email</label>
      <div class="col-md-4">
      <input value="{{ $customer->Email }}" name="email" type="text" placeholder="Email customer" class="form-control input-md">
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
</form>
<br/>
<a href="{{ url('../customer') }}">Back</a>
@endsection
