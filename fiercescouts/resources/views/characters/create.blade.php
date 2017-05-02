@extends("layouts.master")
@section("content")

<div class="container">

<h1>Create a Character</h1>

<!-- if there are creation errors, they will show here -->

{{ Form::open(array('url' => 'characters')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('class', 'Class') }}
        {{ Form::text('class', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::select('gender', ['M' => 'Male', 'F' => 'Female']) }}
    </div>

    {{ Form::submit('Create the Character!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@endsection