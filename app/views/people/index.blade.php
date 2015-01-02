@extends('layouts.default')

@section('content')
    
    @if ($people->isEmpty())
        <p>There are no people! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone/Mobile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                <tr>
                    <td>{{ $person->firstname }}</td>
                    <td>{{ $person->lastname }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->phone }} / {{ $person->mobile }}</td>
                    <td>
                        <a href="{{ action('PeopleController@edit', $person->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('PeopleController@delete', $person->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop