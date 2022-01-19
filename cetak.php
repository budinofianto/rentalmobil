<!DOCTYPE html>
<?php
include 'koneksi.php';


?>
<html>
<?php include'header.php' ?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Rental mobil</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
					  <th>No</th>
						<th>id sewa</th>
            			<th>alamat</th>
						<th>harga</th>
            			<th>Total hari</th>
						<th>pembayaran</th>                        										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT pelanggan.*, mobil.*, sewa.* FROM sewa
sewa INNER JOIN pelanggan pelanggan ON sewa.id_pelanggan = pelanggan.id_pelanggan
INNER JOIN mobil mobil ON sewa.id_mobil = mobil.id_mobil ORDER BY sewa.id_sewa ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
						$total = $row["HARGA"] * $row["TOTAL_HARI"];
						$total_semua += $total;	
						
						?>
						<tr>
						  <td>
						   <?php echo $no; ?>
						  </td>
			  <td>
						   <?php echo $row["ID_SEWA"];?>
						  </td>
						  <td>
						   <?php echo $row["ALAMAT"];?>       
						  </td>					
							<td> 
						   <?php echo $row['HARGA']; ?>
						  </td>
						  <td>
						   <?php echo $row["TOTAL_HARI"];?>
						  </td>
						  <td>
						   <?php echo ($total); ?>
						  </td>
											   
						</tr>                                         
					  </tbody>
					   <?php
						  $no++;
						  }
						  
					  ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Karawang
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Budi Nofianto</center></b>
                </div>
              </div>
            </div>
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>