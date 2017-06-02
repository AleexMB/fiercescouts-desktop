@extends("layouts.master")
@section("content")

<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="chestContainer">
        <div class="imageChest">
        </div>
        <h1 class="titleChest">CHEST 1</h1>
        <button type="button" name="OPEN CHEST"></button>
      </div>
    </div>
  </div>

  <style media="screen">

    html, body {
      background-color: #f3f3f3;
      font-family:'Poppins',sans-serif;
      font-weight: 100;
    }

    .chestContainer{
      width: auto;
      margin-top: 25vh;
      background-color: blue;
      height: auto;
    }

    .imageChest{
      background-color: white;
      height: 30vh;
      width: auto;
    }

    .titleChest{
      text-align: center;
      color: #ffffff;
      font-size:24px;
      font-family: 'Poppins'
      font-weight: 300;

    }

  </style>

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
