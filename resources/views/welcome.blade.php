<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Indeks Kepuasan Masyarakat</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-info text-white">
        <div class="container text-center">
            <h1 class="display-4">INDEKS KEPUASAN MASYARAKAT</h1>
            <p class="lead">
            <h2>
                INDEKS KEPUASAN MASYARAKAT <br> Terhadap Pelayanan Polres Minahasa
                <h2>
        </div>
    </div>

    <style>
    .box {
        padding: 30px 40px;
        border-radius: 5px;
    }
    </style>

    <div class="container">
        <div class="alert alert-danger" role="alert">
            Perhatian!! untuk memberiikan penilaian/poling/suara silahkan klik icon/Emoji
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="bg-primary box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Memuaskan</h5>
                            <h2>23</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa puas dengan Pelayanan kami, klik icon ini">
                                <img src="/img/puas.png" style="width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input class="text-center mx-auto" type="radio" name="option" value="option2" id="option2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-warning box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>CUKUP</h5>
                            <h2>30</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa cukup dengan Pelayanan kami, klik icon ini">
                                <img src="/img/cukup.png" style="width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input class="text-center mx-auto" type="radio" name="option" value="option2" id="option2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-danger box text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>KURANG</h5>
                            <h2>5</h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="#" title="Jika anda merasa kurang dengan Pelayanan kami, klik icon ini">
                                <img src="img/kurang.png" style="width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input class="text-center mx-auto" type="radio" name="option" value="option2" id="option2">
                </div>
            </div>
        </div>
        <div class="w-100 text-center">
            <button class="mt-3 w-25" type="submit">Vote</button>
        </div>
    </div>

    <!-- Akhir Container -->


    <footer class="bg-secondary text-center text-white mt-3 bt-2 pb-2">
        Kepolisian Resor Minahasa



</body>

</html>