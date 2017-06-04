@extends("layouts.base")
@section("create")


<body>
  <div class="container-fluid nopaddingleft nopaddingright">
    <div class="col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 nopaddingleft nopaddingright">
      <div class="row">
        <div class="col-md-3 col-lg-3 firstCharacter nopaddingleft nopaddingright">
          <h1 class="userNameBattle text-center">USERNAME1</h1>
          <p class="levelUser text-center">LEVEL 9</p>
          <div id ="userOneImage">
          </div>
          <div class="containerSkills text-center">
            <h1>MONK</h1>
            <div class="HP">
              <div id="lifePointsUserOne">
              </div>
            </div>
            <p class="hpUser">HP 100/200</p>
            <div class="atkContainer">
              <div class="centererValue">
                <div class="atk">
                  <p>ATTACK:...</p>
                  <p>MAGIC ATTACK:...</p>
                </div>
                <div class="def">
                  <p>DEF:...</p>
                  <p>MAGIC DEF:...</p>
                </div>
              </div>
            </div>
            <div class="skillsContainer">
              <div class="potions" id="potionUserOne">
              </div>
              <div class="weaponLeft" id="weaponLeftUserOne">
              </div>
              <div class="weaponRight" id="weaponRightUserOne">
              </div>
              <div class="skill" id="skillUserOne">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-offset-1 col-md-4 display nopaddingright nopaddingleft">
          <h1 class="titleBattle text-center">BATTLE MODE</h1>
        </div>
        <div class="col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3 secondCharacter nopaddingleft nopaddingright">
          <h1 class="userNameBattle text-center">USERNAME1</h1>
          <p class="levelUser text-center">LEVEL 9</p>
          <div id="userTwoImage">
          </div>
          <div class="containerSkills text-center">
            <h1>MONK</h1>
            <div class="HP text-center">
              <div id="lifePointsUserTwo">
              </div>
            </div>
            <p class="hpUser">HP 100/200</p>
            <div class="atkContainer text-center">
              <div class="atk">
                <p>ATTACK:...</p>
                <p>MAGIC ATTACK:...</p>
              </div>
              <div class="def">
                <p>DEF:...</p>
                <p>MAGIC DEF:...</p>
              </div>
            </div>
            <div class="skillsContainer">
              <div class="potions" id="potionUserTwo">
              </div>
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
</body>
@endsection
