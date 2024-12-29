<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <base href="/hotelix_hotel_management/"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <?php require_once 'hotelix/shared/topbar.php'; ?>
        <div class="flex">
            <?php require_once 'hotelix/shared/sidebar.php'; ?>
            <main class="flex-1 p-6">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
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
    <script>
        $(document).ready(function () {
            $('.ajax-link').on('click', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                $('main').html('<div class="text-center py-10"><span>Loading...</span></div>');
                $.get(url, function (data) {
                    const content = $(data).find('main').html();
                    $('main').html(content);
                    history.pushState(null, '', url);
                }).fail(function () {
                    $('main').html('<div class="text-center py-10"><span>Error loading content.</span></div>');
                });
            });
            window.onpopstate = function () {
                const url = window.location.href;
                $.get(url, function (data) {
                    const content = $(data).find('main').html();
                    $('main').html(content);
                });
            };
        });
    </script>
</body>

</html>