@extends('layouts.default')

@section('content')
    <form name="edit" action="{{ action('GroupsController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $group->id }}">

        @include('groups.form')
    </form>
@stop