<?php
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");
$tampil = mysqli_query($conn, "SELECT * FROM biodata;");


function data()
{
	global $conn;
	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM biodata WHERE id='$id'");
	foreach ($data as $mhs) {
		?>
		<form action="" method="post">
			<div class="form-group">
				<label for="nama">Nama Lengkap</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $mhs['nama'] ?>">
			</div>
			<div class="form-group">
				<label for="telepon">No. Telepon</label>
				<input type="number" class="form-control" id="telepon" name="telepon" placeholder="<?= $mhs['telepon'] ?>">
			</div>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="<?= $mhs['email'] ?>">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
		</form>
<?php }
	$query = "SELECT * FROM biodata WHERE id='$id'";
	mysqli_query($conn, $query);
}

function updatedata()
{
	global $conn;
	$id = $_GET['id'];
	$nama = $_POST["nama"];
	$telepon = $_POST["telepon"];
	$email = $_POST["email"];

	$query = "UPDATE biodata SET nama='$nama', telepon='$telepon', email='$email' WHERE id='$id'";
	mysqli_query($conn, $query);
}

function tambahdata()
{
	global $conn;

	$nama = $_POST["nama"];
	$telepon = $_POST["telepon"];
	$email = $_POST["email"];

	$query = "INSERT INTO biodata VALUES ('','$nama','$telepon','$email')";
	mysqli_query($conn, $query);
}

function tampildata()
{
	global $conn;
	global $tampil;
	$total = 0;
	$no = 1;
	foreach ($tampil as $mhs) {
		echo "
				<tr style='text-align:center;'>
				<td>$no</td>
				<td>" . $mhs['nama'] . "</td>
				<td>" . $mhs['telepon'] . "</td>
				<td>" . $mhs['email'] . "</td>
				<td><a href='editdata.php?id=" . $mhs['id'] . "'><img src='edit.png'></a> | 
				<a href='hapusdata.php?id=" . $mhs['id'] . "'><img src='delete.png'></a>
				</td>
				";


		$no++;
	}
}



function hapusdata($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM biodata WHERE id = $id");

	return mysqli_affected_rows($conn);
}
