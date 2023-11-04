@extends('layouts.app')

@section('styles')
    <style>
        .error-message {
            font-size: 10px;
            color: red;
        }
    </style>
@endsection
@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.post') }}">
        @csrf
        @isset($task)
            @method('put')
        @endisset
        <div>
            <label for="title"> Title</label>
            <input id="title" name="title" type="text" value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description"> Description</label>
            <textarea id="description" name="description">{{ $task->description ?? old('description') }} </textarea>
            @error('description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description"> Long Description</label>
            <textarea id="long_description" name="long_description"> {{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">
                @isset($task)
                    Update
                @else
                    Add Task
                @endisset
            </button>
        </div>
    </form>

@endsection
