<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/logo.jpg">
	<title>LAPORAN DATA SUPPLIER</title>
	<style>
		.container {
			margin: 0 auto;
			padding: 20px;
			width: 80%;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.header h2 {
			margin: 0;
			padding: 0;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		table, th, td {
			border: 1px solid #ddd;
		}

		th, td {
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<div class="container">
		<table>
			<tr>
				<td><center><img src="../../image/logo.jpg" width="80px"></center></td>
				<td>
					<div class="header-text">
						<h1>APOTEK AL-HUSNA</h1>
						<b>Jl. Jelegong Kec. Rancaekek, Kabupaten Bandung, Jawa Barat 40394 Telp . ( 0262 ) 428590</b>
						<br/>
						<br/>
						<h2>LAPORAN DATA SUPPLIER</h2>
					</div>
				</td>
			</tr>
		</table>
		<?php 
		include "../../lib/koneksi.php";
		?>
		<table>
			<tr>
				<th width="1%">No</th>
				<th>ID Supplier</th>
				<th>Nama Supplier</th>
				<th>Alamat Supplier</th>
				<th>No Telpon</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from supplier");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_supplier']; ?></td>
				<td><?php echo $data['nama_supplier']; ?></td>
				<td><?php echo $data['alamat_supplier']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
		<hr/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
	</div>
	<script>
		window.print();
	</script>
</body>
</html>