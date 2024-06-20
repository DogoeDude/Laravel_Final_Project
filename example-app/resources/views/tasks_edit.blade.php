<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Edit Task</h2>
        <form action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="task" class="block text-gray-700">Task</label>
                <input type="text" id="task" name="task" value="{{ $task->content }}" class="px-4 py-2 border rounded-md w-full focus:outline-none focus:ring focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-gray-700">Description</label>
                <input type="text" id="desc" name="desc" value="{{ $task->description }}" class="px-4 py-2 border rounded-md w-full focus:outline-none focus:ring focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700">Due Date</label>
                <input type="date" id="dueDateInput" name="due_date" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>
