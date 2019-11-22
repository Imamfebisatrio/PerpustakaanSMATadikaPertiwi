<?php

	$NIS = $_GET ['id'];

	$koneksi->query("delete from tb_anggota where NIS='$NIS'");

?>

<script type="text/javascript">
	window.location.href="?page=anggota";
</script>	