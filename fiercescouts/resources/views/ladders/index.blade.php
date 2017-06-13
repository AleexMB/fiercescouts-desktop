@extends("layouts.base")
@section("create")
<style>
    #scrollableTab {
        overflow: scroll;
        height: 80vh;
    }

    #titleCenter {
        z-index: -1;
    }
</style>
<div id="scrollableTab">
  <div id="titleCenter" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
    <h1>TOP 10 BY VICTORY POINTS</h1>
  </div>
  <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
    <table class="table" id="tableLadders">
     <thead>
     
         <tr>
             <td>GRADE</td>
             <td>NAME</td>
             <td class="laddersY">LEVEL</td>
             <td class="laddersG">WON</td>
             <td class="laddersR">LOST</td>
             <td>VICTORY POINTS</td>
         </tr>
     </thead>
     <tbody>
     <?php $i = 1; ?>
     @foreach($ranks as $key => $value)
          
         <tr>
             <td>{{ $i }}</td>
             <td><a class="linkNoStyle" href="{{ URL::to('characters/' . $value->id) }}">{{ $value->name }}</a></td>
             <td class="laddersY">{{ $value->level }}</td>
             <td class="laddersG">{{ $value->battle_won }}</td>
             <td class="laddersR">{{ $value->battle_lost }}</td>
             <td>{{ $value->victory_points }}</td>
         </tr>
          <?php $i++; ?>
     @endforeach
     </tbody>
    </table>
  </div>
  </div>
@endsection
