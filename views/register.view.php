<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 ">
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
    <div class="flex items-center justify-center min-h-screen">

        <form action="../register.php" method="post"
            class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                <input type="text" name="name" id="name"
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-blue-600 focus:outline-none"
                    value="<?= isset($data['name']) ? $data['name'] : "" ?>">
                <small class="text-red-500">
                    <?= isset($errors['name']) ? $errors['name'] : "" ?>
                </small>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                <input type="email" name="email" id="email"
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-blue-600 focus:outline-none"
                    value="<?= isset($data['email']) ? $data['email'] : "" ?>">
                <small class="text-red-500">
                    <?= isset($errors['email']) ? $errors['email'] : "" ?>
                </small>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password:</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-blue-600 focus:outline-none"
                    value="<?= isset($data['password']) ? $data['password'] : "" ?>">
                <small class="text-red-500">
                    <?= isset($errors['password']) ? $errors['password'] : "" ?>
                </small>
            </div>

            <div class="mb-4">
                <label for="confirmPassword" class="block text-gray-700 font-semibold">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword"
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-blue-600 focus:outline-none"
                    value="<?= isset($data['confirmPassword']) ? $data['confirmPassword'] : "" ?>">
                <small class="text-red-500">
                    <?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : "" ?>
                </small>
            </div>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-semibold">user name</label>
                <input type="text" name="username" id="username"
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <small class="text-red-500">
                    <?= isset($errors['username']) ? $errors['username'] : "" ?>
                </small>
            </div>

            <div class="flex items-center justify-between">
                <input type="submit" value="Submit" name="submit"
                    class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 cursor-pointer">
                <input type="reset" value="Reset"
                    class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500 cursor-pointer">
            </div>
        </form>
    </div>
</body>

</html>