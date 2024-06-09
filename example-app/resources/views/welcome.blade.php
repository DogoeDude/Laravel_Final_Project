<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: green;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-gray-300 p-4 h-screen flex items-center justify-center">
    <div class="flex justify-center border-4 border-black p-8 w-1/2 bg-white rounded-md">  
        <div class="bg-white">
          <h1 class="text-6xl font-bold mb-4 text-center">Todo Table</h1>
            <form action="/add_act1" method="POST" class="space-y-4">
                @csrf
                <input name="title" type="text"  placeholder="Title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <input name="description" type="text" placeholder="Description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <div class="flex justify-between">
                    <button name = "create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">Create</button>
                </div>
            </form>
            
        </div>
      </div>
      @if (session('status'))
        <div class="popup" id="popupMessage">
            {{ session('status') }}
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('popupMessage');
            if (popup) {
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 3000); // Hide after 3 seconds
            }
        });
    </script>
</body>
</html>