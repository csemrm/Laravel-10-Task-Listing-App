@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('tasks.index') }}" class="mb-4 font-medium text-gray-700 underline decoration-gray-500"> <- Go to
                back to the task list </a>

    </div>
    <p class="mb-4 text-slate-700 "> {{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700 "> {{ $task->long_description }}</p>
    @endif

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif

    </p>

    <p class="mb-4 text-sm text-slate-500">Created: {{ $task->created_at->diffForHumans() }} . Updated:
        {{ $task->updated_at->diffForHumans() }}</p>

    <div class="flex gap-2">
        <a href="{{ route('task.edit', ['task' => $task]) }}" class="btn">Edit </a>


        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">Mark as {{ !$task->completed ? 'completed' : 'not completed' }}</button>
        </form>

        <form method="POST" action="{{ route('tasks.delete', ['task' => $task]) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
