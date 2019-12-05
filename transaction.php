<?php
require 'function.php';
require 'navbar.html';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
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
                <a class="nav-item nav-link active" href="transaction.php">Transaction<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?php 
                if($_SESSION['user']==true){
                    echo 'indexadmin.php';
                } else {
                    echo 'index.php';
                }?>">Progress</a>
                <a class="nav-item nav-link" href="needs.php">Needs</a>
                <a class="nav-item btn btn-danger tombol" href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</nav>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col">
                        <!-- <a href="#"><button class="btn btn-primary mt-4">Tambah Data</button></a> -->
                    </div>
                    <div class="ml-auto">
                        <div class="col">
                            <label for="validationTooltipUsername">Balance</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">Rp</span>
                                <input type="text" readonly class="form-control" id="validationTooltipUsername" placeholder="<?= rupiah(balance()); ?>" aria-describedby="validationTooltipUsernamePrepend" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="table-responsive-lg">
                    <table class="table table-hover table-striped text-center shadow p-3 mb-5 bg-white rounded">
                        <?php
                        // 1564592400
                        $awal = 1564592400;
             //            for($i=53;$i<=53;$i++){
             //                $query = "UPDATE transaksi SET tanggal='1575175525' WHERE id='$i'";
					        // mysqli_query($conn, $query);
             //            }
                        // var_dump(mktime(11,45,25,12,1,2019));
                        
                        ?>
                        <thead class="bg-info text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Transaction</th>
                                <th scope="col">Date</th>
                                <th scope="col">Direction</th>
                                <th scope="col">Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php transaction(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">

        </div>

        </div>
    <br><br><br>
</body>

</html>