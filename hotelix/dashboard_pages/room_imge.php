<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Images</title>
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>

<body>
    <section class="py-20">
        <h3 class="titel_content text-4xl uppercase text-center">Room Images</h3>
        <div class="overflow-x-auto">
            <table class="max-w-xl md:mx-auto mx-4 table table-xs md:table-md mb-20">
                <thead>
                    <tr
                        class="bg-[--secondary-color] text-[--primary-color] border-b border-gray-200 text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>RoomId</th>
                        <th>Room Type</th>
                        <th>Room Images</th>
                    </tr>
                </thead>
                <tbody class="bg-[--primary-color]">
                    <?php
                    $getroomsInfo = $db_root->query("SELECT * FROM rooms");
                    if ($getroomsInfo->num_rows > 0) {
                        $counter = 1;
                        while ($row = $getroomsInfo->fetch_assoc()) {
                            $id = $row['id'];
                            $room_type = $row['room_type'];
                            $photo = $row['room_photo'];
                            $photo_mime = $row['room_mime_type'];
                            $base64_photo = base64_encode($photo);
                            echo "
                                <tr class='text-xs md:text-sm text-center'>
                                    <td>$counter</td>
                                    <td>$id</td>
                                    <td class='font-medium'>$room_type</td>
                                    <td class='flex justify-center items-center'>
                                        <a data-fancybox='gallery' href='data:$photo_mime;base64,$base64_photo'>
                                            <img class='h-16 w-16 object-cover rounded-full' 
                                                src='data:$photo_mime;base64,$base64_photo' alt='Room Photo'>
                                        </a>
                                    </td>
                                </tr>
                            ";
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>Rooms not found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- FancyBox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>

</html>