@extends("layouts.base")
@section("create")

<style>
 .littleP{
    font-size: 18pt;
 }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="containerUserChest">
        <p class="chestNumber">YOUR NEW ITEM: <br /><span class="{{ 'itemName' . $item->rarity }}">{{ $item->name }}</span></p>
        <p class="chestNumber">
        <img src="{{ URL::asset('/images/items/' . $item->img . '.png') }}" id="showItem">
        </p>
        <p class="chestNumber littleP">
           ITEM LEVEL: {{ $item->itemlv }}
        </p>
        <p class="chestNumber littleP">
            HP: {{ $item->hp }} / PATK: {{ $item->p_attack }} / MATK: {{ $item->m_attack }}
        </p>
        <p class="chestNumber littleP">
            PDEF: {{ $item->p_defence }} / MDEF: {{ $item->m_defence }}
        </p>
        <p class="chestNumber">
            <a class="openBtn" href="{{ URL::to('/items/create') }}">OPEN ANOTHER</a>
        </p>
        

      </div>
    </div>
  </div>


@endsection
