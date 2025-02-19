@extends('layouts.app')

@section('content')
    <div id="content" class="container text-dark">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
        @endif

        <div class="row my-3">
            <div class="col-md-12">
                <div class="card h-100 bg-white text-dark">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h3 class="fw-bold fs-4 text-truncate mb-0 text-uppercase" style="max-width: 100%">

                            {{ $task->name }}
                        </h3>
                        <button class="btn btn-sm btn-outline-primary p-10" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square fs-5 d-block"></i>
                        </button>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="list_id" class="form-label">Pindahkan ke List</label>
                                <select class="form-select text-dark bg-light" name="list_id" id="list_id"
                                    onchange="this.form.submit()">
                                    @foreach ($lists as $list)
                                        <option value="{{ $list->id }}"
                                            {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                            {{ $list->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <hr>
                        <h6 class="text-uppercase text-muted">Description</h6>
                        <div class="description-box">
                            <textarea class="form-control bg-light text-dark border-0 py-5" placeholder="Add a more detailed description..."
                                rows="3" readonly>{{ $task->description }}</textarea>
                        </div>

                     

                        <h6 class="fs-6 px-2 py-2">
                            Prioritas:
                            <span class="badge bg-primary">{{ $task->priority }}</span>
                        </h6>
                    </div>

                    <div class="card-footer d-flex justify-content-between bg-light">
                        <div class="d-flex gap-2 w-100">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>

                            <a href="{{ route('all-task') }}" class="btn btn-outline-secondary w-50">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>

                        </div>

                    </div>
                    <!-- Tombol Selesai dengan margin -->
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm bg-danger w-100">
                            <i class="bi bi-check fs-5"></i>
                            <span style="position: relative; top: -3px;">Selesai</span>
                        </button>
                    </form>


                </div>
            </div>

            <!-- Modal Edit Task -->
            <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-light">
                            <h5 class="modal-title text-dark" id="editTaskModalLabel">Edit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-white text-dark">
                            <input type="hidden" name="list_id" value="{{ $task->list_id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" id="name" name="name"
                                    value="{{ $task->name }}" placeholder="Masukkan nama list">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control text-dark bg-light" name="description" id="description" rows="3"
                                    placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">Prioritas</label>
                                <select class="form-select text-dark bg-light" name="priority" id="priority">
                                    <option value="low" @selected($task->priority == 'low')>Low</option>
                                    <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                                    <option value="high" @selected($task->priority == 'high')>High</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
