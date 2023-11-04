@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task </a>
    </nav>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['task' => $task->id]) }}"
                    @class(['line-through' => $task->completed])> {{ $task->title }} </a>
            </div>

            <hr />
        @empty
            I don't have any tasks!
        @endforelse

        @if ($tasks->count())
            <div> {{ $tasks->links() }}</div>
        @endif
    </div>
@endsection
