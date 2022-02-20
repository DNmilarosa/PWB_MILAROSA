<?php
include 'koneksi.php';

$menu = @$_GET['menu'];
if (!$menu) {
	echo "<script>window.location.href='?menu=input_stock'</script>";
}
?>
<html>
<head>
	<title>UAS PWB - Mila Rosa </title>
	<style>
		.text-center {
			text-align: center;
		}
		.d-flex {
			display: flex;
		}
	</style>
</head>
<body style="border: 1px solid #c4c4c4; padding:20px;">
	<div class="header">
		<h1>DATA LOGISTIK LEMBAR KERJA SISWA (LKS)</h1>
		<div>Programmer : Mila Rosa</div>
		<br>
		<div>
			<?php if ($menu == 'input_stock'): ?>
				<span>Input Stock</span>
			<?php else: ?>
				<a href="?menu=input_stock">Input Stock</a>
			<?php endif ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if ($menu == 'distribusi'): ?>
				<span>Distibusi</span>
			<?php else: ?>
				<a href="?menu=distribusi">Distibusi</a>
			<?php endif ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if ($menu == 'stock'): ?>
				<span>Cek Stock</span>
			<?php else: ?>
				<a href="?menu=stock">Cek Stock</a>
			<?php endif ?>
		</div>
	</div>
	<div class="body">
		<?php
			include $menu.'.php';
		?>
	</div>
</body>
</html>