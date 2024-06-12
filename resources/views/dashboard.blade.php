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
            <h1 class="text-2xl font-bold mb-8">To do list</h1>
            <nav>
                <ul class="space-y-4">
                    <form action="/logout">
                        <button class="block py-2 px-4 rounded hover:bg-red-700" name = "logout" method = "GET">Logout</button>
                    </form>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-6 rounded-lg shadow">

                <!-- Add a task -->
                <form action = "{{ route('task.create') }}"method="post">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" name = 'task' placeholder="Today I will..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                        <input type ="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" value="Add Task"></input>
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
                    <div class="border-b py-2">
                        <p class="text-gray-800">{{ $task->content }}</p>
                        <p class="text-gray-500">{{ $task->finished == 0 ? 'Not yet finished' : 'Finished' }}</p>
                        <p class="text-gray-500">Created Date: {{ $task->created_at->format('m-d-Y') }}</p>
                        <!-- You can add more details like 'created_at', 'updated_at', etc. here if needed -->
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
</body>
</html>
