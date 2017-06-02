@extends("layouts.base")
@section("create")


<h1>bcbwc</h1>
<div class="jumbotron text-center">
    <h2>name: {{ $character->name }}</h2>
    <h3>class: {{ $character->class }}</h3>
    <h3>level: {{ $character->level }}</h3>
</div>
