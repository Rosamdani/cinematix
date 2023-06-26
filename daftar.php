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
    <div class="contaianer">

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


        <!-- login -->
        <div class="inputlogin">
            <h1>CINEMA TIX</h1>
            <div class="content">
                <div class="box-Login">
                    <h2>Registration</h2>
                    <form action="" method="POST">
                        <div class="group">
                            <input type="text " name="user" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>No Telpon</label>
                        </div>
                        <div class="group">
                            <input type="text " name="pass" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nama Pengguna</label>
                        </div>
                        <div class="group">
                            <input type="text " name="pass" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                        <div class="group">
                            <input type="password " name="pass" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                        </div>
                        <div class="group">
                            <input type="password " name="pass" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Konfirmasi Password</label>
                        </div>
                        <div class="group">
                            <input type="password " name="pass" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Alamat</label>
                        </div>
                        <p>Provinsi</p>
                        <select class="form-control m-bootstrap-select m_selectpicker" tabindex="-98" name="regional_code" required="">
                            <option value="11">
                                ACEH
                            </option>
                            <option value="12">
                                SUMATERA UTARA
                            </option>
                            <option value="13">
                                SUMATERA BARAT
                            </option>
                            <option value="14">
                                R I A U
                            </option>
                            <option value="15">
                                J A M B I
                            </option>
                            <option value="16">
                                SUMATERA SELATAN
                            </option>
                            <option value="17">
                                BENGKULU
                            </option>
                            <option value="18">
                                LAMPUNG
                            </option>
                            <option value="19">
                                KEPULAUAN BANGKA BELITUNG
                            </option>
                            <option value="21">
                                KEPULAUAN RIAU
                            </option>
                            <option value="31">
                                DKI JAKARTA
                            </option>
                            <option value="32">
                                JAWA BARAT
                            </option>
                            <option value="33">
                                JAWA TENGAH
                            </option>
                            <option value="34">
                                DI YOGYAKARTA
                            </option>
                            <option value="35">
                                JAWA TIMUR
                            </option>
                            <option value="36">
                                B A N T E N
                            </option>
                            <option value="51">
                                BALI
                            </option>
                            <option value="52">
                                NUSA TENGGARA BARAT
                            </option>
                            <option value="53">
                                NUSA TENGGARA TIMUR
                            </option>
                            <option value="61">
                                KALIMANTAN BARAT
                            </option>
                            <option value="62">
                                KALIMANTAN TENGAH
                            </option>
                            <option value="63">
                                KALIMANTAN SELATAN
                            </option>
                            <option value="64">
                                KALIMANTAN TIMUR
                            </option>
                            <option value="71">
                                SULAWESI UTARA
                            </option>
                            <option value="73">
                                SULAWESI SELATAN
                            </option>
                            <option value="74">
                                SULAWESI TENGGARA
                            </option>
                            <option value="75">
                                GORONTALO
                            </option>
                            <option value="76">
                                SULAWESI BARAT
                            </option>
                            <option value="81">
                                MALUKU
                            </option>
                            <option value="82">
                                MALUKU UTARA
                            </option>
                            <option value="94">
                                PAPUA
                            </option>
                            <option value="91">
                                PAPUA BARAT
                            </option>
                            <option value="72">
                                SULAWESI TENGAH
                            </option>
                            <option value="65">
                                KALIMANTAN UTARA
                            </option>
                        </select>




                        <input type="submit" name="submit" value="Login" style="background-color: #5296BD; width:100px; height:40px;  border-radius:10px; margin-top:10px;    font-family: 'Inter';">
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>