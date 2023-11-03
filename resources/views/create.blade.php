@extends('layouts.app')

@section('styles')
    <style>
        .error-message {
            font-size: 10px;
            color: red;
        }
    </style>
@endsection
@section('title', 'Add Task')


@section('content')


    <form method="POST" action="{{ route('tasks.post') }}">
        @csrf
        <div>
            <label for="title"> Title</label>
            <input id="title" name="title" type="text" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description"> Description</label>
            <textarea id="description" name="description"> </textarea>
            @error('description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description"> Long Description</label>
            <textarea id="long_description" name="long_description"> </textarea>
            @error('long_description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </div>
    </form>

@endsection
