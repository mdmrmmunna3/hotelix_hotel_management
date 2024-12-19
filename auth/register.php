<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Tailwind CSS plugin CDN link (DaisyUI) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome link -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS CDN link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CDN link CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">

    <style>
        /* .inStyle:is(:focus) {
            border: 2px solid transparent;
            transition: all 0.1s ease;
            background: linear-gradient(#121125, #121125) padding-box, linear-gradient(45deg, blue, red) border-box;

        } */

        .inStyle:is(:focus) {
            border: 2px solid transparent;
            border-image: linear-gradient(to right, #3b82f6, #9333ea) 1;
            border-radius: 5px;
        }
    </style>
</head>

<body class="">
    <section class="w-full py-10 bg-gray-200" id="form_container">

        <form action="" method="post" enctype="multipart/form-data"
            class="max-w-md md:mx-auto mx-4  bg-white p-8 rounded-xl shadow-md ">
            <!-- go to home  -->
            <div class=" flex justify-center items-center gap-2 mb-4">
                <a href="../index.php"><i class="text-[#079d49] fa-solid fa-arrow-left"></i></a>
                <a class="text-black font-medium" href="../index.php">Go To Home Page</a>
            </div>

            <!-- logo  -->
            <div class="flex justify-center mb-3">
                <img src="../hotelix/assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="w-[170px]">
            </div>

            <h2 class="text-2xl font-bold text-center mb-4 uppercase titel_content">Create an Account</h2>

            <!-- === Name Fields ==== -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="text" name="first" id="first" placeholder="First Name"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
                <input type="text" name="last" id="last" placeholder="Last Name"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
            </div>

            <!-- ==== Email & Mobile Fields ==== -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="email" name="email" id="email" placeholder="Email Address"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
                <input type="tel" name="number" id="number" placeholder="Phone Number"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
            </div>

            <!-- ==== Password Fields ==== -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="password" name="password" id="password" placeholder="Password"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
                <input type="password" name="co_pass" id="co_pass" placeholder="Confirm Password"
                    class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle">
            </div>

            <!-- ==== Upload Profile Photo ==== -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Profile Photo</label>
                <input type="file" name="profile_photo" id="profile_photo"
                    class="file-input w-full file-input-ghost bg-gray-200 outline-none">
            </div>

            <!-- already have account  -->

            <div class="flex justify-between mx-2 mb-3 font-medium">
                <p>Already, have an account?</p>
                <a href="login.php" class="uppercase titel_content font-medium text-red-500">Log In</a>
            </div>

            <!-- === Register Button ==== -->
            <button type="submit" name="registerBtn" id="register"
                class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition-all duration-300">Register</button>
        </form>
    </section>
</body>

</html>