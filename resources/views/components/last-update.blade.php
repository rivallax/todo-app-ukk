@props(['priority'])

@php
    $lastUpdatedTask = \App\Models\Task::where('priority', $priority)
                        ->latest('updated_at')->first();
@endphp

<li>
    <strong>Update Time </strong>
    <span>
        {{ $lastUpdatedTask?->updated_at->diffForHumans() ?? 'No updates yet' }}||({{ ucfirst($priority) }})
    </span>
</li>
