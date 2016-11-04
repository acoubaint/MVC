<?php 
$koneksi = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db('tongsik');
$id=$_GET['id'];  // id yang gambarnya mo ditampilkakn

$query = "select gambar,tipe_gambar from tempat where id=$id";
$data = mysql_query($query);
$data = mysql_fetch_array($data);

$content = $data[0];
$type = $data[1];

header("Content-type: $type");   // parsing ke mime tipe
echo $content;  
?>