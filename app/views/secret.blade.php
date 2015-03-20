@extends('layouts.master')

@section('title')
    @parent
    :: Secret
@stop

@section('content')
    <h1>Hello {{$user->username}}</h1>
    <p>If you see this page, you are logged in</p>
@stop