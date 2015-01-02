@extends('layouts.default')

@section('content')
    <form action="{{ action('GroupsController@handleCreate') }}" method="post" role="form">
        @include('groups.form')
    </form>
@stop