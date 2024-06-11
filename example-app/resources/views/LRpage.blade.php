<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login::CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-300 p-4 h-screen flex items-center justify-center">
    <div class="flex justify-center border-4 border-black p-8 w-1/2 bg-white rounded-xl">
        <div class="bg-white">
            <h1 class="text-6xl font-bold mb-4 text-center">CRUD</h1>
            <div class="bg-white">
                <form action="/login" method="POST" class="space-y-4">
                    @csrf
                    <input name="email" type="text" placeholder="Email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <input name="password" type="password" placeholder="Password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    <div class="flex justify-between">
                        <button name="login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Login</button>
                    </div>
                </form>
                <div style="margin-top: 4px;"></div>
                <form action="/view_form" method="GET" class="space-y-2">
                    @csrf
                    <button name="view_form" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Register?</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
