@extends('layouts.base')

@section('content')
    <h1>{{ $character->name }}</h1>
    <div>{{ $character->fighting_style }}</div>
    <div>{{ $character->nationality }}</div>
    <div>{{ $character->background }}</div>
    <div><img src="{{url('images/'.$character->picture)}}" alt="$character->name"></div>
    <div>{{ $character->notes }}</div>
@endsection
