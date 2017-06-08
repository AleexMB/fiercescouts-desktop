@extends("layouts.base")
@section("create")

</body>
  <div class="container-fluid nopaddingleft nopaddingright">
	<div class="col-md-12">
    <div class="row">
      <div class="chooseCharacterTitle text-center">
		<p>WELCOME FIERCESCOUT!
CHOOSE YOUR CHARACTER AND START THE ADVENTURE</p>
	   </div>
   </div>
   <div class="row">
	   {{ Form::open(array('url' => 'characters')) }}
	   <div class="form-group col-md-4 col-md-offset-4">
		    {{ Form::text('name', null, array('class' => 'form-control nameBox ', 'placeholder' => 'name' )) }}
	   </div>
  </div>
  <div class="">
	  <div class="form-group">
		    <div class=" buttonsGender text-center ">
		  <!-- {{ Form::select('gender', ['M' => 'Male', 'F' => 'Female']) }} -->
		  <!-- {{ Form::radio('single') }} -->
		    <button id="male" type="button" ><input type='radio' name='gender' value='M' class='radioInvis' id='radioMale'/>Male</button>
		    <button id="female" type="button" ><input type='radio' name='gender' value='F' class='radioInvis' id='radioFemale'/>Female</button>
		</div>
	  </div>
  </div>
	  <div class="row containerCharacter text-center">
		<div class=" chooseCharacter text-center">
			<div class="figure nopaddingleft nopaddingright " id="monk">
			  <div class="figureTitle">
				MONK
			  </div>
			  <div class="figureImage" id="monkImage">
			  </div>
			  <div class="figureVal">
				BALANCED STATS
				<input type='radio' name='class' class='radioInvis' value='monk' id='radioMonk'/>
			  </div>
			</div>
			<div class="figure nopaddingleft nopaddingright " id="wizard">
			  <div class="figureTitle">
				WIZARD
			  </div>
			  <div class="figureImage" id="wizardImage">
			  </div>
			  <div class="figureVal">
				HIGH MATK / HIGH MDEF
				<input type='radio' name='class' class='radioInvis' value='mage' id='radioMage'/>
			  </div>
			</div>
			<div class="figure nopaddingleft nopaddingright " id="warrior">
			  <div class="figureTitle">
				WARRIOR
			  </div>
			  <div class="figureImage" id="warriorImage">
			  </div>
			  <div class="figureVal">
				HIGH HP / HIGH PATK
				<input type='radio' name='class' class='radioInvis' value='warrior' id='radioWarrior'/>
			  </div>
			</div>
			<div class="figure nopaddingleft nopaddingright " id="demon">
			  <div class="figureTitle">
				DEMON
			  </div>
			  <div class="figureImage" id="demonImage">
			  </div>
			  <div class="figureVal">
				VERY HIGH ATK / VERY LOW DEF
				<input type='radio' name='class' class='radioInvis' value='demon' id='radioDemon'/>
			  </div>
			</div>
			<div class="figure nopaddingleft nopaddingright " id="assassin">
			  <div class="figureTitle">
				ASSASSIN
			  </div>
			  <div class="figureImage text-center" id="assassinImage">
			  </div>
			  <div class="figureVal">
				VERY HIGH PATK / VERY LOW HP
				<input type='radio' name='class' class='radioInvis' value='assassin' id='radioAssassin'/>
			  </div>
			</div>
		</div>
	  </div>
	  <div class="row">
		    <div class="confirm text-center">
		  {{ Form::submit('CONFIRM', array('class' => 'confirmBtn centered')) }}
		  <!-- <button class="confirmBtn centered" type="button" name="button">CONFIRM</button>
		</div> -->
		  </div>
	     {{ Form::close() }}
	  </div>
	</div>
  </div>
  <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ asset('js/radioHandler.js') }}"></script>

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


 <!--<div class="createWrap jumbotron text-center">
	<div class="container">
		<div>
			<h2>Crea un personaggio</h2>
		</div>

	</div>
</div> -->
  <!--
