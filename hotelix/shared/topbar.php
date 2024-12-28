<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-gray-800 p-4 flex items-center justify-between fixed z-30 w-full">
        <div class="flex items-center">
            <button onclick="toggleSidebar()" class="text-white lg:hidden mr-4">☰</button>
            <h1 class="text-2xl font-bold">HotelAir</h1>
        </div>
        <input type="text" placeholder="Search..." class="hidden sm:block bg-gray-700 text-white px-4 py-2 rounded" />
        <div class="flex items-center space-x-4">
            <button class="bg-gray-700 p-2 rounded">🔔</button>
            <button class="bg-gray-700 p-2 rounded">🌙</button>
            <!-- <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full" /> -->
        </div>
    </div>


</body>

</html>