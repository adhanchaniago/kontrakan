<?php
// $conn = mysqli_connect("localhost", "root", "", "kontrakan");
$conn = mysqli_connect("sql302.epizy.com", "epiz_24458541", "kontrakan1234", "epiz_24458541_kontrakan");
$maxbulanan = 2800000;  // ganti berkala $maxbulanan=($maxbulan*5)+$maxbulanmalik
$maxbulan = 500000;     // ganti berkala

function member()
{ }

function progressdata()
{
    global $conn, $maxbulan;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    $no = 1;
    foreach ($tampil as $org) {
        // $maxbulan = 400000;
        if ($org['nama'] == "Malik") {
            $maxbulan = $maxbulan - 200000;
            $maxbulanan = $maxbulanan - 200000;
        } else {
            $maxbulan = 500000;     // ganti berkala
            $maxbulanan = 2800000;  // ganti berkala
        }
        ?>
        <style>
            .row button {
                height: 28px;
            }

            .row img {
                height: 15px;
            }

            @media (min-width: 992px) {
                .row button {
                    height: 33px;
                }

                .row img {
                    height: 20px;
                }
            }
        </style>
        <li class='list-group-item mb-3'>
            <div class="row">
                <div class="col"><label for="progress"><?= $org['nama'] ?></label></div>
                <div class="col"></div>
                <div class="col-auto"><a href="editdata.php?id=<?= $org['id'] ?>"><button type="submit" class="btn bg-warning mb-3"><img src="img/edit.png" alt="edit"></button></a></div>
            </div>
            <div class="progress border <?= color(persen($org['bulanan'], $maxbulan)) ?>">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= persen($org['bulanan'], $maxbulan) ?>%;" aria-valuenow="<?php persen($org['bulanan'], $maxbulan) ?>" aria-valuemin="0" aria-valuemax="100"><?= persen($org['bulanan'], $maxbulan) ?>%</div>
            </div>
            <small id="emailHelp" class="form-text text-muted" style="text-align:right"><?= rupiah($org['bulanan']) ?>/<?= rupiah($maxbulan); ?></small>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= persen($org['kontrakan'], $org['maxkontrakan']) ?>%;" aria-valuenow="<?= persen($org['kontrakan'], $org['maxkontrakan']) ?>" aria-valuemin="0" aria-valuemax="100"><?= persen($org['kontrakan'], $org['maxkontrakan']) ?>%</div>
            </div>
            <small id="emailHelp" class="form-text text-muted" style="text-align:right"><?= rupiah($org['kontrakan']) ?>/<?= rupiah($org['maxkontrakan']) ?></small>

        </li>
    <?php
            $no++;
        }
    }

    function tambahdata()
    {
        global $conn;

        $nama = $_POST["name"];
        $arah = $_POST["direction"];
        $nominal = $_POST["point"];
        $tanggal = time();

        $query = "INSERT INTO transaksi VALUES ('','$nama','$arah','$nominal','$tanggal')";
        mysqli_query($conn, $query);
    }

    function data()
    {
        global $conn;
        $id = $_GET['id'];
        $data = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$id'");
        foreach ($data as $mhs) {
            ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'] ?>" placeholder="<?= $mhs['nama'] ?>">
            </div>
            <div class=" form-group">
                <label for="kontrakan">Kontrakan</label>
                <input type="number" class="form-control" id="kontrakan" name="kontrakan" value="<?= $mhs['kontrakan'] ?>" placeholder="<?= $mhs['kontrakan'] ?>">
            </div>
            <div class=" form-group">
                <label for="bulanan">Bulanan</label>
                <input type="number" class="form-control" id="bulanan" name="bulanan" value="<?= $mhs['bulanan'] ?>" placeholder="<?= $mhs['bulanan'] ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
        </form>
    <?php }
        $query = "SELECT * FROM anggota WHERE id='$id'";
        mysqli_query($conn, $query);
    }

    function updatedata()
    {
        global $conn;
        $id = $_GET['id'];
        $nama = $_POST["nama"];
        $kontrakan = $_POST["kontrakan"];
        $bulanan = $_POST["bulanan"];

        $query = "UPDATE anggota SET nama='$nama', kontrakan='$kontrakan', bulanan='$bulanan' WHERE id='$id'";
        mysqli_query($conn, $query);
    }

    function transaction()
    {
        global $conn;
        $t = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
        $no = 1;
        $angka = 1;
        foreach ($t as $temp) {
            ?>
        <tr class="
        <?php
                if ($angka == 1) {
                    echo "bg-primary";
                } else if ($angka == 3) {
                    echo "bg-success";
                } else if ($angka == 5) {
                    echo "bg-info";
                } else if ($angka == 7) {
                    echo "bg-warning";
                } else if ($angka == 9) {
                    echo "bg-danger";
                } else if ($angka > 10) {
                    $angka = 1;
                    echo "bg-primary";
                } else {
                    echo "bg-dark text-light";
                }
                ?>">
            <td scope="row"><?= $no; ?></td>
            <td><?= $temp['nama']; ?></td>
            <td><?= date('j M Y', $temp['tanggal']); ?></td>
            <td><?= $temp['arah']; ?></td>
            <td>Rp. <?= rupiah($temp['nominal']); ?></td>
        </tr>
<?php
        $no++;
        $angka++;
    }
}

function balance()
{
    global $conn;
    $t = mysqli_query($conn, "SELECT * FROM transaksi");
    $total = 0;
    foreach ($t as $temp) {
        if ($temp['arah'] == "Income")
            $total = $total + $temp['nominal'];
        else
            $total = $total - $temp['nominal'];
    }
    return $total;
}
function rupiah($angka)
{
    $hasil = number_format($angka, 0, '.', '.');
    return $hasil;
}

function persen($awal, $akhir)
{
    global $conn;
    return $persen = ceil($total = ($awal * 100) / $akhir);
}

function color($persen)
{
    if ($persen <= 25) {
        return "border-danger";
    } else if ($persen > 25 && $persen <= 50) {
        return "border-warning";
    } else if ($persen > 50 && $persen < 75) {
        return "border-primary";
    } else {
        return "border-success";
    }
}

function kontrakan()
{
    global $conn;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    $no = 1;
    $kontrakan = 0;
    foreach ($tampil as $org) {
        $kontrakan = $kontrakan + $org['kontrakan'];
        $no++;
    }
    $kontrakan = ceil($kontrakan = ($kontrakan * 100) / 20300000);
    return $kontrakan;
}

function bulanan()
{
    global $conn, $maxbulanan;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    $no = 1;
    $bulanan = 0;
    foreach ($tampil as $org) {
        $bulanan = $bulanan + $org['bulanan'];
        if ($org['nama'] == "Malik") {
            $maxbulan = $maxbulan - 200000;
            $maxbulanan = $maxbulanan - 200000;
        } else {
            $maxbulan = 500000;     // ganti berkala
            $maxbulanan = 2800000;  // ganti berkala
        }
        $no++;
    }
    $bulanan = ceil($bulanan = ($bulanan * 100) / $maxbulanan);
    return $bulanan;
}

function bulan(){
    global $conn;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    foreach ($tampil as $org) :
        $bulanan = $bulanan + $org['bulanan'];
    endforeach;
    return $bulanan;
}

function kontrak(){
    global $conn;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    foreach ($tampil as $org) :
        if($org['nama']=="Malik"){
            $kontrakan = $kontrakan + 0;
        }else{
            $kontrakan = $kontrakan + $org['kontrakan'];
        }
    endforeach;
    return $kontrakan;
}