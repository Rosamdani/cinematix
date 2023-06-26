<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/studio.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$seat = curl_exec($curl);
$data_seat = json_decode($seat, true);
$data_seat = $data_seat['data'];
curl_close($curl);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/film.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$bioskop = curl_exec($curl);
$data_bioskop = json_decode($bioskop, true);
curl_close($curl);

print_r($data_seat);
// Menampilkan data
foreach ($data_seat as $item) {
    $tanggal = $item['nama_studio'];
    $id_bioskop = $item['studio'];
    $id_studio = $item['id_studio'];

    echo "Nama : $tanggal<br>";
    echo "Studio : $id_bioskop<br>";
    echo "ID Studio: $id_studio<br>";
    echo "<br>";
}