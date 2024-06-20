<?php
// URL API yang ingin diakses
$apiUrl = 'https://diyrecom-ikm3r7hutq-et.a.run.app/recommend_restaurant';
$ue = 'https://diyrecom-ikm3r7hutq-et.a.run.app/recommend_food';

// // iki pertama aku nangkep url API e
// $yt = file_get_contents($ue);
// // kedua mengubah url yang ditangkap tadi ke json
// $phpObject = json_decode($yt);
// // kedua menghilangkan petik dua di json e 
// $phpObject = trim($phpObject, "\"");
// // ketiga mengubah bentuk ke JSON lagi 
// $op = json_decode($phpObject);
// echo 'Raw API Response:';
// echo '<pre>';
// echo htmlspecialchars($phpObject);
// echo '</pre>';
// echo '<pre>';
// print_r($phpObject);
// echo '</pre>';

// foreach ($op as $item) {
//     echo 'Makanan: ' . $item->Makanan . '<br>';
//     echo 'Similarity Score: ' . $item->similarity_score . '<br>';
//     echo 'Kategori: ' . $item->kategori . '<br>';
//     echo 'Deskripsi Rasa: ' . $item->deskripsi_rasa . '<br>';
//     echo 'Foto: ' . $item->foto . '<br><br>';
// }
// Parameter kata kunci dari query string
if (isset($_GET['category']) && isset($_GET['taste'])) {
    // Jika ada parameter category dan taste
    $category = $_GET['category'];
    $taste = $_GET['taste'];
    // Buat URL lengkap dengan category dan taste
    $url = $ue . '?category=' . urlencode($category) . '&taste=' . urlencode($taste);
    //  Buat URL lengkap dengan keyword
    $getUrl = file_get_contents($url);
    $object = json_decode($getUrl);
    $response = trim($object, "\"");
    // echo $response;
} else if (isset($_GET['keyword'])) {
    // Jika hanya ada parameter keyword
    $keyword = $_GET['keyword'];

    // Buat URL lengkap dengan keyword
    $url = $apiUrl . '?keyword=' . urlencode($keyword);
    $response = file_get_contents($url);
} else {
    // Jika tidak ada parameter yang valid
    die('Invalid parameters');
}

$json = json_decode($response);

if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Invalid JSON received');
}

// Setel header agar browser mengenali respons sebagai JSON
header('Content-Type: application/json');

// Keluarkan respons ke frontend
echo $response;
