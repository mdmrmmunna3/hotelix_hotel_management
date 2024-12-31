<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelix || Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once('../shared/header.php');
    require_once('../components/banner_hook.php');
    $page = 'Booking';
    $banner = $pageBanners[$page];

    function renderBanner($bannerImage, $title, $subtitle)
    {
        echo "
        <div class='relative lg:h-[600px] h-[400px] w-full bg-cover bg-center bg-no-repeat ' style='background-image: url($bannerImage);'>
            <div class='bg-black bg-opacity-60 w-full h-full p-6 text-center rounded-lg flex flex-col items-center justify-center'>
                <h1 class='md:text-6xl text-4xl font-bold text-white uppercase titel_content'>$title</h1>
                <p class='text-lg text-gray-300 mt-2 font-bold uppercase'>$subtitle</p>
            </div>
        </div>";
    }
    renderBanner($banner['bannerImage'], $banner['title'], $banner['subtitle']);
    ?>
    <?php
    if (!isset($_SESSION['checkin'])) {
        $_SESSION['checkin'] = '';  // Set a default value if not set
    }
    if (!isset($_SESSION['checkout'])) {
        $_SESSION['checkout'] = '';  // Set a default value if not set
    }
    // Make sure that PHP tags are not echoed out as plain text
    $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : $_SESSION['checkin'];
    $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : $_SESSION['checkout'];

    // Display the booking summary with selected dates
    echo "<h2>Booking Confirmation</h2>";
    echo "<p>Check-in Date: " . htmlspecialchars($checkinDate) . "</p>";
    echo "<p>Check-out Date: " . htmlspecialchars($checkoutDate) . "</p>";
    ?>

    <section>
        <?php
        ob_start();
        // session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: auth/login.php"); // Redirect to login page
            exit;
        }

        include '../../db_root.php';

        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $db_root->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "User not found.";
            exit;
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data"
            class=" mx-4  md:p-8 px-4 py-4 rounded-xl main_form ">
            <!-- logo  -->
            <div class="flex justify-center mb-3">
                <img src="assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="w-[170px]">
            </div>
            <h2 class="text-2xl font-bold text-center mb-4 uppercase titel_content">Booking</h2>
            <!-- === Name Fields ==== -->
            <div class="grid md:grid-cols-2 gap-3 mb-4">
                <div>
                    <input type="text" name="name" id="name" placeholder=" Name"
                        class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                        value="<?php echo htmlspecialchars($user['name']); ?>">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                        value="<?php echo htmlspecialchars($user['email']); ?>">
                    <small class="text-red-500"><?= $errors['email'] ?? '' ?></small>
                </div>
            </div>
            <!-- ==== Email & Mobile Fields ==== -->
            <div class="grid md:grid-cols-2 gap-3 mb-4">
                <div>
                    <input type="tel" name="number" id="number" placeholder="Phone Number"
                        class="py-3 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                        value="<?php echo htmlspecialchars($user['phone']); ?>">
                </div>
                <!-- ==== Upload Profile Photo ==== -->
                <div class="mb-4">
                    <input type="file" name="upload_photo" id="upload_photo"
                        class="file-input w-full file-input-ghost bg-gray-200 outline-none text-black"
                        value="<?php echo htmlspecialchars($user['mime_type']); ?>">
                    <small class="text-red-500"><?= $errors['upload_photo'] ?? '' ?></small>
                </div>
            </div>

            <!-- === update Button ==== -->
            <div>
                <button type="submit" name="updateBtn" id="update"
                    class="relative flex justify-center items-center w-full py-3  border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group transition-transform duration-500">
                    <span
                        class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 ease-out"></span>
                    <span class="relative z-10 uppercase  titel_content">CheckOut</span>
                </button>
            </div>
        </form>
    </section>

</body>

</html>