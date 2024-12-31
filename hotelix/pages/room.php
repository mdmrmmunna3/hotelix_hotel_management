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

    <!-- ======== check out form ====== -->
    <div>
        <?php
        // Get dates from session, if they exist
        $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : '';
        $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : '';
        ?>
        <form method="POST" action="hotelix/dashboard_pages/room_booking.php" class="md:mx-8 mx-5 my-2">
            <div
                class="form-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-6 rounded-lg shadow-md shadow-blue-100">

                <!-- Check-in Date -->
                <div class="form-section flex flex-col items-center md:border-r-2 md:border-gray-300 cursor-pointer"
                    onclick="focusInput('checkin')">
                    <h4 class="text-lg font-semibold mb-2 text-[--secondary-color] titel_content">CHECK IN &#128197;
                    </h4>
                    <input type="date" id="checkin" name="checkin" value="<?php echo $checkinDate ?>" required
                        min="<?php echo date('Y-m-d'); ?>"
                        class="md:w-[90%] w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 border-blue-500 bg-[--primary-color]">
                </div>

                <!-- Check-out Date -->
                <div class="form-section flex flex-col items-center md:border-r-2 md:border-gray-300 cursor-pointer"
                    onclick="focusInput('checkout')">
                    <h4 class="text-lg font-semibold mb-2 text-[--secondary-color] titel_content">CHECK OUT &#128197;
                    </h4>
                    <input type="date" id="checkout" name="checkout" value="<?php echo $checkoutDate ?>" required
                        min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                        class="md:w-[90%] w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 border-blue-500 bg-[--primary-color]">
                </div>

                <!-- Guests Section -->
                <div class="flex flex-col items-center md:border-r-2 md:border-gray-300">
                    <h4 class="text-lg font-semibold mb-2 text-[--secondary-color] titel_content">GUESTS &#128101;</h4>
                    <select name="guests"
                        class="md:w-[90%] w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 titel_content border-blue-500 bg-[--primary-color]">
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4+ Guests</option>
                    </select>
                </div>

                <!-- Check Availability Button -->
                <div class="check-availability flex flex-col items-center justify-center">
                    <button type="submit"
                        class="relative flex justify-center items-center w-full h-full py-2 md:py-0 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group">
                        <span
                            class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                        <span class="relative z-10 uppercase text-xl titel_content">Check Availability</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <?php
    require_once('../../db_root.php');
    $getRoomsdata = $db_root->query("SELECT * FROM rooms");

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
                <input type='hidden' name='checkin' value='<?php echo $checkinDate; ?>'>
                <input type='hidden' name='checkout' value='<?php echo $checkoutDate; ?>'>
                <button type='submit' class='relative inline-block px-5 py-2 mt-2 text-center border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group uppercase'>
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