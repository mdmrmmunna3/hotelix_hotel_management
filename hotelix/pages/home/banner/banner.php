<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>
</head>

<body>
    <!-- md:h-[500px] lg:h-[600px] h-[300px] -->
    <div class="swiper mySwiper overflow-hidden w-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="relative overflow-hidden">
                    <img class="lg:h-[100%] md:h-[600px] h-[400px] w-full"
                        src="<?php echo './hotelix/assets/banner/banner-1.jpg' ?>" loading="lazy" alt="bannerImg" />
                    <div class="absolute inset-0 bg-black opacity-50 h-full w-full"></div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center leading-relaxed text-white">
                        <p class="md:text-5xl text-3xl titel ">Enjoy Your Stay</p>
                        <h3 class="lg:text-6xl md:text-5xl font-bold my-3 uppercase titel_content">
                            <span class="block">Enjoy & Relax </span>
                            <span>Luxury Hotel In City</span>
                        </h3>
                        <div class="exploreBtn">
                            <a href="#"
                                class="relative inline-block px-5 py-2 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group">
                                <span
                                    class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                                <div class="relative z-10 text-white">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                    <span>Explore</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>

            <div class="swiper-slide">
                <div class="relative overflow-hidden">
                    <img class="lg:h-[100%] md:h-[600px] h-[400px] w-full"
                        src="<?php echo './hotelix/assets/banner/banner-2.jpg' ?>" loading="lazy" alt="bannerImg" />
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center leading-relaxed text-white">
                        <p class="md:text-5xl text-3xl titel">A memorable stay</p>
                        <h3 class="lg:text-6xl md:text-5xl font-bold my-3 uppercase titel_content">
                            <span class="block">stress-relieving </span>
                            <span>experience</span>
                        </h3>
                        <div class="exploreBtn">
                            <a href="#"
                                class="relative inline-block px-5 py-2 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group">
                                <span
                                    class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                                <div class="relative z-10 text-white">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                    <span>Explore</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>

            <div class="swiper-slide">
                <div class="relative overflow-hidden">
                    <img class="lg:h-[100%] md:h-[600px] h-[400px] w-full"
                        src="<?php echo './hotelix/assets/banner/banner-3.jpg' ?>" loading="lazy" alt="bannerImg" />
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center leading-relaxed text-white">
                        <p class="md:text-5xl text-3xl titel">The budget rooms</p>
                        <h3 class="lg:text-6xl md:text-5xl font-bold my-3 uppercase titel_content">
                            <span class="block">Style accompanied </span>
                            <span>by comfort</span>
                        </h3>
                        <div class="exploreBtn">
                            <a href="#"
                                class="relative inline-block px-5 py-2 border-2 rounded-lg border-blue-500 hover:text-white overflow-hidden group">
                                <span
                                    class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300 ease-out"></span>
                                <div class="relative z-10 text-white">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                    <span>Explore</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>

        </div>

        <div class="swiper-pagination"></div>
    </div>
</body>

</html>