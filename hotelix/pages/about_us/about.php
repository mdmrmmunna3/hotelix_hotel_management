<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Hotel</title>
    <!-- tailwind css plugin cdn link (daisyui) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- ======== font awesome  link ========= -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- ========= tailwind css cdn link ======== -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ======== swiper cdn link css ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ======= vanila css ====== -->
    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <?php
    require_once('../../shared/header.php');
    require_once('../../components/banner_hook.php');

    $page = 'about'; // Current page identifier
    $banner = $pageBanners[$page];

    // Render the banner
    function renderBanner($bannerImage, $title, $subtitle)
    {
        echo "
    <div class='relative h-[300px] bg-cover bg-center flex items-center justify-center' style='background-image: url($bannerImage);'>
        <div class='bg-black bg-opacity-50 p-6 text-center rounded-lg'>
            <h1 class='text-4xl font-bold text-white'>$title</h1>
            <p class='text-lg text-gray-300 mt-2'>$subtitle</p>
        </div>
    </div>";
    }
    renderBanner($banner['bannerImage'], $banner['title'], $banner['subtitle']);
    ?>

    <script src="../../../main.js"></script>
</body>

</html>