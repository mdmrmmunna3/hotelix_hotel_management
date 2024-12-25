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
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <?php
    require_once('../shared/header.php');
    require_once('../components/banner_hook.php');

    $page = 'about'; // Current page identifier
    $banner = $pageBanners[$page];

    // Render the banner
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

    require_once('home/about.php');
    require_once('home/services.php');
    require_once('../shared/footer.php');
    ?>

    <script src="../../main.js"></script>
</body>

</html>