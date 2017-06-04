@extends("layouts.base")
@section("create")


</body>
  <div class="container-fluid nopaddingleft nopaddingright">
    <div class="col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">
      <div class="chooseCharacterTitle text-center">
        <p>WELCOME FIERCESCOUT!<br>
CHOOSE YOUR CHARACTER AND START THE ADVENTURE</p>
      </div>
      <div class="buttonsGender text-center">
        <button onclick="selectedGender()" id="male" type="button" name="button ">MALE</button>
        <button onclick="selectedGender()" id="female" type="button" name="button">FEMALE</button>
      </div>
      <div class="row containerCharacter text-center">
        <div class=" chooseCharacter text-center">
            <div class="figure nopaddingleft nopaddingright " id"monk">
              <div class="figureTitle">
                MONK
              </div>
              <div class="figureImage" id="monkImage">
              </div>
              <div class="figureVal">
                ATT:...  DEF:...
              </div>
            </div>
            <div class="figure nopaddingleft nopaddingright " id="wizard">
              <div class="figureTitle">
                WIZARD
              </div>
              <div class="figureImage" id="wizardImage">
              </div>
              <div class="figureVal">
                ATT:...  DEF:...
              </div>
            </div>
            <div class="figure nopaddingleft nopaddingright " id="warrior">
              <div class="figureTitle">
                WARRIOR
              </div>
              <div class="figureImage" id="warriorImage">
              </div>
              <div class="figureVal">
                ATT:...  DEF:...
              </div>
            </div>
            <div class="figure nopaddingleft nopaddingright " id="demon">
              <div class="figureTitle">
                DEMON
              </div>
              <div class="figureImage" id="demonImage">
              </div>
              <div class="figureVal">
                ATT:...  DEF:...
              </div>
            </div>
            <div class="figure nopaddingleft nopaddingright " id="assassin">
              <div class="figureTitle">
                ASSASSIN
              </div>
              <div class="figureImage text-center" id="assassinImage">
              </div>
              <div class="figureVal">
                ATT:...  DEF:...
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="confirm text-center">
          <button class="confirmBtn centered" type="button" name="button">CONFIRM</button>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
</body>
  <!--<h1>Create a Character</h1>

if there are creation errors, they will show here -->

  <!-- {{ Form::open(array('url' => 'characters')) }}

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



<!-- <div class="createWrap jumbotron text-center">
    <div class="container">
        <div>
            <h2>Crea un personaggio</h2>
        </div>

    </div>
</div> -->
  <!--
