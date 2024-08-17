<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-lg font-semibold">Brand</a>
            <div class="space-x-4">
                <a href="index.php" class="text-white hover:text-blue-200">Login</a>
                <a href="register.php" class="text-white hover:text-blue-200">Signup</a>
                <a href="profile.php" class="text-white hover:text-blue-200">profile</a>

            </div>
        </div>
    </nav>

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">

        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Login</h1>

            <form action="../index.php" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="text" name="email" id="email"
                        class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                    <input type="password" name="password" id="password"
                        class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <small class="text-red-500 block mb-4">
                    <?= isset($errors["invalid"]) ? $errors["invalid"] : ""; ?>
                </small>
                <input type="submit" value="login" name="login"
                    class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 cursor-pointer">
            </form>
        </div>
    </div>
</body>

</html>