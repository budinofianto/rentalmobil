<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_sewa=$_GET['id_sewa'];
	$sql="DELETE FROM sewa WHERE id_sewa = '$id_sewa'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:transaksi.php');
}

elseif ($act=='input'){
    $id_sewa = $_POST["id_sewa"];
	$totalhari = $_POST["total_hari"];
	$bayar = $_POST ["pembayaran"];
 	$pelanggan = $_POST["id_pelanggan"];
	$mobil = $_POST["id_mobil"];

   $sql="insert into mobil values ('$id_sewa','$totalhari','$bayar',' $pelanggan', ' $mobil') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:transaksi.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_sewa = $_POST["id_sewa"];
	$totalhari = $_POST["total_hari"];
	$bayar = $_POST ["pembayaran"];
 	$pelanggan = $_POST["id_pelanggan"];
	$mobil = $_POST["id_mobil"];
	

	$sql = "UPDATE SEWA SET TOTAL_HARI='$totalhari', PEMBAYARAN='$bayar', ID_PELANGGAN='$pelanggan',ID_MOBIL='$mobil' WHERE ID_SEWA='$id_sewa'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:transaksi.php');
	}
	else {echo "gagal";}
   



}
?>
