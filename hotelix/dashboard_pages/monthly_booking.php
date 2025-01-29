<?php
require_once "db_root.php";

$success_message = '';
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no user is logged in
    header("Location: auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$results_per_page = 10;
$subpage = isset($_GET['subpage']) && (int) $_GET['subpage'] > 0 ? (int) $_GET['subpage'] : 1;

$start_from = intval(($subpage - 1) * $results_per_page);

$checkin_date = isset($_GET['checkin_date']) ? $_GET['checkin_date'] : '';
$checkout_date = isset($_GET['checkout_date']) ? $_GET['checkout_date'] : '';

// Handle form submission
if (isset($_POST['submit'])) {
    // Set the checkin and checkout dates from POST if submitted
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    
    // Create WHERE clause based on the filters
    $where_clause = '';
    if ($checkin_date && $checkout_date) {
        $where_clause = " WHERE checkin_date >= '$checkin_date' AND checkout_date <= '$checkout_date'";
    } elseif ($checkin_date) {
        $where_clause = " WHERE checkin_date >= '$checkin_date'";
    } elseif ($checkout_date) {
        $where_clause = " WHERE checkout_date <= '$checkout_date'";
    }
    
    // Redirect to the same page with the applied filters
    header("Location: main_dashboard.php?page=monthly_booking&checkin_date=$checkin_date&checkout_date=$checkout_date");
    exit();
}

// Build where clause for query
$where_clause = '';
if ($checkin_date && $checkout_date) {
    $where_clause = " WHERE checkin_date >= '$checkin_date' AND checkout_date <= '$checkout_date'";
} elseif ($checkin_date) {
    $where_clause = " WHERE checkin_date >= '$checkin_date'";
} elseif ($checkout_date) {
    $where_clause = " WHERE checkout_date <= '$checkout_date'";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
    <!-- Tailwind CSS plugin CDN link (DaisyUI) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome link -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS CDN link -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CDN link CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .inStyle:is(:focus) {
            border: 2px solid transparent;
            border-image: linear-gradient(to right, #3b82f6, #9333ea) 1;
            border-radius: 5px;
        }

        .main_form {
            box-shadow: rgba(0, 0, 0, 0.45) 0px 2px 8px;
        }
    </style>
</head>

<body>
    <section class="py-20">
        <!-- Search Form -->
        <form method="POST" action="main_dashboard.php?page=monthly_booking" class="max-w-lg md:mx-auto mx-4 md:p-8 px-4 py-4 rounded-xl hover:shadow-2xl transition-shadow duration-300 main_form mb-6">
            <div>
                <label for="checkin_date" class="block">Check-in Date:</label>
                <input type="date" name="checkin_date" id="checkin_date" class="py-3 px-4 bg-transparent border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle" value="<?= htmlspecialchars($checkin_date) ?>" />
            </div>
            <div>
                <label for="checkout_date" class="block">Check-out Date:</label>
                <input type="date" name="checkout_date" id="checkout_date" class="py-3 px-4 bg-transparent border-2 border-violet-300 rounded-lg w-full focus:outline-none inStyle" value="<?= htmlspecialchars($checkout_date) ?>" />
            </div>
            <button type="submit" name="submit" id="submitbtn"
                        class="relative flex justify-center items-center w-full py-3  border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group transition-transform duration-500 mt-5">
                        <span
                            class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 ease-out"></span>
                        <span class="relative z-10 uppercase  titel_content">Search Bookings</span>
                    </button>
        </form>

        <!-- Booking Table -->
        <div class="overflow-x-auto">
            <table class="max-w-lg md:mx-auto mx-4 table table-xs md:table-md mb-20">
                <caption class="text-3xl mb-3 uppercase titel_content">Booking List</caption>
                <thead>
                    <tr class="bg-[--secondary-color] text-[--primary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Booking Date</th>
                        <th>Checkin Date</th>
                        <th>Checkout Date</th>
                        <th>Payment Status</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    // Fetch bookings with the applied date filter and pagination
                    $getBookData = $db_conn->query("SELECT * FROM bookings $where_clause ORDER BY booking_date DESC LIMIT $start_from, $results_per_page");

                    if ($getBookData->num_rows > 0) {
                        $counter = $start_from + 1;
                        while ($row = $getBookData->fetch_assoc()) {
                            $name = $row['user_name'];
                            $Email = $row['user_email'];
                            $room_type = $row['room_type'];
                            $room_number = $row['room_number'];
                            $booking_date = $row['booking_date'];
                            $checkin_date = $row['checkin_date'];
                            $checkout_date = $row['checkout_date'];
                            $payment_status = $row['payment_status'];
                            $total_amount = $row['total_amount'];

                            echo "
                            <tr class=' text-xs md:text-sm text-center'>
                                <td>$counter</td>
                                <td>$name</td>
                                <td>$Email</td>
                                <td>$room_type</td>
                                <td>$room_number</td>
                                <td>$booking_date</td>
                                <td>$checkin_date</td>
                                <td>$checkout_date</td>
                                <td>$payment_status</td>
                                <td>$total_amount</td>
                            </tr>
                            ";
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'>No bookings found for the selected dates.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="flex justify-center">
                <?php
                // Calculate the total pages for pagination
                $result = $db_conn->query("SELECT COUNT(id) AS total FROM bookings $where_clause");
                $row = $result->fetch_assoc();
                $total_records = $row['total'];

                $total_pages = ceil($total_records / $results_per_page);

                // Pagination buttons
                if ($subpage > 1) {
                    echo "<a href='main_dashboard.php?page=monthly_booking&subpage=" . ($subpage - 1) . "&checkin_date=$checkin_date&checkout_date=$checkout_date' class='mx-2 px-4 py-2 border rounded-md bg-gray-200 text-gray-700'>&laquo; Previous</a>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='main_dashboard.php?page=monthly_booking&subpage=$i&checkin_date=$checkin_date&checkout_date=$checkout_date' class='mx-2 px-4 py-2 border rounded-md " . ($subpage == $i ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700') . "'>$i</a>";
                }

                if ($subpage < $total_pages) {
                    echo "<a href='main_dashboard.php?page=monthly_booking&subpage=" . ($subpage + 1) . "&checkin_date=$checkin_date&checkout_date=$checkout_date' class='mx-2 px-4 py-2 border rounded-md bg-gray-200 text-gray-700'>Next &raquo;</a>";
                }
                ?>
            </div>

        </div>
    </section>
</body>

</html>
