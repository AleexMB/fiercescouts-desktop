@extends("layouts.base")
@section("create")

<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="containerUserChest">
        <p class="chestNumber">PROVA</p>
        <p class="infoChest">Click the coffer to reveal your new items</p>
        <div class="chestContainer">
          <div class="imageChest">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<!-- if there are creation errors, they will show here -->

<!-- {{ Form::open(array('url' => 'items')) }}

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

  <!--   {{ Form::submit('Create the Item!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>-->
