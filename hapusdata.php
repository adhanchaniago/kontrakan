<?php
require 'functions.php';
$id=$_GET["id"];
if(hapusdata($id)>0){
    echo "
    <script>
    document.location.href='index.php';
    </script>    
    ";
}
?>