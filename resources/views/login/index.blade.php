@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Login Form</div>
    <div class="card-body">

        <form action="{{ route('check') }}" method="post">
            {!! csrf_field() !!}

            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control"> </br>


            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control"> </br>


            <input type="submit" value="Login" class="btn btn-success">

            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>


        </form>
    </div>
</div>

@stop