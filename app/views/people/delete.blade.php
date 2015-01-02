@extends('layouts.default')

@section('content')
    <form action="{{ action('PeopleController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="person" value="{{ $person->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('PeopleController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop