@extends('templates.template')
@section('contenido')
    <header>
        <h1>Users</h1>
    </header>
    <a class="btn btn-primary" href="{{ url('users/create') }}"><i class="fas fa-plus"></i> New user</a>
    <br>
    <br>
    @if (session("message"))
    <div class="alert alert-success">
        <div class="d-flex justify-content-center">
            <h3>{{session("message")}}</h3>
        </div>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="table-active">Name</th>
                <th>Email</th>
                <th>Detail</th>
                <th>Update</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $user)
            @if ($user->Enable == 1 || $user->Enable == 2)
                <tr>
                    <td> {{$user->name}}</td>
                    <td> {{$user->email}} </td>
                    <td> <a href="{{ url('users/'. $user->id) }}">More details</a> </td>
                    <td> <a href="{{ url('users/'. $user->id . '/edit') }}">Update</a> </td>
                    <td>
                        @switch ($user->Enable)
                            @case(1)
                                <strong style="color: #11B900">Active | </strong>
                                <a href="{{ url('users/'.$user->id.'/enable') }}" title="Inactive">
                                    <img src="{{ asset('assets/prohibicion.png') }}" alt="Check" width="20" height="20">
                                </a>
                            @break
                            @case(2)
                                <strong style="color: red">Inactive | </strong>
                                <a href="{{ url('users/'.$user->id.'/enable') }}" title="Active">
                                    <img src="{{ asset('assets/comprobado.png') }}" alt="Check" width="20" height="20">
                                </a>
                            @break
                        @endswitch
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
@endsection
