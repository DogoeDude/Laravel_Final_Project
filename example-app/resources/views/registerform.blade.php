<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register::CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <style>
        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }

        /* Styling for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 5px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100 p-4 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Register</h1>
        <form action="/register_user" method="POST" class="space-y-4" id="registerForm">
            @csrf
            <!-- First Name -->
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="firstname" id="firstname" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>
            <!-- Last Name -->
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>
            <!-- Register Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Registration Successful!</h2>
            <p>You have successfully registered.</p>
        </div>
    </div>

    <script>
        // Function to show the modal
        function register() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            setTimeout(closeModal, 5000);
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // Event listener for form submission
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var form = event.target;
            var inputs = form.querySelectorAll('input[required]');
            var isEmpty = false;

            inputs.forEach(function(input) {
                if (!input.value) {
                    isEmpty = true;
                    input.classList.add('border-red-500'); // Add red border to empty fields
                } else {
                    input.classList.remove('border-red-500'); // Remove red border if field is filled
                }
            });

            if (!isEmpty) {
                // If form is valid (no empty required fields), show the modal
                register();
            } else {
                event.preventDefault(); // Prevent form submission
                alert('Please fill in all required fields.'); // Show alert for empty fields
            }
        });
    </script>
</body>
</html>
