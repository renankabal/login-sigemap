@extends('layouts.master')

@section('title')
    @parent
    :: Login
@stop

{{--Content--}}
@section('content')
    <div class="page-header">
        <h2>Login to your account</h2>
    </div>

    {{Form::open(['url'=>'login', 'class'=>'form-horizontal', 'role'=>'form'])}}

        <!--Name-->
        <div class="form-group {{{$errors->has('email') ? 'has-error' : ''}}}">
            {{Form::label('email', 'Email', ['class'=>'col-sm-2 control-label'])}}

            <div class="col-sm-4">
                {{Form::text('email', Input::old('email'), ['class'=>'form-control'])}}
                {{$errors->first('email')}}
            </div>
        </div>

        <!--Password-->
        <div class="form-group {{{$errors->has('password') ? 'has-error' : ''}}}">
            {{Form::label('password', 'Password', ['class'=>'col-sm-2 control-label'])}}

            <div class="col-sm-4">
                {{Form::password('password', ['class'=>'form-control'])}}
                {{$errors->first('password')}}
            </div>
        </div>

        <!--Login Button-->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                {{Form::submit('Login', ['class'=>'btn btn-default'])}}
            </div>
        </div>

    {{Form::close()}}
@stop