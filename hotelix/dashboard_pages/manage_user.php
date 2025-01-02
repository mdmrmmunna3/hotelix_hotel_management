<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="pt-16">
        <h3 class="lg:text-5xl md:text-4xl text-2xl uppercase titel_content text-center">Manage Users</h3>

        <div class="overflow-x-auto">
            <table class="w-full table table-xs md:table-md mb-20">
                <thead>
                    <tr class="bg-[--secondary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Photo</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Name</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Email</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Role</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Action</th>
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
                                                        hover:text-white hover:bg-blue-500 transition duration-150' 
                                                        onclick=\"openUpdateModal('updateModel', $id, '$name', '$email', '$role')\">
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </button>
                                        <button class='px-3 py-1 rounded-md text-xs md:text-sm border border-red-500 font-medium 
                                                        hover:text-white hover:bg-red-500 transition duration-150' 
                                                        onclick=\"openModal('modelConfirm', $id, '$name')\">
                                            <i class='fa-solid fa-trash-can'></i>
                                        </button>
                                    </td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "Users not found";
                    }

                    if(isset($_POST['updateUserBtn'])) {
                        $updateRole = $_POST['role'];
                        $updateId = $_POST['userId'];
                        
                        $update_user = $db_root->query("update users set role = '$updateRole' where id = '$updateId'");
                        if($update_user) {
                            header('location:manage_user.php');
                        }else {
                            echo "user not update";
                        }

                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Update Modal -->
        <div id="updateModel" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('updateModel')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <h3 class="text-xl font-normal text-gray-500 mb-6">Update User Details</h3>
                    <form id="updateUserForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                        <input type="hidden" id="updateUserId" name="userId" />
                        <div class="mb-4">
                            <label for="updateRole" class="block text-left">Role</label>
                            <select id="updateRole" name="role" class="w-full px-3 py-2 mt-2 border rounded-md">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="flex justify-center gap-x-2 mt-4">
                            <button type="submit" name="updateUserBtn" class="text-white bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded-md">
                                Update User
                            </button>
                            <button type="button" onclick="closeModal('updateModel')"
                                class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 px-4 py-2 rounded-md">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('modelConfirm')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this <span id="deleteUserName"></span>?</h3>
                    <a href="#" id="deleteConfirm"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </a>
                    <a href="#" onclick="closeModal('modelConfirm')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                        No, cancel
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Open Update Modal
        window.openUpdateModal = function(modalId, userId, name, email, role) {
            document.getElementById(modalId).style.display = 'block';
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
            
            // Populate form with user data
            document.getElementById('updateUserId').value = userId;
            document.getElementById('updateRole').value = role;
        }

        // Open Delete Confirmation Modal
        window.openModal = function(modalId, userId, name) {
            document.getElementById(modalId).style.display = 'block';
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
            
            // Store userId for deletion
            document.getElementById('deleteConfirm').setAttribute('data-user-id', userId);
            
            // Set the user's name in the modal
            document.getElementById('deleteUserName').innerText = name;
        }

        // Close Modal
        window.closeModal = function(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
        }

        // Handle User Deletion
        document.getElementById('deleteConfirm').addEventListener('click', function () {
            const userId = this.getAttribute('data-user-id');
            console.log(`User ID to delete: ${userId}`);
            closeModal('modelConfirm');
        });

        // Handle User Update Form Submission
        document.getElementById('updateUserForm').addEventListener('submit', function (event) {
            event.preventDefault();
            
            const userId = document.getElementById('updateUserId').value;
            const role = document.getElementById('updateRole').value;

            closeModal('updateModel');
        });
    </script>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="pt-16">
        <h3 class="lg:text-5xl md:text-4xl text-2xl uppercase titel_content text-center">Manage Users</h3>

        <div class="overflow-x-auto">
            <table class="w-full table table-xs md:table-md mb-20">
                <thead>
                    <tr class="bg-[--secondary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Photo</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Name</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Email</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Role</th>
                        <th class="px-3 py-2 text-center text-xs md:text-sm font-medium text-[--primary-color] uppercase tracking-wider cursor-pointer">Action</th>
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
                                                        hover:text-white hover:bg-blue-500 transition duration-150' 
                                                        onclick=\"openUpdateModal($id, event)\">
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </button>
                                        <button class='px-3 py-1 rounded-md text-xs md:text-sm border border-red-500 font-medium 
                                                        hover:text-white hover:bg-red-500 transition duration-150' 
                                                        onclick=\"openDeleteModal($id, event)\">
                                            <i class='fa-solid fa-trash'></i>
                                        </button>
                                    </td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "Users not found";
                    }

                    // Update User Logic
                    if(isset($_POST['updateUserBtn'])) {
                        $updateRole = $_POST['role'];
                        $updateId = $_POST['userId'];
                        
                        $update_user = $db_root->query("UPDATE users SET role = '$updateRole' WHERE id = '$updateId'");
                        if($update_user) {
                            header('Location: manage_user.php');
                        } else {
                            echo "User not updated.";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Update Modal -->
        <div id="updateModal" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 hidden">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('updateModal')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <h3 class="text-xl font-normal text-gray-500 mb-6">Update User Details</h3>
                    <form id="updateUserForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                        <input type="hidden" id="updateUserId" name="userId" />
                        <div class="mb-4">
                            <label for="updateRole" class="block text-left">Role</label>
                            <select id="updateRole" name="role" class="w-full px-3 py-2 mt-2 border rounded-md">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="flex justify-center gap-x-2 mt-4">
                            <button type="submit" name="updateUserBtn" class="text-white bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded-md">
                                Update User
                            </button>
                            <button type="button" onclick="closeModal('updateModal')"
                                class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 px-4 py-2 rounded-md">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 hidden">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('deleteModal')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this user?</h3>
                    <a href="#" id="deleteConfirm"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </a>
                    <a href="#" onclick="closeModal('deleteModal')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                        No, cancel
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Open Update Modal
        function openUpdateModal(userId, event) {
            event.preventDefault();  // Prevent any default behavior, like page reload
            document.getElementById("updateUserId").value = userId; // Set user ID in hidden input
            document.getElementById("updateModal").classList.remove('hidden');  // Show modal
            document.body.classList.add('overflow-y-hidden');  // Disable scrolling when modal is open
        }

        // Open Delete Modal
        function openDeleteModal(userId, event) {
            event.preventDefault();  // Prevent any default behavior, like page reload
            document.getElementById("deleteUserId").value = userId; // Set user ID in hidden input
            document.getElementById("deleteModal").classList.remove('hidden');  // Show modal
            document.body.classList.add('overflow-y-hidden');  // Disable scrolling when modal is open
        }

        // Close Modal
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');  // Hide modal
            document.body.classList.remove('overflow-y-hidden');  // Enable scrolling again
        }
    </script>
</body>

</html>
