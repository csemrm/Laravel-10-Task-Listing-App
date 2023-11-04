@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.post') }}">
        @csrf
        @isset($task)
            @method('put')
        @endisset
        <div>
            <label for="title"> Title</label>
            <input id="title" name="title" type="text" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description"> Description</label>
            <textarea id="description" name="description" @class(['border-red-500' => $errors->has('description')])>
                {{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
                <p class="error"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description"> Long Description</label>
            <textarea id="long_description" name="long_description" @class(['border-red-500' => $errors->has('long_description')])> {{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error"> {{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn">
                @isset($task)
                    Update
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="btn link items-center justify-between">Cancel</a>
        </div>
    </form>

@endsection
