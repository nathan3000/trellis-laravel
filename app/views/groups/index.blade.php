@extends('layouts.default')

@section('content')
    
    @if ($groups->isEmpty())
        <p>There are no groups! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>
                        <a href="{{ action('GroupsController@edit', $group->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('GroupsController@delete', $group->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop