<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelix</title>
    <!-- tailwind css plugin cdn link (daisyui) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- ======== font awesome  link ========= -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- ========= tailwind css cdn link ======== -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ======== swiper cdn link css ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ======= vanila css ====== -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    require_once('hotelix/shared/header/header.php');
    require_once('hotelix/pages/home/home/home.php');
    require_once("hotelix/shared/footer/footer.php");

    ?>


    <!-- ====== swiper cdn link for js ======  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 2000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            on: {
                slideChangeTransitionStart: function () {
                    // Reset images transform for smooth effect
                    document.querySelectorAll('.swiper-slide img').forEach(img => {
                        img.style.transform = 'scale(1)';
                        img.style.transition = 'transform 3s ease-out';
                    });
                },
                slideChangeTransitionEnd: function () {
                    // Apply zoom-in effect on active slide
                    let activeImage = document.querySelector('.swiper-slide-active img');
                    if (activeImage) {
                        activeImage.style.transform = 'scale(1.2)';
                    }
                },
            },
        });
    </script>

</body>

</html>