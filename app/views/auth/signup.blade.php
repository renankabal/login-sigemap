@extends('layouts.master')

@section('title')
    @parent
    :: Signup
@stop

@section('content')
    <div class="page-header">
            <h2>Signup to get all the good stuff</h2>
        </div>

        {{Form::open(['url'=>'signup', 'class'=>'form-horizontal', 'role'=>'form'])}}

            <!--Email-->
            <div class="form-group {{{$errors->has('username') ? 'has-error' : ''}}}">
                {{Form::label('username', 'Handle', ['class'=>'col-sm-2 control-label'])}}

                <div class="col-sm-4">
                    {{Form::text('username', Input::old('username'), ['class'=>'form-control'])}}
                    {{$errors->first('username')}}
                </div>
            </div>

            <!--Email-->
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

            <!--Password Confirmation-->
            <div class="form-group {{{$errors->has('password_confirmation') ? 'has-error' : ''}}}">
                {{Form::label('password_confirmation', 'Confirm Password', ['class'=>'col-sm-2 control-label'])}}

                <div class="col-sm-4">
                    {{Form::password('password_confirmation', ['class'=>'form-control'])}}
                    {{$errors->first('password_confirmation')}}
                </div>
            </div>

            <!--Login Button-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    {{Form::submit('Signup', ['class'=>'btn btn-default'])}}
                </div>
            </div>

        {{Form::close()}}
@stop