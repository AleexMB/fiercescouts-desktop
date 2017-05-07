@extends("layouts.master")
@section("content")

<div>
{{ Form::model($character, array('route' => array('characters.update', $character->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Character!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>

@endsection