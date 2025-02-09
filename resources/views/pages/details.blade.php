@include('partials.badge', ['class' => $task->priorityClass, 'text' => $task->priority])
@include('partials.badge', ['class' => $task->status ? 'success' : 'danger', 'text' => $task->status ? 'Selesai' : 'Belum Selesai'])
