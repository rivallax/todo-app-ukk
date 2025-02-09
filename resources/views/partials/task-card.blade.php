<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column justify-content-center gap-2">
                <a href="{{ route('tasks.show', $task->id) }}" 
                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                    {{ $task->name }}
                </a>
                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                    {{ $task->priority }}
                </span>
            </div>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm p-0">
                    <i class="bi bi-x-circle text-danger fs-5"></i>
                </button>
            </form>
        </div>
    </div>
</div>
