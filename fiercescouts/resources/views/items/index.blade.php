@extends('layouts.app')
@section("content")

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection