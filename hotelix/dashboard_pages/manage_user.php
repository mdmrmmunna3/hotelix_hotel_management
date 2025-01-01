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
    <section class="pt-16">
        <h3 class="lg:text-5xl md:text-4xl text-2xl uppercase titel_content text-center">Manage Users</h3>

        <div class="overflow-x-auto">
            <table class="w-full table table-xs md:table-md mb-20 ">
                <thead>
                    <tr
                        class="bg-[--secondary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th
                            class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">
                            Photo
                        </th>
                        <th
                            class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">
                            Name
                        </th>
                        <th
                            class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">
                            Email
                        </th>
                        <th
                            class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">
                            Role
                        </th>
                        <th
                            class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    require_once "db_root.php";

                    $getUsers = $db_root->query("SELECT * FROM users");
                    if ($getUsers->num_rows > 0) {
                        while ($row = $getUsers->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $role = $row['role'];
                            $photo = $row['photo'];
                            $photo_mime = $row['mime_type'];
                            echo "
                                <tr class=' text-xs md:text-sm text-center'>
                                    <td class='p-3'>
                                        <div class='flex justify-center items-center'>
                                            <img class='h-10 w-10 object-cover rounded-full' 
                                                src='data:$photo_mime;base64," . base64_encode($photo) . "' alt='User Photo'>
                                        </div>
                                    </td>
                                    <td class='p-2 md:p-4'>$name</td>
                                    <td class='p-2 md:p-4 break-all line-clamp-2'>$email</td>
                                    <td class='p-2 md:p-4'>$role</td>
                                    <td class='p-3 flex justify-center gap-x-2'>
                                        <button class='px-3 py-1 rounded-md text-xs md:text-sm border border-blue-500 font-medium 
                                                        hover:text-white hover:bg-blue-500 transition duration-150'>
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </button>
                                        <button class='px-3 py-1 rounded-md text-xs md:text-sm border border-red-500 font-medium 
                                                        hover:text-white hover:bg-red-500 transition duration-150'>
                                            <i class='fa-solid fa-trash-can'></i>
                                        </button>
                                    </td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "Users not found";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </section>

</body>

</html>