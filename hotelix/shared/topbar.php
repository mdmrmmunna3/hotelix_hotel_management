<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "db_root.php";
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no user is logged in
    header("Location: auth/login.php");
    exit;
}
$user = $_SESSION['user'];
$is_admin = isset($user['role']) && $user['role'] === 'admin';

$sqlNotifications = "SELECT * FROM notifications ORDER BY created_at DESC";
$resultNotifications = $db_conn->query($sqlNotifications);

$unreadCount = 0;
$notifications = [];
if ($resultNotifications->num_rows > 0) {
    while ($notification = $resultNotifications->fetch_assoc()) {
        $notifications[] = $notification;
        if ($notification['status'] == 'unread') {
            $unreadCount++;

        }
    }
}

if (isset($_GET['notification_id'])) {
    $notification_id = intval($_GET['notification_id']);

    // Update the status of the notification to "read"
    $sqlMarkRead = "UPDATE notifications SET status = 'read' WHERE id = ?";
    $stmt = $db_conn->prepare($sqlMarkRead);
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();
    // Redirect back to the page to refresh the notifications
    header("location:main_dashboard.php?page=dashboard");  // Replace with your actual page
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .topbar {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        /* Tailwind-style notification dropdown */
        .notification-dropdown {
            position: absolute;
            top: 50px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-height: 400px;
            overflow-y: auto;
            display: none;
        }

        .notification-icon a {
            color: #333;
            text-decoration: none;
        }

        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
        }

        .notification-item.unread {
            font-weight: bold;
        }

        .notification-item.read {
            color: #aaa;
        }

        .mark-read-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .mark-read-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="bg-[--primary-color] p-4 flex items-center justify-between fixed z-30 w-full topbar">
        <div class="flex items-center">
            <button onclick="toggleSidebar()" class="lg:hidden mr-4">☰</button>
            <a href=""><img src="assets/hotel_logo/hotelix.png" alt="Hotelix Logo" class="md:w-[130px] w-[100px]"></a>
        </div>
        <div class="flex items-center space-x-4">

            <?php if ($is_admin): ?>
                <details class="dropdown">
                    <summary class="btn bg-transparent border-0 hover:bg-transparent m-1">
                        <a class="text-[--secondary-color]">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notification-count"
                                class="absolute top-0 right-[6px] bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                <?= $unreadCount ?>
                            </span>
                        </a>
                    </summary>
                    <ul class="">
                        <div id="notifications-dropdown"
                            class="absolute dropdown-content menu titel_content overflow-hidden left-[-150px] mt-2 w-80 bg-[--primary-color] border border-gray-300 rounded-lg shadow-lg z-30">
                            <h3 class="text-xl font-semibold p-4 border-b border-gray-200">Notifications</h3>
                            <ul>
                                <?php foreach ($notifications as $notification): ?>
                                    <li
                                        class="p-2 border-b border-gray-200 <?= $notification['status'] === 'unread' ? 'font-bold' : '' ?>">
                                        <a href="main_dashboard.php?notification_id=<?= $notification['id'] ?>">
                                            <?= htmlspecialchars($notification['message']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </ul>
                </details>
            <?php endif; ?>
            <label class="swap swap-rotate">
                <input type="checkbox" class="icon" value="" onclick="handleToggleBtn()" />
                <svg class="swap-off h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                </svg>
                <svg class="swap-on h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                </svg>
            </label>
            <div class="flex items-center justify-center gap-2 ">
                <a href="index.php"><i class="text-[#079d49] fa-solid fa-arrow-left"></i></a>
                <a class="font-medium titel_content" href="index.php">Home</a>
            </div>
        </div>
    </div>

    <script>
        const handleToggleBtn = () => {
            const darkModeEnabled = document.body.classList.toggle('dark');
            localStorage.setItem('theme', darkModeEnabled ? 'dark' : 'light');
        }

        window.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });

    </script>
</body>

</html>