<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- Title -->
    <h2 class="text-center mb-3">Simple Task Management System</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="text-center mb-3">
            <div class="alert alert-success d-inline-block px-3 py-1" id="successMsg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-primary me-2" onclick="showCreate()">Create</button>
        <button class="btn btn-secondary" onclick="showView()">View</button>
    </div>

    <!-- CREATE SECTION -->
    <div id="createSection" style="display:none;">
        <form method="POST" action="{{ route('tasks.store') }}" class="card p-3 mb-4">
            @csrf

            <input type="text" name="title" class="form-control mb-2" placeholder="Task Title" required>

            <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

            <select name="priority" class="form-control mb-2">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>

            <button class="btn btn-success">Add Task</button>
        </form>
    </div>

    <!-- VIEW SECTION -->
    <div id="viewSection" style="display:none;">
        @foreach($tasks as $task)
            <div class="card mb-3 p-3">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description ?? 'No description' }}</p>
                <p><strong>Priority:</strong> {{ $task->priority }}</p>
                <p>
                    <strong>Status:</strong> 
                    <span class="{{ $task->status == 'Completed' ? 'text-success' : 'text-danger' }}">
                        {{ $task->status }}
                    </span>
                </p>

                <div class="d-flex gap-2 flex-wrap">

                    <!-- Edit -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Complete -->
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Completed">
                        <input type="hidden" name="complete_action" value="1">
                        <button class="btn btn-success btn-sm">Complete</button>
                    </form>

                    <!-- Delete -->
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>

</div>

<!-- JS -->
<script>
function showCreate() {
    document.getElementById('createSection').style.display = 'block';
    document.getElementById('viewSection').style.display = 'none';
}

function showView() {
    document.getElementById('viewSection').style.display = 'block';
    document.getElementById('createSection').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function () {

    let active = "{{ session('active') }}";

    // ✅ Stay on view after actions
    if (active === 'view') {
        showView();
    }

    // ✅ Auto hide success message
    let msg = document.getElementById('successMsg');
    if (msg) {
        setTimeout(() => {
            msg.style.transition = "opacity 0.5s";
            msg.style.opacity = "0";

            setTimeout(() => {
                msg.remove();
            }, 500);

        }, 2000);
    }
});
</script>

</body>
</html>