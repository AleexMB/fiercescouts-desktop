@extends("layouts.base")
@section("create")

<div class="container">
  <div class="col-md-12">
    <div class="boxProfile">
      <div class="profileName">
        <p>{{ $character->name }} - {{ $character->class }}</p>
      </div>
      <div class="col-md-12 pointsBox">
        <div class="col-md-4 points" id="experienceProfile">
          <p>ESPERIENCE: {{ $character->exp }}</p>
        </div>
        <div class="col-md-4 points" id="levelProfile">
          <p>LEVEL: {{ $character->level }}</p>
        </div>
        <div class="col-md-4 points" id="matchWinProfile">
          <p>WINMATCH: {{ $character->victory_points }}</p>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-6 ">
          @if ($character->gender == "M")
                @if ($character->class == "warrior")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/male_warrior.png')}}" alt="character"></td>
                @elseif ($character->class == "mage")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/male_mage.png')}}" alt="character""></td>
                @elseif ($character->class == "assassin")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/male_assassin.png')}}" alt="character"></td>
                @elseif ($character->class == "demon")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/male_demon.png')}}" alt="character"></td>
                @elseif ($character->class == "monk")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/male_monk.png')}}" alt="character"></td>
                @endif
            @else
                @if ($character->class == "warrior")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/female_warrior.png')}}" alt="character""></td>
                @elseif ($character->class == "mage")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/female_mage.png')}}" alt="character"></td>
                @elseif ($character->class == "assassin")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/female_assassin.png')}}" alt="character"></td>
                @elseif ($character->class == "demon")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/female_demon.png')}}" alt="character"></td>
                @elseif ($character->class == "monk")
                    <td><img class="img-responsive profileImage text-center" src="{{URL::asset('/images/characters/female_monk.png')}}" alt="character"></td>
                @endif
            @endif
        </div>
        <div class="col-md-6 nopaddingleft nopaddingright text-center">
          <div class="skills">
            <div class="skillProfile" id="userSkill">
              <p>SKILL</p>
              <div class="imgSkillsProfile">
              </div>
            </div>
            <div class="skillProfile" id="weaponLeftProfile">
              <p>WEAPON LEFT</p>
              <div class="imgSkillsProfile">
                @if ($itemL)
                  <img src="{{ URL::asset('/images/items/' . $itemL->img . '.png') }}">
                @endif
              </div>
            </div>
            <div class="skillProfile" id="weaponRightProfile">
              <p>WEAPON RIGHT</p>
              <div class="imgSkillsProfile">
                @if ($itemR)
                  <img src="{{ URL::asset('/images/items/' . $itemR->img . '.png') }}">
                @endif
              </div>
            </div>
          </div>
          <div class="atkProfile">
            <div class="statisticsAttkProfile" id="atk">
              <p>ATK: {{ $character->p_attack }}</p>
            </div>
            <div class="statisticsAttkProfile" id="def">
              <p>DEF: {{ $character->p_defence }}</p>
            </div>
            <div class="statisticsAttkProfile" id="magAtk">
              <p>MATK: {{ $character->m_attack }}</p>
            </div>
            <div class="statisticsAttkProfile" id="magDef">
              <p>MDEF: {{ $character->m_defence }}</p>
            </div>
          </div>
          <div class="userHp text-center">
            <p>HP: <spandata-uid="{{ $character->id }}">{{ $character->hp }}</span> </p>
            <div class="lifePointsProfile">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
