<?php

$host= "localhost";
$user= "root";
$password= "";
$db= "19019_psas";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
            die("koneksi Gagal:".mysqli_connect_error());
}
?>