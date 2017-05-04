@extends('layouts.app')
@section("content")

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Class</td>
            <td>Gender</td>
            <td>HP</td>
            <td>P ATK</td>
            <td>M ATK</td>
            <td>P DEF</td>
            <td>M DEF</td>
        </tr>
    </thead>
    <tbody>
    @foreach($characters as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->class }}</td>
            @if ($value->gender == "M")
                <td><img src="{{URL::asset('/images/male.png')}}" alt="male icon" height="15" width="15"></td>
            @else
                <td><img src="{{URL::asset('/images/female.png')}}" alt="male icon" height="15" width="15"></td>
            @endif
            <!--<td>{{ $value->gender }}</td>-->
            <td>{{ $value->hp }}</td>
            <td>{{ $value->p_attack }}</td>
            <td>{{ $value->p_defence }}</td>
            <td>{{ $value->m_attack }}</td>
            <td>{{ $value->m_defence }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                {{ Form::open(array('url' => 'characters/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Character', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('characters/' . $value->id) }}">Show this Character</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('characters/' . $value->id . '/edit') }}">Edit this Character</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection