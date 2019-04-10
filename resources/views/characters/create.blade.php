@extends('layouts.base')

@section('content')
    <form method="POST" action="/characters" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div role="alert" class="mb-2">
                <div class="bg-red text-white font-bold rounded-t px-4 py-2">
                    Error:
                </div>
                @foreach ($errors->all() as $error)
                    <div class="border border-t-0 border-red-light rounded-b bg-red-lightest px-4 py-3 text-red-dark">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mb-2">
            <label for="name" class="font-bold">Name: </label>

            <div class="control">
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="name" placeholder="Name" required>
            </div>
        </div>

        <div class="mb-2">
            <label for="fighting_style" class="font-bold">Fighting Style: </label>

            <div class="control">
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="fighting_style" placeholder="Fighting Style" required>
            </div>
        </div>

        <div class="mb-2">
            <label for="nationality" class="font-bold">Nationality: </label>

            <div class="control">
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="nationality" placeholder="Nationality" required>
            </div>
        </div>

        <div class="mb-2">
            <label for="background" class="font-bold">Background: </label>

            <div class="control">
                <textarea cols="80" rows="10" name="background" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
        </div>

        <div class="mb-2">
            <label for="picture" class="font-bold">Picture: </label>

            <div class="control">
                <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="picture" required>
            </div>
        </div>

        <div class="mb-2">
            <label for="notes" class="font-bold">Notes: </label>

            <div class="control">
                <textarea cols="80" rows="10" name="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
        </div>

        <div class="mb-2">
            <div class="control">
                <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-full my-2 w-full">
                    <i class="far fa-plus-square">
                        Create
                    </i>
                </button>
            </div>
        </div>
    </form>
@endsection
