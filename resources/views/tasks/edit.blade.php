<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Task</h2>

    <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="card p-4">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
        </div>

        <!-- Priority -->
        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-control">
                <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button class="btn btn-primary">Update Task</button>
    </form>
</div>

</body>
</html>