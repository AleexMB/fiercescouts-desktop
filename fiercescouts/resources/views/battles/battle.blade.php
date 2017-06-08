@extends("layouts.base")
@section("create")

<body>
  <div class="container-fluid nopaddingleft nopaddingright">
    <div id="resultBox" class="col-md-1 col-lg-10 col-md-offset-1 col-lg-offset-1">
      YOU WON!
    </div>
    <div class="col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 nopaddingleft nopaddingright">
      <div class="row">
      <script type="text/javascript"> var battleData = <?php echo($jsonData); ?>;</script>
        <div class="col-md-3 col-lg-3 firstCharacter nopaddingleft nopaddingright">
          <h1 class="userNameBattle text-center">{{ $character->name }}</h1>
          <p class="levelUser text-center">level: {{ $character->level }}</p>
          <div id ="userOneImage">
          </div>
          <div class="containerSkills text-center">
            <h1>class: {{ $character->class }}</h1>
            <div class="HP">
              <div id="lifePointsUserOne" data-uid="{{ $character->id }}" data-maxhp="{{ $character->hp }}">
              </div>
            </div>
            <p class="hpUser">HP: <span id="userHP" data-uid="{{ $character->id }}"> {{ $character->hp }} </span> / {{ $character->hp }}</p>
            <div class="atkContainer">
              <div class="centererValue">
                <div class="atk">
                  <p>PATK: {{ $character->p_attack }}</p>
                  <p>MATK: {{ $character->m_attack }}</p>
                </div>
                <div class="def">
                  <p>PDEF: {{ $character->p_defence }}</p>
                  <p>MDEF: {{ $character->m_defence }}</p>
                </div>
              </div>
            </div>
            <div class="skillsContainer">
              <!-- <div class="potions" id="potionUserOne">
              </div> -->
              <div class="weaponLeft" id="weaponLeftUserOne">
              </div>
              <div class="weaponRight" id="weaponRightUserOne">
              </div>
              <div class="skill" id="skillUserOne">
              </div>
            </div>
          </div>
        </div>
        <div id="logBox" class="col-md-offset-1 col-md-4 display nopaddingright nopaddingleft">

          <h1 class="titleBattle text-center">BATTLE MODE</h1>
        </div>
        <div class="col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3 secondCharacter nopaddingleft nopaddingright">
          <h1 class="userNameBattle text-center">{{ $opponent->name }}</h1>
          <p class="levelUser text-center">level: {{ $opponent->level }}</p>
          <div id="userTwoImage">
          </div>
          <div class="containerSkills text-center">
            <h1>class: {{ $opponent->class }}</h1>
            <div class="HP text-center">
              <div id="lifePointsUserTwo" data-uid="{{ $opponent->id }}" data-maxhp="{{ $opponent->hp }}">
              </div>
            </div>
            <p class="hpUser">HP:  / {{ $opponent->hp }}</p>
            <div class="atkContainer text-center">
              <div class="atk">
                <p>PATK: {{ $opponent->p_attack }}</p>
                <p>MATK: {{ $opponent->m_attack }}</p>
              </div>
              <div class="def">
                <p>PDEF: {{ $opponent->p_defence }}</p>
                <p>MDEF: {{ $opponent->m_defence }}</p>
              </div>
            </div>
            <div class="skillsContainer">
              <!-- <div class="potions" id="potionUserTwo">
              </div> -->
              <div class="weaponLeft" id="weaponLeftUserTwo">
              </div>
              <div class="weaponRight" id="weaponRightUserTwo">
              </div>
              <div class="skill" id="skillUserTwo">
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/battleRenderer.js') }}"></script>
</body>
@endsection
