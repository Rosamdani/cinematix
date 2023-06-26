<?php
$curl = curl_init();
$code = $_GET['id'];
curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/index.php?id=' . $code);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$data = json_decode($response, true);

$data = $data['data'];
curl_close($curl);


foreach ($data as $item) {
    $judul = $item['judul'];
    $producer = $item['producer'];
    $poster = $item['poster'];
    $id_film = $item['id_film'];
    $thumbnail = $item['thumbnail'];
    $sinopsis = $item['sinopsis'];
    $genre = $item['genre'];
    $time = $item['time'];
    $usia = $item['usia'];

    $time = $time * 60;
}



?>

<?php
//--------------------------konversi waktu----------------------------
function waktu($time)
{

    if (($time > 0) and ($time < 60)) {
        $lama = number_format($time) . " detik";
        return $lama;
    }
    if (($time > 60) and ($time < 3600)) {
        $detik = fmod($time, 60);
        $menit = $time - $detik;
        $menit = $menit / 60;
        $lama = $menit . " Menit " . number_format($detik) . " detik";
        return $lama;
    }
    if ($time >= 3600) {
        $detik = fmod($time, 60);
        $tempmenit = ($time - $detik) / 60;
        $menit = fmod($tempmenit, 60);
        $jam = ($tempmenit - $menit) / 60;
        $lama = $jam . " Jam " . $menit . " Menit " . number_format($detik) . " detik";
        return $lama;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Deskripsi</title>

</head>

<body>

    <!-- navbar -->
    <nav>
        <div class="w-full flex space-x-6 px-5 bg-slate-800 h-20 items-center text-white">
            <div class="logoutama">
                <img src="gambar/sinematix.png" alt="">
            </div>

            <ul class="flex space-x-4">
                <li>
                    <a href="" class="flex space-x-1 items-center shadow-lg hover:bg-slate-900 rounded px-2 py-1">
                        <img src="gambar/play1.png" class="w-8" alt="">
                        <p>Sedang Tayang</p>
                    </a>
                </li>
                <li>
                    <a href="" class="flex space-x-1 items-center shadow-lg hover:bg-slate-900 rounded px-2 py-1">
                        <img src="gambar/movie.png" class="w-8" alt="">
                        <p>Bioskop</p>
                    </a>
                </li>
                <li>
                    <a href="" class="flex space-x-1 items-center shadow-lg hover:bg-slate-900 rounded px-2 py-1">
                        <img src="gambar/megaphone.png" class="w-8" alt="">
                        <p>Akan Datang</p>
                    </a>
                </li>
                <li>
                    <a href="" class="flex space-x-1 items-center shadow-lg hover:bg-slate-900 rounded px-2 py-1">
                        <img src="gambar/lokasi.png" class="w-8" alt="">
                        <p>Lokasi</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class=" mx-auto w-[90%] bg-gray-200 min-h-[100vh] border mt-3 ">
        <div class="gambardesk mx-auto bg-black flex justify-center items-center w-[90%] mt-3">
            <iframe width="560" height="315" src="<?= $thumbnail ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div class="w-[70%] mt-3 mx-auto  flex relative">
            <div class="w-[30%] absolute -top-14 rounded shadow-md overflow-hidden ">
                <img class="gambarfilm" src="<?php echo $poster ?>" alt=""></img>

            </div>

            <div class="ml-[40%] ">
                <h1 class="text-2xl"><?php echo $judul ?></h1>
                <table>
                    <th>
                        <tr class="text-left">
                            <th>Genre</th>
                            <td class="px-5">:</td>
                            <td><?php echo $genre    ?></td>
                        </tr>
                    </th>
                    <th>
                        <tr class="text-left">
                            <th>Durasi</th>
                            <td class="px-5">:</td>
                            <td><?php $jam = waktu($time);
                                echo $jam  ?></td>

                        </tr>
                        <tr class="text-left">
                            <th> Producer</th>
                            <td class="px-5">:</td>
                            <td><?php echo $producer ?></td>
                        </tr>
                        <tr class="text-left">
                            <th>Usia</th>
                            <td class="px-5">:</td>
                            <td><?php echo $usia ?></td>
                        </tr>

                </table>
            </div>


        </div>
            
    </div>

    <?php
    // Mendapatkan tanggal hari ini
    $tanggalHariIni = date('Y-m-d');

    // Membuat array untuk menyimpan tanggal-tanggal
    $tanggal30HariKedepan = [];

    // Mengulang sebanyak 30 hari
    for ($i = 0; $i < 10; $i++) {
        // Menambahkan i hari ke tanggal hari ini
        $tanggal = date('Y-m-d', strtotime("+$i days", strtotime($tanggalHariIni)));

        // Menambahkan tanggal ke array
        $tanggal10HariKedepan[] = $tanggal;
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/bioskop.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $bioskop = curl_exec($curl);
    $data_bioskop = json_decode($bioskop, true);

    $data_bioskop = $data_bioskop['data'];
    curl_close($curl);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/studio.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $studio = curl_exec($curl);
    $data_studio = json_decode($studio, true);

    $data_studio = $data_studio['data'];
    curl_close($curl);

    ?>

    <div class="w-[90%] mx-auto">
        <form action="seat.php" method="POST" class="jadwal-form w-[94%] my-3 mx-auto">
            <input type="hidden" name="id_film" value="<?= $id_film ?>">

            <ul class="flex overflow-x-auto space-x-2 my-5">

                <?php

                foreach ($tanggal10HariKedepan as $tgl) {
                    // Set lokalisasi ke bahasa Indonesia
                    if ($tgl == date("Y-m-d")) {
                        $hari = "Today";
                    } else {
                        $hari = strftime("%a", strtotime($tgl));
                    }
                    $tanggall = strftime("%d", strtotime($tgl));
                    $bulan = strftime("%b", strtotime($tgl));

                ?>

                    <!-- <div class="cursor-pointer w-[250px] h-fit  radio-checked:text-white radio-checked:bg-slate-600 hover:shadow-mds">
                        <input type="radio" required class="radio" name="tanggal" value="<?= $tgl ?>">
                        <div class="flex flex-col border-2 text-slate-600 border-slate-600 items-center rounded-md w-[250px] py-1">
                            <span class="text-2xl font-bold"><?= $tanggall ?> <?= $bulan ?></span>
                            <span class="text-2xl font-bold"><?= $hari ?></span>
                        </div>
                    </div> -->

                    <li>
                        <input type="radio" id="<?= $tgl ?>" name="tgl" value="<?= $tgl ?>" class="hidden peer" required>
                        <label for="<?= $tgl ?>" class="inline-flex items-center justify-center w-[300px] px-20 py-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100">
                            <div class="block">
                                <div class="w-full text-lg font-semibold"><?= $tanggall ?> <?= $bulan ?></div>
                                <div class="w-full"><?= $hari ?></div>
                            </div>
                        </label>
                    </li>

                <?php
                }


                ?>
            </ul>

            <div class="bg-white flex flex-col space-y-3 w-full rounded-none">
                <?php

                foreach ($data_bioskop as $theater) {
                ?>

                    <div class="px-5 border-y-2 border-slate-300 bg-gray-100 py-2">
                        <div class="flex justify-between mb-3">
                            <div class="flex">
                                <button><img src="gambar/fav.png" alt="" class="w-8 h-8"></button>
                                <p class="text-3xl font-bold text-slate-600"><?= $theater['nama'] ?></p>
                            </div>
                        </div>
                        <a href="<?= $theater['maps'] ?>" class="text-gray-400 underline text-base"><?= $theater['lokasi'] ?></a>
                        <?php

                        foreach ($data_studio as $std) {
                            if ($std['id_bioskop'] == $theater['id_bioskop']) {
                                $format_angka = number_format($std['harga'], 0, ',', '.');
                        ?>

                                <div class="flex justify-between mt-3">
                                    <p class="text-gray-400 text-2xl font-bold"><?= $std['nama_studio'] ?></p>
                                    <p class="text-gray-400 text-2xl font-bold">Rp <?= $format_angka ?></p>
                                </div>
                                <ul class="grid grid-flow-col grid-col-7 gap-3">
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|12.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|12.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|12.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">12.00</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|14.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|14.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|14.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">14.00</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|16.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|16.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|16.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">16.00</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|18.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|18.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|18.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">18.00</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|20.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|20.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|20.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">20.00</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|22.00" name="jam" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|22.00" class="hidden peer" required>
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|22.00" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-slate-600 border rounded-lg cursor-pointer peer-checked:bg-slate-600 peer-checked:text-white hover:text-gray-600 hover:bg-slate-400">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">22.00</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>

                        <?php
                            }
                        }

                        ?>
                    </div>

                <?php
                }

                ?>
            </div>

            <button name="submit-tiket" class="w-full h-20 my-4 text-3xl font-bold rounded-md border border-slate-600 mx-auto text-slate-600 flex items-center justify-center">Pesan Tiket</button>

        </form>
    </div>

    <!-- <?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|12.00 -->

</body>

<!-- ajax -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.klik_menu').click(function() {
            var menu = $(this).attr('id');
            if (menu == "sinopsis") {

                $('.badan').load('sinopsis.php?id=<?php echo $item['id_film'] ?>');
                document.getElementById("jadwal").style = "border:none;";
                document.getElementById("sinopsis").style = "border-bottom:2px solid; color: black;";


            } else if (menu == "jadwal") {
                $('.badan').load('jadwal.php?id=<?php echo $item['id_film'] ?>');
                document.getElementById("sinopsis").style = "border:none;";
                document.getElementById("jadwal").style = "border-bottom:2px solid; color: black;";
            }
        });


        // halaman yang di load default pertama kali
        $('.badan').load('home.php');

    });
</script> -->

</html>