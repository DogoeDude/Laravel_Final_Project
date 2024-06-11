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
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Profile</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Settings</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Messages</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
                </div>
            </header>

            <!-- Widgets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 1</h3>
                    <p>Content goes here...</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 2</h3>
                    <p>Content goes here...</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 3</h3>
                    <p>Content goes here...</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 4</h3>
                    <p>Content goes here...</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 5</h3>
                    <p>Content goes here...</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Widget 6</h3>
                    <p>Content goes here...</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
