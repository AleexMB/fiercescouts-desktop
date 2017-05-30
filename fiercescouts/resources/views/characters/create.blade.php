@extends("layouts.master")
@section("content")

<!-- <div class="createWrap jumbotron text-center">
    <div class="container">
        <div>
            <h2>Crea un personaggio</h2>
        </div>

    </div>
</div> -->

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
        {{ Form::select('class', ['warrior' => 'Warrior', 'mage' => 'Mage', 'assassin' => 'Assassin', 'demon' => 'Demon', 'monk' => 'Monk']) }}
    </div>

    <div class="form-group">
        {{ Form::select('gender', ['M' => 'Male', 'F' => 'Female']) }}
    </div>

    {{ Form::submit('Create the Character!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@endsection