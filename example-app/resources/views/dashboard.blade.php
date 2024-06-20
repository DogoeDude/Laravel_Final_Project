<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen flex flex-col">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-600 text-white p-6 flex flex-col">
            <h1 class="text-2xl font-bold mb-8">Dashboard</h1>
            <nav class="flex-1">
                <ul class="space-y-4">
                    <form action="/logout" method="GET">
                        <button class="block py-2 px-4 rounded hover:bg-red-700" name="logout">Logout</button>
                    </form>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6 flex flex-col">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-6 rounded-lg shadow">
                <!-- Add a task -->
                <form id="taskForm" action="{{ route('task.create') }}" method="POST" class="flex items-center space-x-4">
                    @csrf
                    <input type="text" id="taskInput" name="task" placeholder="Today I will..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500 w-96">
                    <input type="text" id="descInput" name="desc" placeholder="Description" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500 w-64">
                    <input type="date" id="dueDateInput" name="due_date" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" value="Add Task">
                </form>

                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
                </div>
            </header>

            <!-- Widgets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6 flex-1 overflow-auto">
                <div class="bg-white p-6 rounded-lg shadow flex-1">
                    <h3 class="text-lg font-semibold mb-4">Pending Tasks</h3>
                    <!-- Iterate over pending tasks -->
                    @foreach($pendingTasks as $task)
                    <div class="border-b py-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800"><span class="font-bold bg-green-200 text-black font-semibold px-2 py-1 inline-block rounded-xl">Title: </span> {{ $task->content }}</p>
                            <p class="text-gray-800"><span class="font-bold px-2 py-1 inline-block rounded-xl">Description: </span>{{ $task->description }}</p>
                            <p class="inline-block {{ $task->finished == 0 ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }} px-2 py-1 rounded-md">{{ $task->finished == 0 ? 'Not yet finished' : 'Finished' }}</p>
                            <p class="text-gray-500">Due Date: {{ $task->due_date ? $task->due_date->format('m-d-Y') : 'Not set' }}</p>
                            <p class="text-gray-500">Created Date: {{ $task->created_at->format('m-d-Y') }}</p>
                        </div>
                        <!-- Action buttons -->
                        <div class="flex flex-col space-y-2">
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 w-32 h-10" onclick="return confirm('Are you sure you want to remove this task?')">Remove Task</button>
                            </form>
                            <form action="{{ route('task.edit', $task->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-700 w-32 h-10">Edit Task</button>
                            </form>
                            <form action="{{ route('task.markFinished', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 w-32 h-10">Task Finished</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- If there are no pending tasks -->
                    @if($pendingTasks->isEmpty())
                    <p>Congrats! You have no pending tasks</p>
                    @endif
                </div>

                <!-- Finished Tasks Section -->
                <div class="bg-white p-6 rounded-lg shadow flex-1">
                    <h3 class="text-lg font-semibold mb-4">Finished Tasks</h3>
                    <!-- Iterate over finished tasks -->
                    @foreach($finishedTasks as $task)
                    <div class="border-b py-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800"><span class="font-bold bg-green-200 text-black font-semibold px-2 py-1 inline-block rounded-xl">Title: </span> {{ $task->content }}</p>
                            <p class="text-gray-800"><span class="font-bold px-2 py-1 inline-block rounded-xl">Description: </span>{{ $task->description }}</p>
                            <p class="inline-block {{ $task->finished == 0 ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }} px-2 py-1 rounded-md"> {{ $task->finished == 0 ? 'Not yet finished' : 'Finished' }}</p>
                            <p class="text-gray-500">Created Date: {{ $task->created_at->format('m-d-Y') }}</p>
                        </div>
                        <!-- Action buttons -->
                        <div class="flex flex-col space-y-2">
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 w-32 h-10" onclick="return confirm('Are you sure you want to remove this task?')">Done Task</button>
                            </form>
                            
                        </div>
                    </div>
                    
                    @endforeach
                    
                    <!-- If there are no finished tasks -->
                    @if($finishedTasks->isEmpty())
                    <p>You have no finished tasks</p>
                    @endif
                </div>
                <!-- Overdue Tasks Section -->
                <div class="bg-white p-6 rounded-lg shadow flex-1">
                    <h3 class="text-lg font-semibold mb-4">Overdue Tasks</h3>
                    <!-- Iterate over finished tasks -->
                    @foreach($overdueTasks as $task)
                    <div class="border-b py-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800"><span class="font-bold bg-green-200 text-black font-semibold px-2 py-1 inline-block rounded-xl">Title: </span> {{ $task->content }}</p>
                            <p class="text-gray-800"><span class="font-bold px-2 py-1 inline-block rounded-xl">Description: </span>{{ $task->description }}</p>
                            <p class="inline-block {{ $task->finished == 0 ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800' }} px-2 py-1 rounded-md">{{ $task->finished == 0 ? 'Overdue!' : 'Finished' }}</p>
                            <p class="text-gray-500">Created Date: {{ $task->created_at->format('m-d-Y') }}</p>
                        </div>
                        <!-- Action buttons -->
                        <div class="flex flex-col space-y-2">
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 w-32 h-10" onclick="return confirm('Are you sure you want to give up this task?')">Give up!</button>
                            </form>
                            
                        </div>
                    </div>
                    
                    @endforeach
                    
                    <!-- If there are no finished tasks -->
                    @if($finishedTasks->isEmpty())
                    <p>You have no overdue tasks.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Form validation
        document.getElementById('taskForm').addEventListener('submit', function(event) {
            var taskInput = document.getElementById('taskInput');
            var descInput = document.getElementById('descInput');
            
            if (taskInput.value.trim() === '') {
                alert('Task title is required.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>
