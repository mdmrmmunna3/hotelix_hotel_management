<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/hotelix_hotel_management/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Dashboard</title>
    <!-- tailwind css plugin cdn link (daisyui) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- ======== font awesome  link ========= -->
    <script src="https://kit.fontawesome.com/9ce82b2c02.js" crossorigin="anonymous"></script>
    <!-- ========= tailwind css cdn link ======== -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ======== swiper cdn link css ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ======= vanila css ====== -->
    <link rel="stylesheet" href="style.css">
    <!-- box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; -->
</head>
<body>
    <section>
        <!-- Component: Side navigation menu with user profile and alert message -->
        <!-- Mobile trigger -->
        <button title="Side navigation" type="button" class="fixed z-40 self-center order-10 visible block w-10 h-10 bg-white rounded opacity-100 lg:hidden left-6 top-6" aria-haspopup="menu" aria-label="Side navigation" aria-expanded="false" aria-controls="nav-menu-1">
            <div class="absolute w-6 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <span aria-hidden="true" class="absolute block h-0.5 w-9/12 -translate-y-2 transform rounded-full bg-slate-700 transition-all duration-300"></span>
                <span aria-hidden="true" class="absolute block h-0.5 w-6 transform rounded-full bg-slate-900 transition duration-300"></span>
                <span aria-hidden="true" class="absolute block h-0.5 w-1/2 origin-top-left translate-y-2 transform rounded-full bg-slate-900 transition-all duration-300"></span>
            </div>
        </button>

    <!-- Side Navigation -->
        <aside id="nav-menu-1" aria-label="Side navigation" class="fixed top-0 bottom-0 left-0 z-40 flex flex-col transition-transform -translate-x-full bg-white border-r w-72 sm:translate-x-0 ">
            <div class="flex flex-col items-center gap-4 p-6 border-b ">
                <div class="shrink-0">
                <a href="#" class="relative flex items-center justify-center w-16 h-16 text-white rounded-full">
                    <img src='assets/about/munna.jpg' alt="user name" title="user name"  class=" w-16 h-16 rounded-full" />
                    <span class="absolute bottom-0 right-0 inline-flex items-center justify-center gap-1 p-1 text-sm text-white border-2 border-white rounded-full bg-emerald-500"><span class="sr-only"> online </span></span>
                </a>
                </div>
                <div class="flex flex-col gap-0 min-h-[2rem] items-start justify-center w-full min-w-0 text-center">
                <h4 class="w-full text-base truncate text-slate-700">Md Mustafijur Rahman Munna</h4>
                <p class="w-full text-sm truncate text-slate-500">Hotel Manager</p>
                </div>
            </div>
            <nav aria-label="side navigation" class="flex-1 overflow-auto divide-y divide-slate-100">
                <div>
                <ul class="flex flex-col flex-1 gap-1 py-3">
                    <li class="px-3">
                    <a href="#" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 ">
                        <div class="flex items-center self-center">
                        
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                        Dashboard
                        </div>
                    </a>
                    </li>
                    <li class="px-3">
                    <a href="#" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 ">
                        <div class="flex items-center self-center ">
                        
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                        Hotel
                        </div>
                       
                    </a>
                    </li>
                    <li class="px-3">
                        <a href="#" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 ">
                            <div class="flex items-center self-center ">
                            
                            </div>
                            <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                            Transaction
                            </div>
                        </a>
                    </li>

                    <li class="px-3">
                            <a class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 w-full" aria-controls="dropdown-room-book" data-collapse-toggle="dropdown-room-book">
                            <div class="flex items-center self-center">
                        
                            </div>
                                <span class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate" sidebar-toggle-item>Room Book</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <ul id="dropdown-room-book" class="hidden py-2 space-y-2">
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking List</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room Checkout</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room Status</a></li>
                            </ul>
                        </li>

                        <li class="px-3">
                            <a class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 w-full" aria-controls="dropdown-room-facilities" data-collapse-toggle="dropdown-room-facilities">
                            <div class="flex items-center self-center">
                        
                            </div>
                                <span class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate" sidebar-toggle-item>Room Facilities</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <ul id="dropdown-room-facilities" class="hidden py-2 space-y-2">
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities List</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Facilities Details</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room Size</a></li>
                            </ul>
                        </li>

                        <li class="px-3">
                            <a class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 w-full" aria-controls="dropdown-housekeeping" data-collapse-toggle="dropdown-housekeeping">
                            <div class="flex items-center self-center">
                        
                            </div>
                                <span class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate" sidebar-toggle-item>Housekeeping</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <ul id="dropdown-housekeeping" class="hidden py-2 space-y-2">
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Assign Room</a></li>
                            </ul>
                        </li>

                        <li class="px-3">
                            <a class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 w-full" aria-controls="dropdown-rooms-setting" data-collapse-toggle="dropdown-rooms-setting">
                            <div class="flex items-center self-center">
                        
                            </div>
                                <span class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate" sidebar-toggle-item>Rooms Settings</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <ul id="dropdown-rooms-setting" class="hidden py-2 space-y-2">
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Bed List</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Floor Plan List</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Room Images</a></li>
                            </ul>
                        </li>

                        <li class="px-3">
                            <a class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 w-full" aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                            <div class="flex items-center self-center">
                        
                            </div>
                                <span class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate" sidebar-toggle-item>Reports</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <ul id="dropdown-reports" class="hidden py-2 space-y-2">
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Booking Reports</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Purchase Reports</a></li>
                                <li><a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-emerald-500 hover:bg-emerald-50 focus:bg-emerald-50 aria-[current=page]:text-emerald-500 aria-[current=page]:bg-emerald-50 pl-11">Stock Reports</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                
            </nav>
        
            <footer class="p-3 border-t border-slate-200">
                <a href="#" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-900 hover:text-emerald-500 ">
                <div class="flex items-center self-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" aria-label="Dashboard icon" role="graphics-symbol">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                    Logout
                </div>
                </a>
            </footer>
        </aside>

    <!-- Backdrop -->
        <div class="fixed top-0 bottom-0 left-0 right-0 z-30 transition-colors bg-slate-900/20 sm:hidden"></div>
    <!-- End Side navigation menu with user profile and alert message -->
    </section>


        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdownToggles = document.querySelectorAll('[data-collapse-toggle]');

            dropdownToggles.forEach(toggle => {
                const menuId = toggle.getAttribute('aria-controls');
                const dropdownMenu = document.getElementById(menuId);

                toggle.addEventListener('click', () => {
                    dropdownMenu.classList.toggle('hidden');
                });
            });
        });


        </script>

</body>
</html>