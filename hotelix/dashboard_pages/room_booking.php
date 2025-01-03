<?php
ob_start();
// Include necessary files and setup page variables
require_once('../shared/header.php');
require_once('../components/banner_hook.php');
$page = 'Booking';
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
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelix || Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section>
        <?php
        if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
            // Store the current URL in the session
            $_SESSION['redirectTo'] = $_SERVER['REQUEST_URI'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Save dates in session when form is submitted
                $_SESSION['checkin'] = $_POST['checkin'];
                $_SESSION['checkout'] = $_POST['checkout'];
                $_SESSION['room_id'] = $_POST['room_id'];
                $_SESSION['room_type'] = $_POST['room_type'];
                $_SESSION['price'] = $_POST['price'];
            }
            header("Location: ../../auth/login.php");
            exit;
        }
        // Database connection to fetch user data
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
        }

        // Booking check-in and check-out dates
        if (!isset($_SESSION['checkin'])) {
            $_SESSION['checkin'] = '';  // Set a default value if not set
        }
        if (!isset($_SESSION['checkout'])) {
            $_SESSION['checkout'] = '';  // Set a default value if not set
        }
        if (!isset($_SESSION['room_id'])) {
            $_SESSION['room_id'] = '';  // Set a default value if not set
        }
        if (!isset($_SESSION['room_type'])) {
            $_SESSION['room_type'] = '';  // Set a default value if not set
        }
        if (!isset($_SESSION['price'])) {
            $_SESSION['price'] = '';  // Set a default value if not set
        }

        $checkinDate = isset($_POST['checkin']) ? $_POST['checkin'] : $_SESSION['checkin'];
        $checkoutDate = isset($_POST['checkout']) ? $_POST['checkout'] : $_SESSION['checkout'];
        $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : $_SESSION['room_id'];
        $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : $_SESSION['room_type'];
        $room_price = isset($_POST['price']) ? $_POST['price'] : $_SESSION['price'];

        // Calculate the number of nights
        $checkinDateTimestamp = strtotime($checkinDate);
        $checkoutDateTimestamp = strtotime($checkoutDate);
        $nights = ($checkoutDateTimestamp - $checkinDateTimestamp) / (60 * 60 * 24);
        // Calculate the amount based on room price and nights
        $amount = $nights * $room_price;

        // Handle form submission to store booking details
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkoutBtn'])) {
            $booking_status = 'pending';
            $payment_status = 'pending';

            $sqlInsert = "INSERT INTO bookings (user_id, room_id, room_type, checkin_date, checkout_date, booking_status, payment_status,amount)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmtInsert = $db_root->prepare($sqlInsert);
            $stmtInsert->bind_param("iissdsss", $userId, $room_id, $room_type, $checkinDate, $checkoutDate, $booking_status, $payment_status, $amount);
            if ($stmtInsert->execute()) {
                header('location: main_dashboard.php?page=manage_user');
            } else {
                echo "<p class='text-red-500'>Error: " . $stmtInsert->error . "</p>";
            }
        }

        ?>

        <div class="grid md:grid-cols-2">
            <div>
                <!-- Booking Confirmation -->
                <h2>Booking Confirmation</h2>
                <p>Check-in Date: <?= htmlspecialchars($checkinDate); ?></p>
                <p>Check-out Date: <?= htmlspecialchars($checkoutDate); ?></p>
                <p>Check-out Date: <?= htmlspecialchars($room_id); ?></p>
                <p>Check-out Date: <?= htmlspecialchars($room_type); ?></p>
                <p>Check-out Date: <?= htmlspecialchars($room_price); ?></p>
            </div>

            <div>
                <!-- Booking Form -->
                <form action="" method="post" enctype="multipart/form-data"
                    class="mx-4 md:p-8 px-4 py-4 rounded-xl main_form">
                    <div class="flex justify-center mb-3">
                        <img src="assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="w-[170px]">
                    </div>
                    <h2 class="text-2xl font-bold text-center mb-4 uppercase titel_content">Booking</h2>

                    <!-- Name & Email Fields -->
                    <div class="grid md:grid-cols-2 gap-3 mb-4">
                        <div>
                            <input type="text" name="name" id="name" placeholder=" Name"
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($user['name']); ?>">
                        </div>
                        <div>
                            <input type="email" name="email" id="email" placeholder="Email Address"
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                            <small class="text-red-500"><?= $errors['email'] ?? '' ?></small>
                        </div>
                    </div>

                    <!-- Phone Number & Profile Photo Fields -->
                    <div class="grid grid-cols-1 gap-3 mb-4">
                        <div>
                            <input type="tel" name="number" id="number" placeholder="Phone Number"
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($user['phone']); ?>">
                        </div>
                        <div>
                            <input type="hidden" name="number" id="number" placeholder="Phone Number"
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($room_id) ?>">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-3 mb-4">
                        <div>
                            <input type="text" name="number" id="number" placeholder=""
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($room_type) ?>" disabled>
                        </div>
                        <div>
                            <input type="text" name="number" id="number" placeholder=""
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?= number_format($amount, 2); ?>" disabled>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-3 mb-4">
                        <div>
                            <input type="text" name="number" id="number" placeholder=""
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($checkinDate) ?>" disabled>
                        </div>
                        <div>
                            <input type="text" name="number" id="number" placeholder=""
                                class="py-2 px-4 border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle text-black"
                                value="<?php echo htmlspecialchars($checkoutDate) ?>" disabled>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" name="checkoutBtn" id="checkout"
                            class="relative flex justify-center items-center w-full py-3 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group transition-transform duration-500">
                            <span
                                class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 ease-out"></span>
                            <span class="relative z-10 uppercase titel_content">CheckOut</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>

<?php
ob_end_flush(); // End output buffering and flush the output
?>