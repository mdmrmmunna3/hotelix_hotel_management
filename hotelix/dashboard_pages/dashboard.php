<?php
require_once "db_root.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            transition: all 0.4s ease-out;
            text-decoration: none;
            border: 1px solid #60a5fa;
        }

        .card:hover {
            transform: translateY(-5px) scale(1.005) translateZ(0);
            box-shadow: 0 24px 36px rgba(0, 0, 0, 0.11),
                0 3px 10px var(--box-shadow-color);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="py-16">
        <h3 class="titel_content text-3xl mb-2">Hello Dashboard!</h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="card border border-blue-500 p-4 rounded-lg">
                <h2 class="text-xl uppercase">Total Register Users</h2>
                <?php
                $getUsers = $db_root->query("select * from users");
                echo "<p class='text-2xl'>" . $getUsers->num_rows . ' Users' . "</p>";
                ?>
                <a href="main_dashboard.php?page=manage_user"
                    class="border border-blue-600 text-center rounded-md py-3 mt-3 font-medium hover:bg-blue-600 hover:text-white transition-all">View
                    More</a>
            </div>
            <div class="card border border-blue-500 p-4 rounded-lg">
                <h2 class="text-xl uppercase">Total Rooms</h2>
                <?php
                $getUsers = $db_root->query("select * from rooms");
                echo "<p class='text-2xl'>" . $getUsers->num_rows . ' Rooms' . "</p>";
                ?>
                <a href="main_dashboard.php?page=room_list"
                    class="border border-blue-600 text-center rounded-md py-3 mt-3 font-medium hover:bg-blue-600 hover:text-white transition-all">View
                    More</a>
            </div>
            <div class="card border border-blue-500 p-4 rounded-lg">
                <h2 class="text-xl uppercase">Total Booking List</h2>
                <?php
                $getUsers = $db_root->query("select * from bookings");
                echo "<p class='text-2xl'>" . $getUsers->num_rows . ' Bookings' . "</p>";
                ?>
                <a href="main_dashboard.php?page=all_booking_list"
                    class="border border-blue-600 text-center rounded-md py-3 mt-3 font-medium hover:bg-blue-600 hover:text-white transition-all">View
                    More</a>
            </div>
            <div class="card border border-blue-500 p-4 rounded-lg">
                <h2 class="text-xl uppercase">Total Amount</h2>
                <p class="text-2xl font-bold">$2,258</p>
                <a href=""
                    class="border border-blue-600 text-center rounded-md py-3 mt-3 font-medium hover:bg-blue-600 hover:text-white transition-all">View
                    More</a>
            </div>
            <!-- Add more cards -->
        </div>
    </section>
</body>

</html>