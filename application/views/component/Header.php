<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<body>
    <navbar class="h-[80px] shadow-lg px-[44px] justify-between flex items-center relative">
        <div class="w-[50px] h-[50px] overflow-hidden rounded-full z-10">
            <img src="<?= base_url('assets/image/logo.png'); ?>" alt="">
        </div>
        <div class="absolute left-0 right-0 z-100">
            <h1 class="text-center font-bold text-[30px] text-[#ed8455]">SCi Labs</h1>
        </div>
        <ul class="flex text-[14px] items-center text-[#808080] z-0">
            <li class="mx-[10px]">
                <a href="/">หน้าหลัก</a>
            </li>
            <li class="mx-[10px]">
                <a href="#">กิจกรรม</a>
            </li>
            <li class="mx-[10px]">
                <a href="#">ผลการการแข่งขัน</a>
            </li>
            <li class="mx-[10px]">
                <a href="#">อันดับ</a>
            </li>
            <li class="mx-[10px]">
                <a href="#">โปรไฟล์</a>
            </li>
        </ul>
    </navbar>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>