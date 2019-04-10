@extends('layouts.base')

@section('content')
    <h1>Characters</h1>
    <ul>
        @forelse ($characters as $character)
            <li>
                <a href="{{ $character->path() }}">{{ $character->name }}</a>
            </li>
        @empty
            <li>No characters yet.</li>
        @endforelse
    </ul>
@endsection
