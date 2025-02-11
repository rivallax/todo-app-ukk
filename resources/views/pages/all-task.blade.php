@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Tasks</h1>

        @if ($tasks->isEmpty())
            <p>No tasks available.</p>
        @else
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $task->name }}
                        <span class="badge bg-{{ $task->is_completed ? 'success' : 'warning' }}">
                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
