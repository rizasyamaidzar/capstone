<?php
// URL API yang ingin diakses
$apiUrl = 'https://diyrecom-ikm3r7hutq-et.a.run.app/recommend_restaurant';
$keyword = $_GET['keyword'];
$url = $apiUrl . '?keyword=' . urlencode($keyword);
$response = file_get_contents($url);
$json = json_decode($response);
// echo $response;
// foreach ($json as $item) {
//   echo 'Warung: ' . $item[0] . '<br>';
//   echo 'Lokasi : ' . $item[1] . '<br>';
//   echo 'Kategori: ' . $item[2] . '<br>';
//   echo 'Menu: ' . $item[3] . '<br>';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIY Food </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            hijau: '#004225',
            kuning: '#FF7622'
          }
        }
      }
    }
  </script>
</head>

<body>

  <!-- navbar -->
  <nav class="bg-hijau">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <a href="index.html"><img class="h-8 w-auto" src="img/logo/logo (2).png" alt="Your Company"></a>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <a href="form.html" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Cari Makanan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
      </div>
    </div>
  </nav>
  <!-- END navbar -->
  <!-- Tampil informasi Resto  -->
  <section class="bg-[url('img/home/gudeg.png')] bg-cover py-10">
    <!-- bg-white shadow-black shadow-lg rounded-xl opacity-50 -->
    <?php
    foreach ($json as $item) {
    ?>
      <div class="grid grid-cols-2 gap-4 container mx-auto shadow-black shadow-lg rounded-xl bg-hijau/50 my-5">
        <div class="mx-auto my-20 px-5 max-w-md">
          <h1 class="font-bold text-2xl text-white my-5"><?= $item[0] ?></h1>
          <h1 class="font-bold text-2xl text-kuning"><?= $item[3] ?></h1>
        </div>
        <div class="mx-auto my-auto">
          <a href="<?= $item[1] ?>" class="bg-kuning shadow-md text-white shadow-black p-5 text-2xl rounded-xl font-bold">View Location</a>
        </div>
      </div>
    <?php
    }
    ?>

  </section>
  <!-- END Tampil informasi Resto  -->




  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>