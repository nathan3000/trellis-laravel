@extends('layouts.default')

@section('content')
    <form action="{{ action('PeopleController@handleCreate') }}" method="post" role="form">
        @include('people.form')
    </form>
@stop