@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div>
        @forelse ($tasks as $task)
            <div> <a href="{{ route('task.show', ['id' => $task->id]) }}"> {{ $task->title }} </a> </div>

            <hr />
        @empty
            I don't have any tasks!
        @endforelse
    </div>
@endsection
