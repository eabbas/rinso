<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="icon" href="./img/removed1.png" type="image/png">
    <title>home</title>
</head>

<body class="bg-[#fcfcfc]">
    <div class="w-full py-3 bg-gray-500 text-center text-white">ADS</div>
    <header class="2xl:container m-auto w-11/12 flex flex-row justify-between items-center py-5">
        <div>
            <div class="text-xs text-gray-400">
                سلام
            </div>
            <div class="font-bold text-gray-700">
                متن تستی تستی
            </div>
        </div>
        <div class="flex flex-row items-center gap-5">
            <a href="#" class="size-8 bg-white rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                    <path fill="#3b3b3b"
                        d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z" />
                </svg>
            </a>
            <a href="#" class="size-8 bg-white rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                    <path fill="#3b3b3b"
                        d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                </svg>
            </a>
        </div>
    </header>
    <main class="2xl:container w-11/12 m-auto mb-20">
        <!-- banner -->
        <section class="w-full">
            <div>
                <a href="#" class="inline-block w-full h-[180px]">
                    <img src="./img/i.webp" class="size-full object-cover rounded-lg" alt="stor banner">
                </a>
            </div>
            <div class="mt-3">
                <p class="text-sm text-gray-500 text-justify leading-[180%]">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                    نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                </p>
            </div>
        </section>
        <!-- banner end -->

        <!-- categories -->
        <section class="mt-4 w-full overflow-x-auto">
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-white rounded-lg p-3">
                    <a href="#" class="flex flex-col items-center gap-3">
                        <img src="./img/burger-huge.png" class="w-1/2 m-auto" alt="">
                        <span class="block text-gray-700 text-sm">
                            همبرگر
                        </span>
                    </a>
                </div>
                <div class="bg-white rounded-lg p-3">
                    <a href="#" class="flex flex-col items-center gap-3">
                        <img src="./img/chips.png" class="w-1/2 m-auto" alt="">
                        <span class="block text-gray-700 text-sm">
                            همبرگر
                        </span>
                    </a>
                </div>
                <div class="bg-white rounded-lg p-3">
                    <a href="#" class="flex flex-col items-center gap-3">
                        <img src="./img/fast-food.png" class="w-1/2 m-auto" alt="">
                        <span class="block text-gray-700 text-sm">
                            همبرگر
                        </span>
                    </a>
                </div>
                <div class="bg-white rounded-lg p-3">
                    <a href="#" class="flex flex-col items-center gap-3">
                        <img src="./img/meat.png" class="w-1/2 m-auto" alt="">
                        <span class="block text-gray-700 text-sm">
                            همبرگر
                        </span>
                    </a>
                </div>

            </div>
        </section>
        <!-- categories end -->

        <!-- products -->

        <section class="mt-4 w-full">
            <!-- heading -->
            <div class="w-full py-3 flex flex-row justify-between items-center">
                <div>
                    <h2 class="text-gray-700 font-bold">
                        بیشترین فروش
                    </h2>
                </div>
                <div>
                    <a href="#" class="text-blue-500 text-sm">
                        مشاهده همه
                    </a>
                </div>
            </div>
            <!-- heading -->

            <div class="grid grid-cols-2 gap-3">

                <!-- product card -->
                <div class="w-full bg-white rounded-lg p-3 flex flex-col gap-2">
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-gray-700 font-bold">
                            باهالی پیتزا
                        </h3>
                        <span class="text-xs text-gray-500">
                            180000 تومان
                        </span>
                    </div>
                    <div class="w-full">
                        <img class="size-[148px]" src="./img/removed1.png" alt="">
                    </div>
                    <div class="flex flex-row gap-2">
                        <img class="size-4" src="./img/fire.svg" alt="">
                        <span class="text-xs font-bold text-gray-700">
                            44 فروش در یک روز
                        </span>
                    </div>
                    <div class="flex flex-row justify-between items-center mt-2">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                                    <path fill="#3B3B3B"
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>

                            </div>
                            <div>
                                <span class="text-xs text-gray-500">
                                    40 دقیقه
                                </span>
                            </div>
                        </div>
                        <div class="size-5 rounded-md bg-lime-400 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- product card end -->


                <!-- product card -->
                <div class="w-full bg-white rounded-lg p-3 flex flex-col gap-2">
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-gray-700 font-bold">
                            باهالی پیتزا
                        </h3>
                        <span class="text-xs text-gray-500">
                            180000 تومان
                        </span>
                    </div>
                    <div class="w-full">

                    <img class="size-[148px]"
                    src="<?php// asset("storage/" . $media?->path) ?>"
                    alt="product image">

                        <!-- <img class="size-[148px]" src="./img/removed1.png" alt=""> -->

                    </div>
                    <div class="flex flex-row gap-2">
                        <img class="size-4" src="./img/fire.svg" alt="">
                        <span class="text-xs font-bold text-gray-700">
                            44 فروش در یک روز
                        </span>
                    </div>
                    <div class="flex flex-row justify-between items-center mt-2">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                                    <path fill="#3B3B3B"
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>

                            </div>
                            <div>
                                <span class="text-xs text-gray-500">
                                    40 دقیقه
                                </span>
                            </div>
                        </div>
                        <div class="size-5 rounded-md bg-lime-400 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- product card end -->


            </div>

        </section>

        <!-- products end -->
    </main>
    <footer class="w-full mt-5 py-4 flex flex-row justify-center fixed bottom-0 right-0 bg-[#fcfcfc] rounded-full">
        <div class="w-11/12 m-auto flex flex-row justify-between items-center">
            <a href="#" class="flex flex-row items-center gap-2 bg-lime-400 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                    <path fill="white"
                        d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z" />
                </svg>
                <span class="text-xs text-white font-bold">
                    خانه
                </span>
            </a>
            <a href="#" class="bg-white rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                    <path fill="#3b3b3b"
                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                </svg>
            </a>
            <a href="#" class="bg-white rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                    <path fill="#3b3b3b" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H69.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H199.7c-11.5 0-21.4-8.2-23.6-19.5L170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32h-411C111 12.8 91.6 0 69.5 0H24zM131.1 80H520.7L482.4 222.2c-2.8 10.5-12.3 17.8-23.2 17.8H161.6L131.1 80zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/>
                </svg>
            </a>
            <a href="#" class="bg-white rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                    <path fill="#3b3b3b" d="M64 64C28.7 64 0 92.7 0 128v60.1c0 10.2 6.4 19.2 16 22.6c18.7 6.6 32 24.4 32 45.3s-13.3 38.7-32 45.3c-9.6 3.4-16 12.5-16 22.6V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V323.9c0-10.2-6.4-19.2-16-22.6c-18.7-6.6-32-24.4-32-45.3s13.3-38.7 32-45.3c9.6-3.4 16-12.5 16-22.6V128c0-35.3-28.7-64-64-64H64zM48 128c0-8.8 7.2-16 16-16H512c8.8 0 16 7.2 16 16v44.9c-28.7 16.6-48 47.6-48 83.1s19.3 66.6 48 83.1V384c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V339.1c28.7-16.6 48-47.6 48-83.1s-19.3-66.6-48-83.1V128zM400 304H176V208H400v96zM128 192V320c0 17.7 14.3 32 32 32H416c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160c-17.7 0-32 14.3-32 32z"/>
                </svg>
            </a>
            <a href="#" class="bg-white rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                    <path fill="#3b3b3b" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                </svg>
            </a>
        </div>
    </footer>


</body>

</html>