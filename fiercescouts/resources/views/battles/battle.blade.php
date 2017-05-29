@extends('layouts.app')
@section("content")

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Class</td>
            <td>Gender</td>
            <td>Level</td>
            <td>Exp</td>
            <td>HP</td>
            <td>P ATK</td>
            <td>M ATK</td>
            <td>P DEF</td>
            <td>M DEF</td>
        </tr>
    </thead>
    <tbody>
    @foreach($character as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->class }}</td>
            @if ($value->gender == "M")
                <td><img src="{{URL::asset('/images/male.png')}}" alt="male icon" height="15" width="15"></td>
            @else
                <td><img src="{{URL::asset('/images/female.png')}}" alt="male icon" height="15" width="15"></td>
            @endif
            <td>{{ $value->level }}</td>
            <td>{{ $value->exp }}</td>
            <td>{{ $value->hp }}</td>
            <td>{{ $value->p_attack }}</td>
            <td>{{ $value->m_attack }}</td>
            <td>{{ $value->p_defence }}</td>
            <td>{{ $value->m_defence }}</td>

            <td>
            </td>
        </tr>
    @endforeach
    </tbody>
    @foreach($opponent as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->class }}</td>
            @if ($value->gender == "M")
                <td><img src="{{URL::asset('/images/male.png')}}" alt="male icon" height="15" width="15"></td>
            @else
                <td><img src="{{URL::asset('/images/female.png')}}" alt="male icon" height="15" width="15"></td>
            @endif
            <td>{{ $value->level }}</td>
            <td>{{ $value->exp }}</td>
            <td>{{ $value->hp }}</td>
            <td>{{ $value->p_attack }}</td>
            <td>{{ $value->m_attack }}</td>
            <td>{{ $value->p_defence }}</td>
            <td>{{ $value->m_defence }}</td>

            <td>

                

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection