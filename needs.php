<?php
require 'function.php';
require 'navbar.html';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// $today='https://api.banghasan.com/sholat/format/json/jadwal/kota/775/tanggal/date(o-m-d)'.date("o-m-d");
// var_dump($today);

// $data[0] = file_get_contents('https://api.banghasan.com/sholat/format/json/jadwal/kota/775/tanggal/'.date("o-m-d",time() + (60 * 60 * 24 * 1)));
// $jadwal[0] = json_decode($data[0], true);
// $jadwal[0] = $jadwal[0]["jadwal"]['data'];
// var_dump($jadwal[0]);
// $data = file_get_contents('https://muslimsalat.com/api/Malang/weekly.json?key=79b19cabf907da93bb38e3789661d653');
// $data = file_get_contents('https://time.siswadi.com/pray/Malang?multi=1');
for($i=0;$i<3;$i++):
    $data[$i] = file_get_contents('https://api.banghasan.com/sholat/format/json/jadwal/kota/775/tanggal/'.date("o-m-d",time() + (60 * 60 * 24 * $i)));
    $jadwal[$i] = json_decode($data[$i], true);
    $jadwal[$i] = $jadwal[$i]['jadwal']['data'];
    $arr[$i] = date("o-m-d",time() + (60 * 60 * 24 * $i));
    $array[$i]=date("l", strtotime($arr[$i]));
    $arr[$i]=date("j M Y", strtotime($arr[$i]));
    // var_dump($array[$i]);
endfor;
// $jadwal = json_decode($data, true);
// $jadwal = $jadwal["jadwal"];
// $jumlah = count($jadwal);
// var_dump($jadwal);

// for($i=0;$i<$jumlah;$i++){
// 	$arr[$i]=$jadwal[$i]['date_for'];
// }
// $today = date('l', strtotime($arr[2]));
// var_dump($today);






?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mertojoyo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a> -->
                <a class="nav-item nav-link" href="<?php 
                    if($_SESSION['user']==true){
                        echo 'transactionadmin.php';
                    } else {
                        echo 'transaction.php';
                    }?>">Transaction</a>
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
                        <h4 class="card-title text-center">Rp. 265.000/bulan</h4>
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
                        <h4 class="card-title">Rp. 175.000/bulan<a href="http://tagihan.pdamkotamalang.com/tagihan/">
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
        <h1 class="display-4">Prayer Schedule</h1>
        <p class="text-muted">3 days ahead of Malang and surrounding areas</p>
        <div class="table-responsive-lg">
            <table class="table table-hover text-center">
                <thead class="thead-light" id="navbar">
                    <tr>
                        <th scope="col" class="align-middle">Days</th>
                        <th scope="col" class="align-middle">Date</th>
                        <th scope="col" class="align-middle">Imsak</th>
                        <th scope="col" class="align-middle">Subuh</th>
                        <th scope="col" class="align-middle">Terbit</th>
                        <th scope="col" class="align-middle">Dhuha</th>
                        <th scope="col" class="align-middle">Dzuhur</th>
                        <th scope="col" class="align-middle">Ashar</th>
                        <th scope="col" class="align-middle">Maghrib</th>
                        <th scope="col" class="align-middle">Isya</th>
                        <!-- <th scope="col" class="align-middle">Sunset</th>
                        <th scope="col" class="align-middle">Sepertiga Malam</th>
                        <th scope="col" class="align-middle">Duapertiga Malam</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    // $jumlah = count($jadwal);
                    for ($i=0; $i<3 ; $i++) :
                    // $ini[$i]=date("l",strtotime($jadwal[$i]['tanggal'])); ?>
                        <tr>
                            <td scope="row"><?= $array[$i]; ?></td>
                            <td><?= $arr[$i]; ?></td>
                            <td><?= $jadwal[$i]['imsak']; ?></td>
                            <td><?= $jadwal[$i]['subuh']; ?></td>
                            <td><?= $jadwal[$i]['terbit']; ?></td>
                            <td><?= $jadwal[$i]['dhuha']; ?></td>
                            <td><?= $jadwal[$i]['dzuhur']; ?></td>
                            <td><?= $jadwal[$i]['ashar']; ?></td>
                            <td><?= $jadwal[$i]['maghrib']; ?></td>
                            <td><?= $jadwal[$i]['isya']; ?></td>
                            <!-- <td> -->
                            	<?php 
                            	// $jadwal[$i]['Sunrise']; ?>
                            		
                           <!--  	</td>
                            <td> -->
                            	<?php 
                            	// $jadwal[$i]['Sunset']; ?>
                            		
                            	<!-- </td>
                            <td> -->
                            	<?php 
                            	// $jadwal[$i]['SepertigaMalam']; ?>
                            		
                            	<!-- </td>
                            <td> -->
                            	<?php 
                            	// $jadwal[$i]['DuapertigaMalam']; ?>
                            		
                            	<!-- </td> -->
                        </tr>
                    <?php 
                    $no++;
                    endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br>
</body>

</html>