@extends("layouts.base")
@section("create")
<style>
    #scrollableTab {
        overflow: scroll;
        height: 80vh;
    }
</style>
<div id="scrollableTab">
<div class="col-lg-8 col-lg-offset-2 itemGrid">
@foreach($items as $key => $value)
    <div class="itemCard">        
        <!-- <div class="itemsStatsBox">
        </div> -->


            <img class="{{ 'itemImg' . $value->rarity }}" src="{{ URL::asset('/images/items/' . $value->img . '.png') }}">
            
            <br />
            <p class="itemName">{{ $value->name }}</p>

            <p class="itemStats">Item Level: {{ $value->itemlv }}</p>
            <!-- <p class="itemStats">Hp: {{ $value->itemlv }}</p>
            <p class="itemStats">Patk: {{ $value->p_attack }}</p>
            <p class="itemStats">Matk: {{ $value->m_attack }}</p>
            <p class="itemStats">Pdef: {{ $value->p_defence }}</p>
            <p class="itemStats">Mdef: {{ $value->m_defence }}</p> -->

            
            <a class="btn btn-small btn-success equipR" href="{{ URL::to('items/equipR/' . $value->id) }}">R</a>
            <a class="btn btn-small btn-success equipL" href="{{ URL::to('items/equipL/' . $value->id) }}">L</a>

        
        
    </div>

            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('items/equipR/' . $value->id) }}">Equip Item to R</a>
            <a class="btn btn-small btn-success" href="{{ URL::to('items/equipL/' . $value->id) }}">Equip Item to L</a>
        </td>
    </tr> -->
@endforeach
</div>
</div>


<!-- <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('items/equipR/' . $value->id) }}">Equip Item to R</a>
                <a class="btn btn-small btn-success" href="{{ URL::to('items/equipL/' . $value->id) }}">Equip Item to L</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table> -->
@endsection
