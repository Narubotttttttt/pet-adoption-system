<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-green-700 text-white p-5">
        <h2 class="text-2xl font-bold mb-6">Pet Adoption Admin</h2>

        <ul class="space-y-3">
            <li><a href="/admin/dashboard" class="block p-2 hover:bg-green-600 rounded">Dashboard</a></li>
            <li><a href="/admin/pets" class="block p-2 hover:bg-green-600 rounded">Pets</a></li>
            <li><a href="/admin/adoptions" class="block p-2 hover:bg-green-600 rounded">Adoptions</a></li>
            <li><a href="/admin/users" class="block p-2 hover:bg-green-600 rounded">Users</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 p-6">

        @yield('content')

    </div>

</div>

</body>
</html>