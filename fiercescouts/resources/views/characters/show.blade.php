@extends("layouts.master")
@section("content")

<div class="jumbotron text-center">
    <h2>name: {{ $character->name }}</h2>
    <h3>class: {{ $character->class }}</h3>
    <h3>level: {{ $character->level }}</h3>
    
</div>

@endsection