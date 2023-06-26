<?php
$id = $_GET['id'];
// Mendapatkan tanggal hari ini
$tanggalHariIni = date('Y-m-d');

// Membuat array untuk menyimpan tanggal-tanggal
$tanggal30HariKedepan = [];

// Mengulang sebanyak 30 hari
for ($i = 0; $i < 2; $i++) {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/jadwal.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container">
        <form action="seat.php" method="POST" class="jadwal-form w-[94%] my-3 mx-auto">

            <ul class="flex overflow-x-auto space-x-16">

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
                        <label for="<?= $tgl ?>" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
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

                    <div class="border-y-2 border-slate-300 bg-gray-100 py-2">
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

                                <div class="flex justify-between">
                                    <p class="text-gray-400 text-2xl font-bold"><?= $std['nama_studio'] ?></p>
                                    <p class="text-gray-400 text-2xl font-bold">Rp <?= $format_angka ?></p>
                                </div>
                                <div class="grid grid-cols-5 gap-4 mb-5">
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|12.00" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|12.00">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|12.00" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            12.00
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|14.00" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|14.00">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|14.00" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            14.00
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|16.30" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|16.30">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|16.30" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            16.30
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|17.40" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|17.40">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|17.40" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            17.40
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|19.00" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|19.00">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|19.00" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            19.00
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|20.50" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|20.50">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|20.50" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            20.50
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|21.30" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|21.30">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|21.30" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            21.30
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" required class="jam hidden absolute w-full h-full" name="jam" id="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|22.30" value="<?= $theater['id_bioskop'] ?>|<?= $std['harga'] ?>|<?= $std['id_studio'] ?>|22.30">
                                        <label for="<?= $theater['id_bioskop'] ?>|<?= $std['id_studio'] ?>|22.30" class="border-2 label cursor-pointer flex flex-col border-slate-600 items-center relative rounded-md px-2 py-1">
                                            22.30
                                        </label>
                                    </div>
                                </div>

                        <?php
                            }
                        }

                        ?>
                    </div>

                <?php
                }

                ?>
            </div>

            <button name="submit-tiket" class="w-full h-20 my-4 text-3xl font-bold rounded-md border-3 border-slate-600 mx-auto text-slate-600 flex items-center justify-center">Pesan Tiket</button>

        </form>
    </div>


</body>

</html>