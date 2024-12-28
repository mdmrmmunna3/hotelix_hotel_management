<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar_main {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
    </style>
</head>

<body>
    <section>
        <div class="bg-white h-screen p-4 hidden lg:block w-64 mt-18 sidebar_main">
            <div class="flex flex-col items-center gap-4 p-6 border-b ">
                <div class="shrink-0">
                    <a href="#" class="relative flex items-center justify-center w-16 h-16 text-white rounded-full ">
                        <img src='assets/about/munna.jpg' alt="user name" title="user name"
                            class=" w-16 h-16 rounded-full" />
                        <span
                            class="absolute bottom-0 right-0 inline-flex items-center justify-center gap-1 p-1 text-sm text-white border-2 border-white rounded-full bg-emerald-500"><span
                                class="sr-only"> online </span></span>
                    </a>
                </div>
                <div class="flex flex-col gap-0 min-h-[2rem] items-start justify-center w-full min-w-0 text-center">
                    <h4 class="w-full text-base truncate text-slate-700">Md Mustafijur Rahman Munna</h4>
                    <p class="w-full text-sm truncate text-slate-500">Hotel Manager</p>
                </div>
            </div>

            <!-- side nav  -->
            <nav class="titel_content">
                <!-- dashboard  -->
                <a href="main_dashboard.php?page=dashboard"
                    class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg ajax-link
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard') || !isset($_GET['page']) ? 'bg-emerald-300' : ''; ?>">
                    Dashboard
                </a>

                <!-- hotel  -->
                <a href="main_dashboard.php?page=hotel" class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg ajax-link
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'hotel') ? 'bg-emerald-300' : ''; ?>">
                    Hotels
                </a>

                <!-- transition  -->
                <a href="main_dashboard.php?page=hotel" class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaction') ? 'bg-emerald-300' : ''; ?>">
                    Transaction
                </a>

                <!-- room book  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-room-book" data-collapse-toggle="dropdown-room-book">
                    <div class="flex justify-between items-center text-lg">
                        <span> Room Book</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-room-book" class="hidden py-2 space-y-2 ">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Checkout</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Status</a></li>
                </ul>

                <!-- Room Facilities  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-room-facilities" data-collapse-toggle="dropdown-room-facilities">
                    <div class="flex justify-between items-center text-lg">
                        <span> Room Facilities</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-room-facilities" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities
                            Details</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Size</a></li>
                </ul>

                <!-- housekepping  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-housekeeping" data-collapse-toggle="dropdown-housekeeping">
                    <div class="flex justify-between items-center text-lg">
                        <span>Housekeeping</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-housekeeping" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Assign
                            Room</a></li>
                </ul>

                <!-- room settings  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-rooms-setting" data-collapse-toggle="dropdown-rooms-setting">
                    <div class="flex justify-between items-center text-lg">
                        <span> Rooms Settings</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-rooms-setting" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Bed
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Floor
                            Plan List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Images</a></li>
                </ul>

                <!-- report  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                    <div class="flex justify-between items-center text-lg">
                        <span> Reports</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-reports" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking
                            Reports</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Purchase
                            Reports</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Stock
                            Reports</a></li>
                </ul>


                <!-- logout  -->
                <footer class="p-3 border-t border-slate-200">
                    <a href="#"
                        class="flex items-center gap-3 p-3 transition-colors rounded text-slate-900 hover:text-emerald-500 ">
                        <div class="flex items-center self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6" aria-label="Dashboard icon"
                                role="graphics-symbol">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div
                            class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-lg font-medium truncate">
                            Logout
                        </div>
                    </a>
                </footer>
            </nav>
        </div>

        <!-- Mobile Sidebar -->
        <div class="lg:hidden bg-gray-800 p-4 fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out sidebar_main"
            id="mobile-sidebar">
            <button onclick="toggleSidebar()" class="text-white absolute top-4 right-4">✕</button>
            <div class="flex flex-col items-center gap-4 p-6 border-b ">
                <div class="shrink-0">
                    <a href="#" class="relative flex items-center justify-center w-16 h-16 text-white rounded-full">
                        <img src='assets/about/munna.jpg' alt="user name" title="user name"
                            class=" w-16 h-16 rounded-full" />
                        <span
                            class="absolute bottom-0 right-0 inline-flex items-center justify-center gap-1 p-1 text-sm text-white border-2 border-white rounded-full bg-emerald-500"><span
                                class="sr-only"> online </span></span>
                    </a>
                </div>
                <div class="flex flex-col gap-0 min-h-[2rem] items-start justify-center w-full min-w-0 text-center">
                    <h4 class="w-full text-base truncate text-slate-700">Md Mustafijur Rahman Munna</h4>
                    <p class="w-full text-sm truncate text-slate-500">Hotel Manager</p>
                </div>
            </div>

            <!-- side nav  -->
            <nav class="titel_content">
                <!-- dashboard  -->
                <a href="main_dashboard.php?page=dashboard"
                    class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard') || !isset($_GET['page']) ? 'bg-emerald-300' : ''; ?>">
                    Dashboard
                </a>

                <!-- hotel  -->
                <a href="main_dashboard.php?page=hotel" class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'hotel') ? 'bg-emerald-300' : ''; ?>">
                    Hotels
                </a>

                <!-- transition  -->
                <a href="main_dashboard.php?page=hotel" class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 text-lg
                <?php echo (isset($_GET['page']) && $_GET['page'] == 'transaction') ? 'bg-emerald-300' : ''; ?>">
                    Transaction
                </a>

                <!-- room book  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-room-book" data-collapse-toggle="dropdown-room-book">
                    <div class="flex justify-between items-center text-lg">
                        <span> Room Book</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-room-book" class="hidden py-2 space-y-2 ">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Checkout</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Status</a></li>
                </ul>

                <!-- Room Facilities  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-room-facilities" data-collapse-toggle="dropdown-room-facilities">
                    <div class="flex justify-between items-center text-lg">
                        <span> Room Facilities</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-room-facilities" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities
                            Details</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Size</a></li>
                </ul>

                <!-- housekepping  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-housekeeping" data-collapse-toggle="dropdown-housekeeping">
                    <div class="flex justify-between items-center text-lg">
                        <span>Housekeeping</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-housekeeping" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Assign
                            Room</a></li>
                </ul>

                <!-- room settings  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-rooms-setting" data-collapse-toggle="dropdown-rooms-setting">
                    <div class="flex justify-between items-center text-lg">
                        <span> Rooms Settings</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-rooms-setting" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Bed
                            List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Floor
                            Plan List</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room
                            Images</a></li>
                </ul>

                <!-- report  -->
                <div class="block py-3 px-4 rounded transition-colors hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50"
                    aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                    <div class="flex justify-between items-center text-lg">
                        <span> Reports</span> <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                </div>
                <ul id="dropdown-reports" class="hidden py-2 space-y-2">
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking
                            Reports</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Purchase
                            Reports</a></li>
                    <li><a href="#"
                            class="flex items-center w-full p-2 text-lg font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Stock
                            Reports</a></li>
                </ul>


                <!-- logout  -->
                <footer class="p-3 border-t border-slate-200">
                    <a href="#"
                        class="flex items-center gap-3 p-3 transition-colors rounded text-slate-900 hover:text-emerald-500 ">
                        <div class="flex items-center self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6" aria-label="Dashboard icon"
                                role="graphics-symbol">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div
                            class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-lg font-medium truncate">
                            Logout
                        </div>
                    </a>
                </footer>
            </nav>
        </div>
    </section>

    <script>
        // toggle sidebar for mobile device  
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // dropdown script 
        document.querySelectorAll('[data-collapse-toggle]').forEach((toggle) => {
            toggle.addEventListener('click', (e) => {
                const target = document.getElementById(toggle.getAttribute('aria-controls'));
                target.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>