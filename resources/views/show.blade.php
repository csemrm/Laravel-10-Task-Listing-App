@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p> {{ $task->description }}</p>

    @if ($task->long_description)
        <p> {{ $task->long_description }}</p>
    @endif
    <p> {{ $task->completed ? 'Completed' : 'Not completed' }} </p>
    <p> {{ $task->created_at }}</p>
    <p> {{ $task->updated_at }}</p>

    <div>
        <a href="{{ route('task.edit', ['task' => $task]) }}">Edit </a>
    </div>

    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit">Mark as {{ $task->completed ? 'completed' : 'not completed' }}</button>
    </form>

    <form method="POST" action="{{ route('tasks.delete', ['task' => $task]) }}">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
@endsection
