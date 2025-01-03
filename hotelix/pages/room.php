<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hotelix || Room</title>
    <!-- tailwind css plugin cdn link (daisyui) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- ======== font awesome  link ========= -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- ========= tailwind css cdn link ======== -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ======== swiper cdn link css ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ======= vanilla css ====== -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once('../shared/header.php');
    require_once('../components/banner_hook.php');
    $page = 'Rooms';
    $banner = $pageBanners[$page];

    function renderBanner($bannerImage, $title, $subtitle)
    {
        echo "
        <div class='relative lg:h-[600px] h-[400px] w-full bg-cover bg-center bg-no-repeat' style='background-image: url($bannerImage);'>
            <div class='bg-black bg-opacity-60 w-full h-full p-6 text-center rounded-lg flex flex-col items-center justify-center'>
                <h1 class='md:text-6xl text-4xl font-bold text-white uppercase titel_content'>$title</h1>
                <p class='text-lg text-gray-300 mt-2 font-bold uppercase'>$subtitle</p>
            </div>
        </div>";
    }
    renderBanner($banner['bannerImage'], $banner['title'], $banner['subtitle']);
    ?>



    <?php
    require_once('../../db_root.php');
    $getRoomsdata = $db_root->query("SELECT * FROM rooms");
    $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : '';
    $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : '';
    if ($getRoomsdata->num_rows > 0) {
        echo "<div class='md:mx-8 mx-5 my-2'>
            <div class='grid md:grid-cols-2 lg:grid-cols-3 gap-5'>"; // Start of grid container
    
        while ($row = $getRoomsdata->fetch_assoc()) {
            $id = $row['id'];
            $room_type = $row['room_type'];
            $price = $row['price_per_night'];
            $status = $row['av_status'];
            $capacity = $row['capacity'];
            $room_size = $row['room_size'];
            $room_descrip = $row['room_desc'];
            $bed_type = $row['bed_type'];
            $room_image = $row['room_photo'];
            $image_mime = $row['room_mime_type'];
            $view = $row['view'];

            echo "
    <div class='card border border-blue-500 w-full shadow-xl'>
        <figure class='relative overflow-hidden'>
            <img src='data:$image_mime;base64," . base64_encode($room_image) . "' alt='$room_type' class='w-full h-48 object-cover' />
            <p class='absolute top-3 right-4 text-xl bg-blue-400 px-3 py-2 rounded-md titel_content'>$status</p>
        </figure>
        <div class='card-body'>
            <h2 class='card-title text-3xl titel_content uppercase'>
                $room_type
            </h2>
            <div class=''>
                <div class='flex'>
                    <p class='text-xl titel_content'><i class='fa-brands fa-squarespace me-1'></i> <span>$room_size</span></p>
                    <p class='text-xl titel_content'><i class='fa-solid fa-bed me-1'></i> <span>$bed_type</span></p>
                </div>
                <div class='flex my-3'>
                    <p class='text-xl titel_content'><i class='fa-solid fa-user-large me-1'></i> <span>$capacity</span></p>
                    <p class='text-xl titel_content'><i class='fa-solid fa-mountain-sun me-1'></i> <span>$view</span></p>
                </div>
                <p class='titel_content text-xl line-clamp-1'><i class='fa-regular fa-file-lines me-1'></i>: <span>$room_descrip</span></p>
            </div>
            <p class='titel_content text-xl'><span class='font-semibold'>Price</span>
            $<span>$price</span> <span>Per Night</span>
            </p>

            <form method='POST' action='hotelix/dashboard_pages/room_booking.php'>
                <input type='hidden' name='room_id' value='$id'>
                <input type='hidden' name='room_type' value=$room_type>
                <input type='hidden' name='price' value=$price>
                <input type='hidden' name='status' value=$status>
                <input type='hidden' name='checkin' value=$checkinDate>
                <input type='hidden' name='checkout' value=$checkoutDate>
                <button type='submit' class='relative inline-block px-5 py-2 mt-2 text-center border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group uppercase w-full'>
                    <span class='absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300 ease-out'></span>
                    <span class='relative z-10'>Book Room</span>
                </button>
            </form>
        </div>
    </div>";

        }

        echo "</div></div>"; // End of grid container
    } else {
        echo "No rooms found!";
    }

    require_once('../shared/footer.php');
    ?>
</body>

</html>