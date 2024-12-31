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
    session_start(); // Start the session
    
    // Retrieve check-in and check-out dates from the session or POST request
    $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : $_SESSION['checkin'];
    $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : $_SESSION['checkout'];

    // Display the booking summary with selected dates
    echo "<h2>Booking Confirmation</h2>";
    echo "<p>Check-in Date: " . htmlspecialchars($checkinDate) . "</p>";
    echo "<p>Check-out Date: " . htmlspecialchars($checkoutDate) . "</p>";
    ?>
</body>

</html>