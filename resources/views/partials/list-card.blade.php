<div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title">{{ $list->name }}</h4>
        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm p-0">
                <i class="bi bi-trash fs-5 text-danger"></i>
            </button>
        </form>
    </div>
    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
        @foreach ($tasks as $task)
            @if ($task->list_id == $list->id)
                @include('partials.task-card', ['task' => $task]) <!-- Panggil Partial Task -->
            @endif
        @endforeach
        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
            <span class="d-flex align-items-center justify-content-center">
                <i class="bi bi-plus fs-5"></i>
                Tambah
            </span>
        </button>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
    </div>
</div>
