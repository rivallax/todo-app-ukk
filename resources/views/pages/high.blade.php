@extends('layouts.app')
@section('content')
    <div id="content" class="overflow-hidden">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
        <div class="row row-sm">
            {{-- <div class="card"> --}}
                {{-- Jika tidak ada hasil --}}
                @i#c04bc0ts->isEmpty() && $tasks->isEmpty())
                    <div class="d-flex flex-column align-items-center">
                        <p class="fw-bold text-center">Tidak ada hasil yang ditemukan</p>
                    </div>
                @endif
                <div class="card-body overflow-auto" style="max-height: 100vh;">

                    @if ($lists->isEmpty() || !$lists->flatMap->tasks->where('priority', 'high')->isNotEmpty())
                        <div class="d-flex flex-column align-items-center">
                            <p class="fw-bold text-center">Tidak ada tugas dengan prioritas tinggi</p>
                        </div>
                    @else
                        <div class="d-flex gap-3 px-3 flex-nowrap overflow-auto" style="max-height: 100vh;">
                            @foreach ($lists as $list)
                                @php
                                    $filteredTasks = $list->tasks->where('priority', 'high');
                                @endphp

                                @if ($filteredTasks->isNotEmpty())
                                    <div class="card flex-shrink-0 bg-danger-subtle" style="width: 18rem; max-height: 80vh;">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-danger">
                                            <h4 class="card-title text-white">{{ $list->name }}</h4>
                                            <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-trash fs-5 text-white d-block"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="card-body d-flex flex-column gap-2 overflow-auto" style="max-height: 60vh;">
                                            @foreach ($filteredTasks as $task)
                                                <div class="card">
                                                    <div class="card-header d-flex align-items-center justify-content-between">
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                                {{ $task->name }}
                                                            </span>
                                                            <span class="badge bg-pill bg-danger mt-1">
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
                                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-secondary w-100">
                                                                <i class="bi bi-info-circle fs-5"></i>
                                                                <span>Detail</span>
                                                            </a>

                                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm bg-danger text-white w-100">
                                                                    <i class="bi bi-check fs-5"></i>
                                                                    <span>Selesai</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="card-footer d-flex justify-content-between align-items-center">
                                            <p class="card-text">{{ $filteredTasks->count() }} Tugas</p>
                                        </div>
                                        <button type="button" class="btn btn-sm bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                                            <span class="d-flex align-items-center justify-content-center">
                                                <i class="bi bi-plus fs-5"></i>
                                                <span class="position-relative" style="top: -1px;">Add</span>
                                            </span>
                                        </button>
                                    </div>
                                @endif
                            @endforeach

                            <button type="button" class="btn bg-danger flex-shrink-0 me-3 px-1" style="width: 20rem; height: fit-content;"
                                data-bs-toggle="modal" data-bs-target="#addListModal">
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="bi bi-plus fs-5"></i>
                                    <span style="position: relative; top: 0px;">Add</span>
                                </span>
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.modal-add-list')
    @include('partials.modals.modal-add-task')
@endsection
