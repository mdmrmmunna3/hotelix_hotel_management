<?php
require_once "db_root.php";
$success_message = '';
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no user is logged in
    header("Location: auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $db_conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
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
        .toast {
            transition: opacity 2s ease-in-out;
        }

        .toast-hidden {
            opacity: 0;
            visibility: hidden;
        }

        .toast-visible {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['success_message'])) { ?>
        <div id="successMessage" class="toast toast-top toast-center toast-visible z-30">
            <div class="alert alert-success">
                <span class="text-white"><?= htmlspecialchars($_GET['success_message']) ?></span>
            </div>
        </div>
    <?php } ?>

    <section class="w-full py-20 min-h-[100vh] titel_content" id="form_container">
        <form action="" method="post" enctype="multipart/form-data"
            class="max-w-lg md:mx-auto mx-4 md:p-8 px-4 py-4 rounded-xl hover:shadow-2xl transition-shadow duration-300 main_form">

            <!-- logo -->
            <div class="flex justify-center mb-3">
                <img src="assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="w-[170px]">
            </div>

            <h2 class="text-2xl font-bold text-center mb-4 uppercase">Payment</h2>

            <!-- Name and Email Fields -->
            <div class="grid md:grid-cols-2 gap-3 mb-4">
                <div>
                    <input type="text" name="u_name" id="u_name" placeholder="Name"
                        class="py-3 px-4 text-xl bg-transparent border-2 border-violet-300 rounded-lg w-full focus:outline-none"
                        value="<?php echo htmlspecialchars($user['name']); ?>" readonly required>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        class="py-3 px-4 text-xl bg-transparent border-2 border-violet-300 rounded-lg w-full focus:outline-none"
                        value="<?php echo htmlspecialchars($user['email']); ?>" readonly required>
                </div>
            </div>

            <!-- Review Description -->
            <div>
                <textarea name="describ" id="describ" placeholder="Review Description" cols="2" rows="3"
                    class="py-3 px-4 bg-transparent border-2 border-violet-300 rounded-lg w-full focus:outline-none"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="mt-3">
                <button type="submit" name="paymentBtn" id="payment"
                    class="relative flex justify-center items-center w-full py-3 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group transition-transform duration-500">
                    <span
                        class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 ease-out"></span>
                    <span class="relative z-10 uppercase">Pay</span>
                </button>
            </div>
        </form>
    </section>

    <!-- show details  -->
    <section class="py-20">
        <div class="overflow-x-auto">
            <table class="max-w-lg md:mx-auto mx-4 table table-xs md:table-md mb-20">
                <caption class="text-3xl mb-3 uppercase titel_content">Payment List</caption>
                <thead>
                    <tr
                        class="bg-[--secondary-color] text-[--primary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>Customer Id</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Paid Amount</th>
                        <th>Reciver Name</th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    $getBookData = $db_conn->query("SELECT * FROM bookings WHERE user_id = $user_id ORDER BY booking_date DESC");
                    if ($getBookData->num_rows > 0) {
                        $counter = 1;
                        while ($row = $getBookData->fetch_assoc()) {
                            $id = $row['id'];
                            $room_type = $row['room_type'];
                            $room_number = $row['room_number'];
                            $booking_date = $row['booking_date'];
                            $checkin_date = $row['checkin_date'];
                            $checkout_date = $row['checkout_date'];
                            $payment_status = $row['payment_status'];
                            $total_amount = $row['amount'];

                            echo "
                        <tr class=' text-xs md:text-sm text-center'>
                            <td>$counter</td>
                            <td>$room_type</td>
                            <td>$room_number</td>
                            <td>$booking_date</td>
                            <td>$checkin_date</td>
                            <td>$checkout_date</td>
                            <td>$payment_status</td>
                            <td>$total_amount</td>
                            <td class='flex gap-3'>
                             <a href='user_dashboard.php?page=payment_history' class='px-3 py-1 rounded-md text-xs md:text-sm border border-blue-500 font-medium hover:text-white hover:bg-blue-500 transition duration-150 flex gap-2 justify-center items-center tooltip' data-tip='Payment'>
                                    <i class='fa-solid fa-money-check-dollar'></i>
                                </a>
                             <a href='user_dashboard.php?page=payment_history' class='px-3 py-1 rounded-md text-xs md:text-sm border border-blue-500 font-medium hover:text-white hover:bg-blue-500 transition duration-150 flex gap-2 justify-center items-center tooltip' data-tip='Invoice'>
                                    <i class='fa-solid fa-receipt'></i>
                                </a>
                             <a href='user_dashboard.php?page=display_booking&deleteId=$id' class='px-3 py-1 rounded-md text-xs md:text-sm border border-red-500 font-medium hover:text-white hover:bg-red-500 transition duration-150 flex gap-2 justify-center items-center tooltip' data-tip='Cancle'>
                                    <i class='fa-solid fa-store-slash'></i>
                                </a>
                            </td>
                        </tr>
                    ";
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No Payment found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        // Automatically hide the success message after 2 seconds
        setTimeout(function () {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.classList.remove('toast-visible');
                successMessage.classList.add('toast-hidden');
            }
        }, 2000);
    </script>
</body>

</html>