<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelix || Services</title>

    <style>
        /* From Uiverse.io by Pradeepsaranbishnoi */ 
.wallet {
  --bg-color: #60a5fa;
  --bg-color-light: #ffffff;
  --text-color-hover: #fff;
  --box-shadow-color: #3ed766;
}

.card {
  width: 100%;
  height: 321px;
  border-top-right-radius: 10px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  transition: all 0.4s ease-out;
  text-decoration: none;
  border: 1px solid #60a5fa;
 
}

.card:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 0 24px 36px rgba(0, 0, 0, 0.11),
    0 5px 14px var(--box-shadow-color);
}

.card:hover .overlay {
  transform: scale(4) translateZ(0);
}

.card:hover .circle {
  border-color: var(--bg-color-light);
  background: var(--bg-color);
}

.card:hover .circle:after {
  background: var(--bg-color-light);
}

.card:hover p {
  color: var(--text-color-hover);
}

.card p {
  font-size: 17px;
  color: #4c5656;
  margin-top: 30px;
  z-index: 1000;
  transition: color 0.4s ease-out;
}

.circle {
  border: 2px solid var(--bg-color);
  transition: all 0.4s ease-out;
}

.circle:after {
  content: "";
  width: 118px;
  height: 118px;
  display: block;
  position: absolute;
  background: #ffffff96;
  border-radius: 50%;
  top: 7px;
  left: 7px;
  transition: opacity 0.4s ease-out;
}

.circle img {
  z-index: 10000;
  transform: translateZ(0);
}

.overlay {
  background: var(--bg-color);
  transition: transform 0.4s ease-out;
}
    </style>
    
</head>

<body>
    <section class="grid grid-cols-3 gap-5">
        
        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/cctv-camera.png' ?>" alt="security" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/free-wifi.png' ?>" alt="free-wifi" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/laundry.png' ?>" alt="laundry" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/room-service.png' ?>" alt="room-service" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/satisfaction.png' ?>" alt="low-rated" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

        <div class="card wallet bg-[--primary-color] flex overflow-hidden flex-col justify-center items-center relative">
            <div class="overlay w-[118px] h-[130px] absolute rounded-full top-[67px] left-[110px] z-0"></div>
                <div class="circle w-[131px] h-[131px] flex justify-center items-center relative rounded-full bg-white z-10">
                    <img src="<?php echo './hotelix/assets/services/cloudy-night.png' ?>" alt="night-service" class="w-16">
                </div>
            <p>Wallet</p>
        </div>

    </section>
</body>

</html>