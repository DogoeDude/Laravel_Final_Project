<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white p-6">
            <h1 class="text-2xl font-bold mb-8">Dashboard</h1>
            <nav>
                <ul class="space-y-4">
                    <form action="/logout" method="GET">
                        <button class="block py-2 px-4 rounded hover:bg-red-700" name="logout">Logout</button>
                    </form>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-6 rounded-lg shadow">
                <!-- Add a task -->
                <form id="taskForm" action="{{ route('task.create') }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" id="taskInput" name="task" placeholder="Today I will..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500 w-96">
                        <input type="text" id="descInput" name="desc" placeholder="Description" class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500 break-words w-full">
                        
                        <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" value="Add Task">
                    </div>
                </form>

                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
                </div>
            </header>

            <!-- Widgets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Pending Tasks</h3>
                    <!-- Iterate over tasks -->
                    @foreach($tasks as $task)
                    <div class="border-b py-2 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800"><span class="font-bold bg-green-200 text-black font-semibold px-2 py-1 inline-block rounded-xl">Title: </span> {{ $task->content }}</p>
                            <p class="text-gray-800"><span class="font-bold px-2 py-1 inline-block rounded-xl">Description: </span>{{ $task->description }}</p>
                            <p class="text-gray-500">{{ $task->finished == 0 ? 'Not yet finished' : 'Finished' }}</p>
                            <p class="text-gray-500">Created Date: {{ $task->created_at->format('m-d-Y') }}</p>
                        </div>
                        <!-- Remove button -->
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 w-32 h-10" onclick="return confirm('Are you sure you want to remove this task?')">Remove Task</button>
                        </form>
                    </div>
                    @endforeach
                    
                    <!-- If there are no tasks -->
                    @if($tasks->isEmpty())
                    <p>Congrats! You have no pending tasks</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to adjust the input field width dynamically
        document.getElementById('descInput').addEventListener('input', function() {
            this.style.width = ((this.value.length + 1) * 8) + 'px';
        });

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
