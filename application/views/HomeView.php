<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="">
    <!-- Header -->
    <header class="">
        <?php $this->load->view('component/Header'); ?>
    </header>

    <!-- Content -->
    <main class="">
        <!-- image -->
        <section class="h-[400px] w-full">
            <img src="<?= base_url('assets/image/bgActor.png') ?>" alt="Background Image" class="h-full w-full object-cover">
        </section>

        <!-- Blogs section -->
        <section class="px-[114px] flex justify-between my-10">
            <div class="w-[900px]">
                <!-- New -->
                <div class="mb-5">
                    <div class="flex items-end justify-between py-3">
                        <h1 class="text-[#505050] text-[30px]">กิจกรรมมาใหม่</h1>
                        <p class="text-[#505050] text-[12px]">เพิ่มเติม...</p>
                    </div>

                    <!-- blog -->
                    <div class="">
                        <?php $this->load->view('component/Card'); ?>
                    </div>
                </div>
    
                <!-- Popular -->
                <div class="mb-5">
                    <div class="flex items-end justify-between py-3">
                        <h1 class="text-[#505050] text-[30px]">กิจกรรมยอดนิยม</h1>
                        <p class="text-[#505050] text-[12px]">เพิ่มเติม...</p>
                    </div>

                    <!-- blog -->
                    <div class="">
                        <?php $this->load->view('component/Card'); ?>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <div class="flex justify-center items-center">
                <h1 class="text-[128px] text-[#FFFBDA] rotate-90">Activities</h1>
            </div>
        </section>

        <!-- image activity -->
         <section class="px-[114px] mt-[5rem]">
            <h1 class="text-[30px] text-[#505050] mb-10">ภาพกิจกรรม</h1>
            <div class="grid grid-rows-2">
                <!-- ac 1 -->
                <div class="grid grid-cols-2">
                    <!-- content -->
                    <div class="text-[#808080] gap-y-4 w-full h-full flex flex-col items-center justify-center px-[7rem]">
                        <h3 class="text-[25px] text-[#ed9455]">ชื่อกิจกรรม</h3>
                        <p class="indent-8 text-balance text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil maxime cupiditate est laboriosam excepturi nam exercitationem commodi error autem molestias sapiente saepe, rem non debitis odit omnis minima rerum culpa?</p>
                        <div class="w-full">
                            <p class="text-end">31/10/2594</p>
                        </div>
                    </div>
                    <!-- image -->
                    <div class="w-full [560px]">
                        <img src="<?= base_url('assets/image/bgActor.png') ?>" alt="" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- ac 2 -->
                <div class="grid grid-cols-2">
                    <!-- image -->
                    <div class="w-full h-[560px]">
                        <img src="<?= base_url('assets/image/bgActor.png') ?>" alt="" class="w-full h-full object-cover">
                    </div>

                    <!-- content -->
                    <div class="text-[#808080] gap-y-4 w-full h-full flex flex-col items-center justify-center px-[7rem]">
                        <h3 class="text-[25px] text-[#ed9455]">ชื่อกิจกรรม</h3>
                        <p class="indent-8 text-balance text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos porro nam voluptas necessitatibus nesciunt assumenda dolores mollitia molestias, tempore fugiat nobis impedit esse labore accusantium nostrum aliquid ipsa omnis dicta?</p>
                        <div class="w-full">
                            <p class="text-end">31/10/2594</p>
                        </div>
                    </div>
                </div>
            </div>
         </section>
    </main>

    <!-- Footer -->
    <footer class="text-center py-5 bg-gray-800 text-white">
        &copy; <?= date('Y'); ?> NPRU. All rights reserved.
    </footer>
</div>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
