<?php
require 'functionadmin.php';
require 'navbar.html';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
if (isset($_POST['submit'])) {
  tambahdata();
}
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
        <a class="nav-item nav-link active" href="transactionadmin.php">Transaction<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php
                                            if ($_SESSION['user'] == true) {
                                              echo 'indexadmin.php';
                                            } else {
                                              echo 'index.php';
                                            } ?>">Progress</a>
        <a class="nav-item nav-link" href="needs.php">Needs</a>
        <a class="nav-item btn btn-danger tombol" href="logout.php">Log Out</a>
      </div>
    </div>
  </div>
</nav>

<body>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="nama">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Transaction Name">
      </div>
      <div class="form-group">
        <label for="direction">Direction</label>
        <select class="form-control" id="direction" name="direction">
          <option>Income</option>
          <option>Spending</option>
        </select>
      </div>
      <div class="form-group">
        <label for="point">Point</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Rp. </div>
          </div>
          <input type="number" class="form-control" id="point" name="point" placeholder="Point of transaction">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </div>
</body>

</html>