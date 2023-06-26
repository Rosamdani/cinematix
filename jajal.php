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
    <script>
        function sendId(id) {
            var xhr = new XMLHttpRequest();
            var url = 'coba.php'; // Ganti dengan URL tujuan Anda

            // Membuat data yang akan dikirimkan
            var data = new FormData();
            data.append('id', id);

            // Mengatur callback saat permintaan selesai
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        // Lakukan sesuatu dengan respons dari PHP
                        console.log(response);
                    } else {
                        // Penanganan kesalahan
                        console.error('Terjadi kesalahan: ' + xhr.status);
                    }
                }
            };

            // Mengirim permintaan AJAX
            xhr.open('POST', url, true);
            xhr.send(data);
        }
    </script>

    <script>
        sendId(123);
    </script>
</body>

</html>