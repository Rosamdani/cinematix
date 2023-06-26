<?php

if (isset($_POST['jam']) && isset($_POST['tgl']) && isset($_POST['id_film'])) {
    $jadwal = $_POST['jam'];
    $tgl = $_POST['tgl'];
    $id_film = $_POST['id_film'];
    $pecah = explode("|", $jadwal);

    //Membuat variabel untuk menyimpan data jadwal
    $id_bioskop = $pecah[0];
    $harga = $pecah[1];
    $id_studio = $pecah[2];
    $jam = $pecah[3];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/seat.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $seat = curl_exec($curl);
    $data_seat = json_decode($seat, true);
    $data_seat = $data_seat['data'];
    curl_close($curl);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/bioskop.php?id='.$id_bioskop);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $bioskop = curl_exec($curl);
    $data_bioskop = json_decode($bioskop, true);
    $data_bioskop = $data_bioskop['data'];
    curl_close($curl);

    foreach($data_bioskop as $theater){
        $nama = $theater['nama'];
        $lokasi = $theater['lokasi'];
        $maps = $theater['maps'];
    }
}else{
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a13d2f4f0a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="w-full h-[110vh] pt-32">
        <nav class="w-full h-20 px-10 bg-slate-700 flex justify-between items-center fixed top-0">
            <div class="flex space-x-5  text-white">
                <button><i class="fas fa-arrow-left"></i></button>
                <p class="text-2xl font-bold">Pilih Tempat Duduk</p>
            </div>
            <a href="" class="w-12 h-12 rounded-full shadow-md border border-white text-white flex justify-center items-center"><i class="fas fa-user"></i></a>
        </nav>

        <section class="w-[90%] justify-center mx-auto text-center mb-10">
            <p class="text-2xl font-bold"><?=@$nama?></p>
            <a href="<?=@$maps?>" class="text-lg text-gray-300 font-bold"><?=@$lokasi?></a>
        </section>
        <form method="post" action="http://localhost/in_cinema/insert_tiket.php">
            <input type="hidden" id="harga" value="<?= $harga ?>">
            <input type="hidden" name="harga" id="total_harga">
            <input type="hidden" name="id_bioskop" id="id_bioskop" value="<?= $id_bioskop ?>">
            <input type="hidden" name="id_studio" id="id_studio" value="<?= $id_studio ?>">
            <input type="hidden" name="jam" id="jam" value="<?= $jam ?>">
            <input type="hidden" name="tgl" id="tgl" value="<?= $tgl ?>">
            <ul class="grid grid-rows-6 grid-flow-col w-[90%] overflow-x-auto gap-5 mx-auto py-5">
                <?php
                $cekKursi = false;
                $huruf = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
                for ($j = 0; $j < count($huruf); $j++) {
                    for ($i = 0; $i < 20; $i++) {
                        $nomor = $huruf[$j] . $i + 1;
                        foreach ($data_seat as $hasil) {
                            if ($hasil['tanggal'] == $tgl && $hasil['id_bioskop'] == $id_bioskop && $hasil['id_studio'] == $id_studio && $hasil['jam'] == $jam && $hasil['nomor_kursi'] == $nomor) {
                                $cekKursi = true;
                            }
                        }

                ?>


                        <li>
                            <input type="checkbox" name="kursi[]" id="<?= $nomor ?>" value="<?= $nomor ?>" class="hidden peer" <?php if ($cekKursi == true) {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                            <label for="<?= $nomor ?>" class="inline-flex items-center justify-center w-14 p-2 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:bg-blue-600 peer-checked:text-white   <?php if ($cekKursi == true) {
                                                                                                                                                                                                                            echo "bg-gray-200 text-slate-600";
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo "bg-slate-600 text-white hover:bg-slate-700";
                                                                                                                                                                                                                        } ?> ">
                                <div class="block">
                                    <div class="text-lg font-semibold"><?= $nomor ?></div>
                                </div>
                            </label>
                        </li>

                <?php
                        $cekKursi = false;
                    }
                }

                ?>
            </ul>
            <div class="w-[90%] mx-auto py-1 bg-gray-300 flex justify-center mt-10">
                SCREEN
            </div>

            <div class="flex w-[90%] mx-auto justify-center space-x-5 my-10">
                <p class="bg-slate-600 text-white text-lg px-2 py-1 rounded">Available</p>
                <p class="bg-blue-600 text-white text-lg px-2 py-1 rounded">Your Seat</p>
                <p class="bg-gray-300 text-white text-lg px-2 py-1 rounded">Not Available</p>
            </div>

            <div class="flex justify-between mx-auto px-5 font-medium text-black rounded border w-[30%] text-lg py-2">
                <div>
                    <p>Total Price</p>
                    <input type="text" name="seat" id="total-harga-textfield">
                </div>
                <div class=" border-l-2 pl-2 w-[30%]">
                    <p>Seat</p>
                    <div class="w-full overflow-x-auto flex">
                        <input type="text" name="seat" id="result-paragraph">
                    </div>
                </div>
            </div>
            <div class="flex justify-center w-full my-5">
                <input type="submit" id="submitButton" class="w-[70%] py-4 mx-auto border border-slate-600" value="Beli">
            </div>

        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        // Tangkap perubahan pada checkbox-item
        var jumlahHarga = $('#harga').val();
        $('.peer').change(function() {
            var selectedValues = [];
            var totalHarga = 0;
            if ($('.peer:checked').length > 0) {
                // Aktifkan tombol submit
                $('#submitButton').prop('disabled', false);
            } else {
                // Nonaktifkan tombol submit
                $('#submitButton').prop('disabled', true);
                $('#submitButton').addClass('bg-slate-600');
                $('#submitButton').addClass('text-white');
            }
            // Loop melalui setiap peer yang dicek
            $('.peer:checked').each(function() {
                selectedValues.push($(this).val());
                totalHarga += parseFloat(jumlahHarga);
            });

            // Tampilkan nilai-nilai yang dipilih dalam text field
            $('#result-paragraph').val(selectedValues.join(', '));
            $('#total_harga').val(totalHarga);
            $('#total-harga-textfield').val(totalHarga.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }));
        });
    });
</script>

</html>