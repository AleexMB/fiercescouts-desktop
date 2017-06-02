@extends("layouts.base")
@section("create")

<table class="table table-striped table-bordered" id="tableLadders">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Victory Points</td>
        </tr>
    </thead>
    <tbody>
    @foreach($ranks as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->victory_points }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
