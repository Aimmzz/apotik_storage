<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/logo.jpg">
	<title>LAPORAN DATA USER</title>
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
						<h2>LAPORAN DATA USER</h2>
					</div>
				</td>
			</tr>
		</table>
		<hr>
		<?php 
		include "../../lib/koneksi.php";
		?>
		<table>
			<tr>
				<th width="1%">No</th>
				<th>ID User</th>
				<th>User Name</th>
				<th>Password</th>
				<th>Hak Akses</th>
				<th>Level</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from user");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_user']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['hak_akses']; ?></td>
				<td><?php echo $data['level']; ?></td>
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
