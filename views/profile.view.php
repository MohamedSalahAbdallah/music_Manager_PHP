<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md text-center">
            <img src="<?= $_SESSION["photo"] ?>" alt="Profile Picture"
                class="w-32 h-32 object-cover rounded-full mx-auto mb-4 border-4 border-blue-500">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Hello, <?= $_SESSION["name"] ?>!</h1>
            <p class="text-gray-600 mb-2">Email: <?= $_SESSION["email"] ?></p>
            <p class="text-gray-600 mb-4">Name: <?= $user->userName ?></p>
        </div>
    </div>
</body>

</html>