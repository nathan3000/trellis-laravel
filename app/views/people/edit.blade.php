@extends('layouts.default')

@section('content')
    <form name="edit" action="{{ action('PeopleController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $person->id }}">

        @include('people.form')
    </form>
@stop