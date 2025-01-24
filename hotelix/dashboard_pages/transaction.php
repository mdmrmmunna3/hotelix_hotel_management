<?php
require_once "db_root.php";
$success_message = '';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no user is logged in
    header("Location: auth/login.php");
    exit;
}


$user_id = $_SESSION['user_id'];

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
    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Include html2pdf.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style.css">

    <style>
        input {
            padding-left: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }
    </style>
</head>

<body>
    <!-- show details  -->
    <section class="py-20">
        <div class="overflow-x-auto">
            <table class="max-w-lg md:mx-auto mx-4 table table-xs md:table-md mb-20">
                <caption class="text-3xl mb-3 uppercase titel_content">Transaction List</caption>
                <thead>
                    <tr
                        class="bg-[--secondary-color] text-[--primary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Paid Amount</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    $getPaymentData = $db_conn->query("SELECT * FROM payment_history ORDER BY payment_time DESC");
                    if ($getPaymentData->num_rows > 0) {
                        $counter = 1;
                        while ($row = $getPaymentData->fetch_assoc()) {
                            $id = $row['id'];
                            $userId = $row['user_id'];
                            $userName = $row['name'];
                            $room_type = $row['room_type'];
                            $room_number = $row['room_number'];
                            $paid_amount = $row['paid_amount'];
                            $payment_method = $row['payment_method'];

                            echo "
                        <tr class=' text-xs md:text-sm text-center'>
                            <td>$counter</td>
                            <td>$userId</td>
                            <td>$userName</td>
                            <td>$room_type</td>
                            <td>$room_number</td>
                            <td>$paid_amount</td>
                            <td>$payment_method</td>
                            
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

</body>

</html>