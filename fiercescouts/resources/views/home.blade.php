@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <div class="panel-body">
                    <button type="button" onclick="window.location='{{ route("characters.create") }}'">Create character</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
