<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Dashboard</title>
    <!-- tailwind css plugin cdn link (daisyui) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- ======== font awesome  link ========= -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- ========= tailwind css cdn link ======== -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ======= jquery link ========== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ======== swiper cdn link css ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ======= vanila css ====== -->
    <link rel="stylesheet" href="style.css">
    <!-- box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; -->

</head>

<body>
    <section>
        <?php require_once 'hotelix/shared/topbar.php'; ?>
        <div class="flex">
            <?php require_once 'hotelix/shared/sidebar.php'; ?>
            <main class="flex-1 p-6">

                <?php
                // Dynamically include the page based on the `page` query parameter
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default to 'dashboard'
                $file = "hotelix/dashboard_pages/{$page}.php";

                if (file_exists($file)) {
                    include $file;
                } else {
                    echo "<h1 class='text-2xl'>Page not found</h1>";
                }

                ?>

            </main>
        </div>
    </section>


</body>

</html>