<?php
session_start(); // Start the session

// Check if the user is already logged in, and if so, redirect them to their intended page
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    // Redirect to the page that was saved in the session or default to the user dashboard
    $redirectTo = $_SESSION['redirectTo'] ?? 'user_dashboard.php?page=dashboard';
    header("Location: $redirectTo");
    exit;
}

$errors = [];

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        // Database query to verify the email and password
        require_once('../db_root.php');
        $query = $db_root->prepare("SELECT * FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if password is correct using password_verify
            if (password_verify($password, $user['password'])) {
                // Store user details in session
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['isLoggedIn'] = true;

                // Determine the role and redirect
                if ($user['role'] == 'admin') {
                    // Redirect to admin dashboard if the user is an admin
                    header('Location: ../main_dashboard.php?page=dashboard');
                } else {
                    // Redirect to user dashboard if the user is a regular user
                    $redirectTo = $_SESSION['redirectTo'] ?? '../user_dashboard.php?page=dashboard';
                    unset($_SESSION['redirectTo']); // Clear the redirect URL after use
                    header("Location: $redirectTo");
                    exit;
                }
                exit;
            } else {
                // Invalid password
                $errors['password'] = "Invalid password. Please try again.";
            }
        } else {
            // Email not found
            $errors['email'] = "No account found with this email.";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- Tailwind CSS plugin CDN link (DaisyUI) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome link -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS CDN link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CDN link CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .inStyle:is(:focus) {
            border: 2px solid transparent;
            border-image: linear-gradient(to right, #3b82f6, #9333ea) 1;
            border-radius: 5px;
        }
    </style>
</head>

<body class="">
    <section class="w-full py-10 bg-gray-200 h-[100vh] " id="form_container">

        <form action="" method="post" enctype="multipart/form-data"
            class="max-w-md md:mx-auto mx-4  bg-white p-8 rounded-xl shadow-md ">
            <!-- go to home  -->
            <div class=" flex justify-center items-center gap-2 mb-4">
                <a href="index.php"><i class="text-[#079d49] fa-solid fa-arrow-left"></i></a>
                <a class="text-black font-medium titel_content" href="index.php">Go To Home Page</a>
            </div>

            <!-- logo  -->
            <div class="flex justify-center mb-3">
                <img src="assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="w-[170px]">
            </div>

            <h2 class="text-2xl font-bold text-center mb-4 uppercase titel_content">LogIn an Account</h2>

            <!-- ==== Email & Mobile Fields ==== -->
            <div class=" mb-4">
                <input type="email" name="email" id="email" placeholder="Email Address"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle"
                    value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
                <small class="text-red-500"><?= $errors['email'] ?? '' ?></small>
            </div>

            <!-- ==== Password Fields ==== -->
            <div class="mb-4">
                <input type="password" name="password" id="password" placeholder="Password"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle"
                    value="<?= isset($password) ? htmlspecialchars($password) : '' ?>">
                <small class="text-red-500"><?= $errors['password'] ?? '' ?></small>
            </div>

            <!-- already have account  -->

            <div class="flex justify-between mx-2 mb-3 font-medium">
                <p>Do not have an account?</p>
                <a href="auth/register.php" class="uppercase titel_content font-medium text-red-500">Register</a>
            </div>

            <!-- === login Button ==== -->
            <div>
                <button type="submit" name="loginBtn" id="loginBtn"
                    class="relative flex justify-center items-center w-full py-3  border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group transition-transform duration-700">
                    <span
                        class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-700 ease-out"></span>
                    <span class="relative z-10 uppercase  titel_content">Log In</span>
                </button>
            </div>
        </form>
    </section>
</body>

</html>

<!-- Munna45!! , Ismail0!!  -->