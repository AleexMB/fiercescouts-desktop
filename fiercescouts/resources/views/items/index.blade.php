@extends("layouts.base")
@section("create")

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
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('items/equipR/' . $value->id) }}">Equip Item to R</a>
                <a class="btn btn-small btn-success" href="{{ URL::to('items/equipL/' . $value->id) }}">Equip Item to L</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
