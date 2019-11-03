<?php
require 'function.php';
require 'navbar.html';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$data = file_get_contents('https://muslimsalat.com/surabaya/weekly.json?key=79b19cabf907da93bb38e3789661d653');
$jadwal = json_decode($data, true);
$jadwal = $jadwal["items"];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mertojoyo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> -->
                <a class="nav-item nav-link" href="transactionadmin.php">Transaction</a>
                <a class="nav-item nav-link" href="<?php
                                                    if ($_SESSION['user'] == true) {
                                                        echo 'indexadmin.php';
                                                    } else {
                                                        echo 'index.php';
                                                    } ?>">Progress</a>
                <a class="nav-item nav-link active" href="needs.php">Needs<span class="sr-only">(current)</span></a>
                <a class="nav-item btn btn-danger tombol" href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</nav>


<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-5 bg-white rounded mx-auto" style="width: 18rem;">
                    <div class="card-header">
                        <h5>Wi-Fi</h5>
                    </div>
                    <img src="img/wifi.png" style="width:80%" class="card-img-top mx-auto" alt="Wi-Fi">
                    <div class="card-body">
                        <p class="card-text">Wifi ne ilingno bayar tanggal 10-20 lek nggak kenek dendo</p>
                        <hr>
                        <h4 class="card-title text-center">Rp. 250.000/bulan</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-5 bg-white rounded mx-auto" style="width: 18rem;">
                    <div class="card-header">
                        <h5>Listrik</h5>
                    </div>
                    <img src="img/lampu.png" style="width:80%" class="card-img-top mx-auto" alt="Listrik">
                    <div class="card-body">
                        <p class="card-text">Listrik kondisional lek entek baru tuku iki mek harga perkiraan.</p>
                        <hr>
                        <h4 class="card-title text-center">Rp. 75.000/bulan</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-5 bg-white rounded mx-auto" style="width: 18rem;">
                    <div class="card-header">
                        <h5>PDAM</h5>
                    </div>
                    <img src="img/air.png" style="width:80%" class="card-img-top mx-auto" alt="PDAM">
                    <div class="card-body">
                        <p class="card-text">Mek perkiraan <br>Nomor Saluran:115380</p>
                        <hr>
                        <h4 class="card-title">Rp. 75.000/bulan<a href="http://tagihan.pdamkotamalang.com/tagihan/">
                                <input class="btn btn-primary rounded float-right" type="button" value="CEK">
                            </a></h4>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow mb-5 bg-white rounded mx-auto" style="width: 18rem;">
                    <div class="card-header">
                        <h5>Logistik</h5>
                    </div>
                    <img src="img/kebutuhan.png" style="width:80%; margin-top:20px;" class="card-img-top mx-auto" alt="PDAM">
                    <div class="card-body">
                        <p class="card-text">Logistik, perlengkapan, dll. (Perkiraan).</p>
                        <hr>
                        <h4 class="card-title text-center">Rp. 20.000/bulan</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
    <div class="container">
        <h1 class="display-4">Jadwal Sholat</h1>
        <p class="text-muted">7 hari ke depan area Surabaya dan sekitarnya</p>
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Hari ke- </th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Subuh</th>
                        <th scope="col">Shurooq</th>
                        <th scope="col">Dhuhur</th>
                        <th scope="col">Ashar</th>
                        <th scope="col">Maghrib</th>
                        <th scope="col">Isha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($jadwal as $sch) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $sch['date_for']; ?></td>
                            <td><?= $sch['fajr']; ?></td>
                            <td><?= $sch['shurooq']; ?></td>
                            <td><?= $sch['dhuhr']; ?></td>
                            <td><?= $sch['asr']; ?></td>
                            <td><?= $sch['maghrib']; ?></td>
                            <td><?= $sch['isha']; ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br>
</body>

</html>