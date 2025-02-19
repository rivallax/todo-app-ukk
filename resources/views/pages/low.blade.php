@extends('layouts.app')
@section('content')
    <div id="content" class="overflow-hidden">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
        <div class="row row-sm"
            {{-- <div class="card"> --}}
                
                <div class="card-body overflow-auto  " style="max-height: 100vh;">

                    @if ($lists->isEmpty())
                        <div class="d-flex flex-column align-items-center">
                            <p class="fw-bold text-center">Belum ada tugas yang diAddkan</p>
                            <button type="button" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#addListModal">
                                <i class="bi bi-plus-square fs-3"></i> Add
                            </button>
                        </div>
                    @endif

                    <div class="d-flex gap-4 px-4 flex-nowrap " style="max-height: 100vh;">
                        @foreach ($lists as $list)
                            <div class="card flex-shrink-0 bg-info-subtle" style="width: 18rem; max-height: 80vh;">
                                <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                    <h4 class="card-title">{{ $list->name }}</h4>
                                    <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm p-0">
                                            <i class="bi bi-trash fs-5 d-block"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body d-flex flex-column gap-2 overflow-auto" style="max-height: 60vh;">
                                    @foreach ($list->tasks as $task)
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                <div class="d-flex flex-column">
                                                    <span
                                                        class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                        {{ $task->name }}
                                                    </span>
                                                    <span
                                                        class="badge bg-pill bg-{{ $task->priorityClass ?? 'secondary' }} mt-1">
                                                        {{ $task->priority }}
                                                    </span>
                                                </div>

                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm">
                                                        <i class="bi bi-x-circle fs-5 text-danger d-block"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @if (!$task->is_completed)
                                                <div class="card-footer d-flex flex-column gap-2">
                                                    <!-- Tombol Detail -->
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-secondary w-100">
                                                        <i class="bi bi-info-circle fs-5" style="position: relative; top: 1px;"></i>
                                                        <span style="position: relative; top: -2px;">Detail</span>
                                                    </a>
                                                    
                                                    <!-- Tombol Selesai -->
                                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm bg-info w-100">
                                                            <i class="bi bi-check fs-5"></i>
                                                            <span style="position: relative; top: -3px;">Done</span>
                                                        </button>
                                                    </form>
                                                    
                                                    
                                                </div>
                                            @endif

                                        </div>
                                    @endforeach

                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                                </div>
                                <button type="button" class="btn btn-sm bg-info" data-bs-toggle="modal"
                                    data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-plus fs-5"></i>
                                        <span class="position-relative" style="top: -1px;">Add</span>
                                    </span>
                                    
                                </button>
                            </div>
                            @endforeach
                            {{-- ini buton yang kanan --}}
                            @if ($lists->count() != 0)
                            <button type="button" class="btn bg-info flex-shrink-0 me-3 px-1" style="width: 20rem; height: fit-content;"
                            data-bs-toggle="modal" data-bs-target="#addListModal">
                        
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus fs-5"></i>
                                    <span style="position: relative; top: 0px;">Add</span>
                                </span>
                            </button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-add-list')
   @include('partials.modals.modal-add-task')
    </div>
@endsection
