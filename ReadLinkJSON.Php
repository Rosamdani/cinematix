<?Php
$ArrContextOptions = array(
    "Ssl" => array(
        "Verify_peer" => False,
        "Verify_peer_name" => False,
    ),
);
$LinkAPI = "https://carifilm.000webhostapp.com/public/api/get-film";
$Response = File_get_contents($LinkAPI, False, Stream_context_create($ArrContextOptions));
// Mendecode Prov.Json
$Data = Json_decode($Response, True);
echo "<Pre>";
Print_r($Data);
echo "</Pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- bg -->
    <div class="contaianer ">

        <!-- navbar -->

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" style="background-color: #1F3747; height: 50px">
                <a class="navbar-brand" href="#" style="color:aliceblue;">SINEMA TIX</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="judul">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <div class="icon" style="width:130px; height:30px; box-shadow: 2px 2px 2px rgba(0,0,0,0.8);  background-color: #1F3747; margin-right:20px "><img src="gambar/play1.png" alt="" style="width : 30px; float:left;">
                                    <p style="color:aliceblue;  text-align: center;     margin: 0 auto; ">Now Playing</p>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="icon" style="width:130px;  height:30px; box-shadow: 2px 2px 2px rgba(0,0,0,0.8); background-color: #1F3747; margin-right:20px  "><img src="gambar/movie.png" alt="" style="width : 30px; float:left;">
                                    <p style="color:aliceblue; text-align: center;    margin: 0 auto;">Theater</p>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="icon" style="width:130px; height:30px; box-shadow: 2px 2px 2px rgba(0,0,0,0.8);  background-color: #1F3747; margin-right:20px  "><img src="gambar/megaphone.png" alt="" style="width : 30px; float:left;">
                                    <p style="color:aliceblue; text-align: center;     margin: 0 auto;">UP Coming</p>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="icon" style="width:130px;  height:30px; box-shadow: 2px 2px 2px rgba(0,0,0,0.8);      background-color: #1F3747; margin-right:20px  "><img src="gambar/lokasi.png" alt="" style="width : 30px; float:left;">
                                    <p style="color:aliceblue;     margin: 0 auto; text-align: center;">Location</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <!-- Banner -->
        <div class="banner">
            <div class="banner1" style="float: left;">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="max-height: 500px;">
                        <div class="carousel-item active">
                            <img src="gambar/banner1.jpg" class="d-block w-100" style="max-height: 400px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/banner2.jpg" class="d-block w-100" style="max-height: 400px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/banner3.jpg" class="d-block w-100" style="max-height: 400px;" alt="...">
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
            <div class="banner2">

            </div>
        </div>

        <div class="section">
            <div class="container">
                <h3>Produk</h3>
                <div class="box">
                    <?php
                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk_status !=0 ORDER BY produk_id DESC LIMIT 4");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($p = mysqli_fetch_array($produk)) {

                    ?>

                            <a href="deskripsi.php?id=<?php echo $p['produk_id'] ?>">
                                <div class="produk">
                                    <div class="gmbrprdk" style=" height:200px">
                                        <img src="produk/<?php echo $p['produk_image'] ?>">
                                    </div>
                                    <div class="deskripsi" style=" height:170px">

                                        <div class="deskripsi1" style=" height:100px">
                                            <p class="nama"><?php echo substr($p['produk_name'], 0, 20) ?></p>
                                            <p class="harga">Rp.<?php echo number_format($p['produk_pice']) ?></p>
                                        </div>

                                        <div class="deskripsi2" style=" height:50px">
                                            <!-- Button trigger modal -->
                                            <form action="" method="POST">
                                                <button class="button-24" name="deskripsi" value="Cari-Produk" id="btnlogin" role="button" style="  margin-left: 60px; padding-top:5px;">Deskripsi</button>
                                            </form>
                                            <?php
                                            if (isset($_POST['deskripsi'])) {
                                                $d = $_POST['produk_id'];
                                                header('location: deskripsi.php');
                                            }
                                            ?>




                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <P>Produk tidak ada</P>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>





</body>

</html>