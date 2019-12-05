<?php
$conn = mysqli_connect("localhost", "root", "", "kontrakan");
// $conn = mysqli_connect("sql302.epizy.com", "epiz_24458541", "kontrakan1234", "epiz_24458541_kontrakan");
$maxbulanan = 2800000;  // ganti berkala
$maxbulan = 500000;     // ganti berkala

function progressdata()
{
    global $conn;
    $tampil = mysqli_query($conn, "SELECT * FROM anggota");
    $no = 1;
    foreach ($tampil as $org) {
        if ($org['nama'] == "Malik") {
            $maxbulan = $maxbulan - 200000;
            $maxbulanan = $maxbulanan - 200000;
        } else {
            $maxbulan = 500000;     // ganti berkala
            $maxbulanan = 2800000;  // ganti berkala
        }
        ?>
        <li class='list-group-item'>
            <label for="progress"><?= $org['nama'] ?></label>
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

    function transaction()
    {
        global $conn;
        $t = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
        $no = 1;
        $angka = 1;
        foreach ($t as $temp) {
            ?>
        <tr>
            <td scope="row"><?= $no; ?></td>
            <td><?= $temp['nama']; ?></td>
            <td><?= date('j M Y', $temp['tanggal']); ?></td>
            <td>
            <span class="<?php
                if($temp['arah']=="Spending"){
                echo "badge badge-danger";
            }else{
                echo "badge badge-success";
            }
            ?>">
            <?= $temp['arah']; ?></span></td>
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