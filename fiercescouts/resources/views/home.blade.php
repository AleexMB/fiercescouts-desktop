@extends("layouts.base")
@section("create")
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" id="panelHome">
                <div class="panel-heading">Your dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <div class="panel-body">
                    <button type="button" onclick="window.location='{{ route("characters.create") }}'">Create character</button> or
                    <button type="button" onclick="window.location='{{ route("characters.index") }}'">Show your characters</button>
                </div>
                <div class="panel-body">
                    <button type="button" onclick="window.location='{{ route("ladders.index") }}'">Browse ladders</button>
                </div>
                <div class="panel-body">
                    <button type="button" onclick="window.location='{{ route("items.index") }}'">View your items</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
