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
                <a class="nav-item nav-link" href="<?php 
                    if($_SESSION['user']==true){
                        echo 'transactionadmin.php';
                    } else {
                        echo 'transaction.php';
                    }?>">Transaction</a>
                <a class="nav-item nav-link active" href="index.php">Progress<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="needs.php">Needs</a>
                <a class="nav-item btn btn-danger tombol" href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</nav>

<body>
    <div class="container">
        <div class="row">
            <div class="card mx-auto shadow-lg mb-5 bg-white rounded" style="width: 25rem;">
                <div class="card-header">
                    Progress
                </div>
                <ul class="list-group list-group-flush">
                    <?php progressdata(); ?>
                </ul>
                <div class="card-footer">
                    <br>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= bulanan(); ?>%;" aria-valuenow="<?= bulanan(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small id="emailHelp" class="form-text text-muted" style="text-align:right"><?= rupiah(bulan()); ?>/<?= rupiah($maxbulanan+200000); ?></small>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= kontrakan(); ?>%;" aria-valuenow="<?= kontrakan(); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small id="emailHelp" class="form-text text-muted" style="text-align:right"><?= rupiah(kontrak()); ?>/20.300.000</small>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div><br><br><br>
</body>

</html>