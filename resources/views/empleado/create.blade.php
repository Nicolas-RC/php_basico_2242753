@extends('templates.template')
@section('contenido')
<form method="POST" action="{{ url('employee')}}" class="form-horizontal">
    @csrf
    <fieldset>

    <legend>New employee</legend>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Name</label>
      <div class="col-md-4">
      <input name="name" type="text" placeholder="Name" class="form-control input-md" value="{{ old('name') }}">
      </div>
      <strong style="color: red">{{ $errors->first('name')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Lastname</label>
      <div class="col-md-4">
      <input name="lastname" type="text" placeholder="Lastname" class="form-control input-md" value="{{ old('lastname') }}">
      </div>
      <strong style="color: red">{{ $errors->first('lastname')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Title</label>
      <div class="col-md-4">
      <input name="title" type="text" placeholder="Title" class="form-control input-md" value="{{ old('title') }}">
      </div>
      <strong style="color: red">{{ $errors->first('title')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Country</label>
        <div class="col-md-4">
        <input name="country" type="text" placeholder="Country" class="form-control input-md" value="{{ old('country') }}">
        </div>
        <strong style="color: red">{{ $errors->first('country')}}</strong>
      </div>
      <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">City</label>
      <div class="col-md-4">
      <input name="city" type="text" placeholder="City" class="form-control input-md" value="{{ old('city') }}">
      </div>
      <strong style="color: red">{{ $errors->first('city')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Phone number</label>
      <div class="col-md-4">
      <input name="phone" type="text" placeholder="Phone number" class="form-control input-md" value="{{ old('phone') }}">
      </div>
      <strong style="color: red">{{ $errors->first('phone')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Email</label>
      <div class="col-md-4">
      <input name="email" type="email" placeholder="Email" class="form-control input-md" value="{{ old('email') }}">
      </div>
      <strong style="color: red">{{ $errors->first('email')}}</strong>
    </div>
    <br/>

    <!--text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-4">
        <input name="address" type="text" placeholder="Address" class="form-control input-md" value="{{ old('address') }}">
        </div>
        <strong style="color: red">{{ $errors->first('address')}}</strong>
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
    <a href="{{ url('../employee') }}">Back</a>
</form>
@endsection
