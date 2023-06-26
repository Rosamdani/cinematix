<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Dasboard</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logoutama">
                <img src="gambar/sinematix.png" alt="">
            </div>

            <div class="menupilihan">
                <div class="logomenu">
                    <div class="logomenu1">
                        <img src="gambar/play1.png" alt="">
                    </div>
                    <div class="logomenu2">
                        <h1>Now Playing</h1>
                    </div>
                </div>
                <div class="logomenu">
                    <div class="logomenu1">
                        <img src="gambar/movie.png" alt="">
                    </div>
                    <div class="logomenu2">
                        <h1>Theater</h1>
                    </div>
                </div>
                <div class="logomenu">
                    <div class="logomenu1">
                        <img src="gambar/megaphone.png" alt="">
                    </div>
                    <div class="logomenu2">
                        <h1>Up Coming</h1>
                    </div>
                </div>
                <div class="logomenu">
                    <div class="logomenu1">
                        <img src="gambar/lokasi.png" alt="">
                    </div>
                    <div class="logomenu2">
                        <h1>Location</h1>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!-- bg -->
    <div class="contaianer ">




        <!-- Banner -->
        <div class="banner">
            <div class="banner1">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="height: 60%;">
                        <div class="carousel-item active">
                            <img src="gambar/frame1.png" class="d-block w-100" style="max-height: 400px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/frame2.png" class="d-block w-100" style="max-height: 400px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/frame3.png" class="d-block w-100" style="max-height: 400px;" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="container">
                <h3>Produk</h3>
                <div class="box">
                    <?php
                    $curl = curl_init();

                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/in_cinema/index.php');
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec($curl);
                    $data = json_decode($response, true);

                    curl_close($curl);
                    // var_dump($data);
                    foreach ($data['data'] as $item) {



                    ?>

                        <a href="deskripsi.php?id=<?php echo $item['id_film'] ?>">
                            <div class="produk">
                                <div class="gmbrprdk">
                                    <img src="<?php echo $item['poster']; ?>">
                                </div>
                                <div class="deskripsi">

                                    <div class="deskripsi1">
                                        <p class="nama"><?php echo $item['judul']; ?></p>

                                    </div>

                                    <div class="deskripsi2" style=" height:50px">
                                        <!-- Button trigger modal -->
                                        <form action="deskripsi.php?id=<?php echo $item['id_film'] ?>" method="POST">

                                            <button class="button-86" role="button">Deskripsi</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>


    </div>





</body>

</html>