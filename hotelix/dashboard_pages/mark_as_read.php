<?php
require_once "db_root.php";

if (isset($_POST['mark_read'])) {
    $notification_id = $_POST['notification_id'];

    // Update the status of the notification to "read"
    $sqlMarkRead = "UPDATE notifications SET status = 'read' WHERE id = ?";
    $stmt = $db_conn->prepare($sqlMarkRead);
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();

    // Redirect back to the page to refresh the notifications
    header("location:main_dashboard.php?page=dashboard");  // Replace with your actual page
}
?>