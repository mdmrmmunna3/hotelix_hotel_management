<?php
require_once "db_root.php";
$success_message = '';
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no user is logged in
    header("Location: auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Delete Bed Type
if (isset($_GET['deleteId'])) {
    $deletedId = $_GET['deleteId'];
    $isDeleted = "DELETE FROM bookings WHERE id = $deletedId";
    if (mysqli_query($db_root, $isDeleted)) {
        $success_message = "Booking Cancle successfully!";
        header("location:user_dashboard.php?page=display_booking&success_message=$success_message");
        exit; // Ensure the script stops after the redirect
    } else {
        echo "<p class='text-red-500'>Error: " . mysqli_error($db_root) . "</p>";
    }
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
    <!-- show details  -->
    <section class="py-20">
        <div class="overflow-x-auto">
            <table class="max-w-lg md:mx-auto mx-4 table table-xs md:table-md mb-20">
                <caption class="text-3xl mb-3 uppercase titel_content">Booking List</caption>
                <thead>
                    <tr
                        class="bg-[--secondary-color] text-[--primary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Booking Date</th>
                        <th>Checkin Date</th>
                        <th>Checkout Date</th>
                        <th>Payment Status</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    $getBookData = $db_root->query("SELECT * FROM bookings WHERE user_id = $user_id ORDER BY booking_date DESC");
                    if ($getBookData->num_rows > 0) {
                        $counter = 1;
                        while ($row = $getBookData->fetch_assoc()) {
                            $id = $row['id'];
                            $room_type = $row['room_type'];
                            $user_name = $row['user_name'];
                            $user_email = $row['user_email'];
                            $user_number = $row['user_number'];
                            $room_number = $row['room_number'];
                            $booking_date = $row['booking_date'];
                            $checkin_date = $row['checkin_date'];
                            $checkout_date = $row['checkout_date'];
                            $payment_status = $row['payment_status'];
                            $total_amount = $row['total_amount'];

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
                             <a class='px-3 py-1 rounded-md text-xs md:text-sm border border-blue-500 font-medium hover:text-white hover:bg-blue-500 transition duration-150 flex gap-2 justify-center items-center tooltip' data-tip='Invoice' onclick=\"openInvoiceModal($id)\">
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
                        echo "<tr><td colspan='9' class='text-center'>No Booking found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="modelConfirm"
            class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 left-[20%] shadow-xl rounded-md bg-[--primary-color] max-w-[80%]">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('modelConfirm')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <i class="fa-solid fa-xmark w-5 h-5 text-2xl"></i>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <div class="flex justify-center items-center">
                        <img src="<?php echo './assets/hotel_logo/hotelix.png' ?>" class="w-[160px]" alt="">
                    </div>
                    <h3 class="text-3xl font-normal text-gray-500 mt-5 mb-6 titel_content uppercase">Invoice </h3>
                    <div class="">
                        <form method="POST" id="invoiceForm">
                            <input type="text" id="deleteUserId" name="userId">
                            <div class="divider divider-info"></div>
                            <!-- invoice related info  -->
                            <div class="grid md:grid-cols-3 gap-2">
                                <div class="">
                                    <label for="invoiceId" class="flex justify-start titel_content">Invoice ID</label>
                                    <input type="text" name="invoiceId" id="invoiceId" placeholder="invoice Id"
                                        class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                </div>
                                <div class="">
                                    <label for="invoiceDate" class="flex justify-start titel_content">Invoice
                                        Date</label>
                                    <input type="text" name="invoiceDate" id="invoiceDate" placeholder="invoice date"
                                        class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                </div>
                                <div class="">
                                    <label for="invoiceDueDate" class="flex justify-start titel_content">Invoice Due
                                        Date</label>
                                    <input type="text" name="invoiceDueDate" id="invoiceDueDate"
                                        placeholder="invoice due date"
                                        class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                </div>
                            </div>

                            <div class="divider divider-info"></div>

                            <div class="grid md:grid-cols-2 gap-2">
                                <!-- user related info  -->
                                <div class="grid gap-2">
                                    <div class="">
                                        <label for="g_name" class="flex justify-start titel_content">Guest Name</label>
                                        <input type="text" name="g_name" id="g_name" placeholder="guest name"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="g_email" class="flex justify-start titel_content">Email</label>
                                        <input type="email" name="g_email" id="g_email" placeholder="Email"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="g_phone" class="flex justify-start titel_content">Phone</label>
                                        <input type="text" name="g_phone" id="g_phone" placeholder="Phone"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                </div>
                                <!-- booking related info  -->
                                <div class="grid md:grid-cols-2 gap-2">
                                    <div class="">
                                        <label for="checkin" class="flex justify-start titel_content">Checkin
                                            Date</label>
                                        <input type="text" name="checkin" id="checkin" placeholder="Check in Date"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="checkout" class="flex justify-start titel_content">Checkout
                                            Date</label>
                                        <input type="text" name="checkout" id="checkout" placeholder="Check out Date"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="booking_date" class="flex justify-start titel_content">Booking
                                            Date</label>
                                        <input type="text" name="booking_date" id="booking_date"
                                            placeholder="Booking Date"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="night" class="flex justify-start titel_content">Per Nights
                                        </label>
                                        <input type="text" name="night" id="night" placeholder="Per Nights"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>
                                    <div class="">
                                        <label for="total_amount" class="flex justify-start titel_content">Total Amount
                                        </label>
                                        <input type="text" name="total_amount" id="total_amount"
                                            placeholder="Total Amount"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>

                                    <div class="">
                                        <label for="payment_met" class="flex justify-start titel_content">Payment
                                            Method</label>
                                        <input type="text" name="payment_met" id="payment_met"
                                            placeholder="Payment Method"
                                            class="border border-blue-600 rounded-sm w-full bg-transparent py-1">
                                    </div>

                                </div>
                            </div>

                            <button type="submit" name="deleteUserBtn"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 mt-3">
                                Yes, I'm sure
                            </button>
                        </form>
                        <!-- <button type="button" onclick="closeModal('modelConfirm')"
                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                            No, cancel
                        </button> -->
                    </div>
                </div>
            </div>
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

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.classList.remove('overflow-y-hidden');
        }

        function openInvoiceModal(userId) {
            document.getElementById('deleteUserId').value = userId;
            document.getElementById('modelConfirm').style.display = 'block';
            document.body.classList.add('overflow-y-hidden');
        }
    </script>
</body>

</html>