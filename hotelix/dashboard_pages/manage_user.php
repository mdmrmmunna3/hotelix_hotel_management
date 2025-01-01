<?php 
    require_once "db_root.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage users</title>
     <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="pt-20">

    <h3 class="text-6xl">manageUsers</h3>
    <table class="min-w-full divide-y divide-gray-200">
    <thead>
       <tr class="bg-[--secondary-color] border-b border-gray-200">
            <th class="px-6 py-3 text-left text-xs font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Photo</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Role</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Action</th>
        </tr>

    </thead>
    <tbody class="bg-[--primary-color] divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                    </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">Jane Doe</td>
            <td class="px-6 py-4 whitespace-nowrap">jane@example.com</td>
            <td class="px-6 py-4 whitespace-nowrap">Admin</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <button class="px-4 py-2 border border-blue-500 font-medium rounded-md hover:text-white hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out">Edit</button>
                <button class="ml-2 px-4 py-2 border border-blue-500 font-medium hover:text-white  rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red transition duration-150 ease-in-out hover:border-red-500">Delete</button>
            </td>
        </tr>
       
    </tbody>
</table>
    </section>
</body>
</html>