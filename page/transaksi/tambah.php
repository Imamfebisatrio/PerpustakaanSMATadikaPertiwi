 <?php

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date ("n"), date ("j")+7, date("Y"));
$tgl_kembali = date("d-m-Y", $tujuh_hari);

?>

 <div class="panel panel-primary">
 <div class="panel-heading">
 	Tambah Data
 	</div>
 <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form  method="POST" >

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <select class="form-control" name="buku">
                                            	<?php

                                            	$sql = $koneksi->query("select * from tb_buku order by id");

                                            	while ($data=$sql->fetch_assoc()){
                                            		echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                            	}	
                                            	?>
                                           	 </select>
                                         </div>

                                         <div class="form-group">
                                            <label>Nama</label>
                                            <select class="form-control" name="nama">
                                            	<?php

                                            	$sql = $koneksi->query("select * from tb_anggota order by NIS");

                                            	while ($data=$sql->fetch_assoc()){
                                            		echo "<option value='$data[NIS].$data[nama]'>$data[NIS].$data[nama]</option>";
                                            	}	
                                            	?>
                                            </select>
                                        </div>
                                        <label>Tanggal Pinjam</label>
                                    			<input class="form-control" type name="tgl_pinjam" id="tgl" value="<?php echo $tgl_pinjam;?>" />

                                    	<div>

                                    	<div>
                                    		<label>Tanggal Kembali</label> 	
                                    			<input class="form-control" type name="tgl_kembali" id="tgl" value="<?php echo $tgl_kembali;?>"readonly="" />

                                    		
                                    	<div>

                                    	<div>
                                            <input type="submit" name="simpan" value="Simpan" style="margin-top: 8px" class="btn btn-primary">
										</div>

                                    		
                                    	</div>
                                    </div>

                                </form>
                                </div>
</div>
	</div>
</div>

<?php

	if (isset ($_POST['simpan'])){

		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali =	$_POST['tgl_kembali'];

		$buku = $_POST['buku'];
		$pecah_buku = explode(".",$buku);
		$id = $pecah_buku[0];
		$judul = $pecah_buku[1];

		$nama = $_POST['nama'];
		$pecah_nama = explode(".",$nama);
		$NIS = $pecah_nama[0];
		$nama = $pecah_nama[1];

		$sql = $koneksi->query("select * from tb_buku where judul = '$judul'");
		while ($data = $sql->fetch_assoc()) {
			$sisa = $data['jumlah_buku'];

			if ($sisa == 0) {


				?>
					<script type="text/javascript">
						alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan");
						window.location.href="?page=transaksi&aksi=tambah";
					</script>
					<?php
				}else{
					$sql = $koneksi->query("insert into tb_transaksi(judul, NIS, nama, tgl_pinjam, tgl_kembali, status) values('$judul','$NIS','$nama','$tgl_pinjam','$tgl_kembali', 'pinjam')");

					$sql2 = $koneksi->query("update tb_buku set jumlah_buku=(jumlah_buku-1) where id='$id' ");
			
				?>
					<script type="text/javascript">
						alert("Simpan Data Berhasil");
						window.location.href="?page=transaksi";
					</script>
					<?php
					}
		}
	
}	

?>
