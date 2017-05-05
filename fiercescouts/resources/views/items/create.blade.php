@extends("layouts.master")
@section("content")

<div class="container">

<h1>Create an Item</h1>

<!-- if there are creation errors, they will show here -->

{{ Form::open(array('url' => 'items')) }}

<!--      <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    

    <div class="form-group">
        {{ Form::label('class', 'Class') }}
        {{ Form::select('class', ['warrior' => 'Warrior', 'mage' => 'Mage', 'assassin' => 'Assassin']) }}
    </div>

    <div class="form-group">
        {{ Form::select('gender', ['M' => 'Male', 'F' => 'Female']) }}
    </div> -->

    {{ Form::submit('Create the Item!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@endsection