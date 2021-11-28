<?php 
function CariJenisKursus($temp){
	$jenisKursus = substr($temp['kode_pendaftaran'], 0, 2);	
	$Hari = substr($temp['kode_pendaftaran'], 3, 1);
	$noUrut = substr($temp['kode_pendaftaran'], 4, 3);
	$lamaPertemuan = substr($temp['kode_pendaftaran'], -1,2);

	$kelas = [
		'VB' => [
			'kelas' => 'Visual Basic',
			'biayaKursus' => 750000,
			'jenisKursus' => 'Pemrograman'
		],
		'DP' => [
			'kelas' => 'Delphi',
			'biayaKursus' => 650000,
			'jenisKursus' => 'Pemrograman'
		],
		'LX' => [
			'kelas' => 'Linux',
			'biayaKursus' => 800000,
			'jenisKursus' => 'Sistem Operasi'
		],
	];
	$hasil = $temp['hasil'];
	$biayaSubsidi = 0;
	$biayaKursus = $kelas[$jenisKursus]['biayaKursus'];
	$jenisKursus =$kelas[$jenisKursus]['jenisKursus'];
	$hari = "";

	if ($hasil == 'Grade A') {
		$biayaSubsidi= (5 / 100) * $biayaKursus;
	}elseif ($hasil == 'Grade B') {
		$biayaSubsidi= (2 / 100) * $biayaKursus;
	}else{
		$biayaSubsidi = 0;
	}

	if ($Hari == 'K') {
		$hari = "Kamis";
	}else if($Hari == "J"){
		$hari = "Jum'at";
	}elseif($Hari == "M"){
		$hari = "Minggu";
	}

	$biayaTambahan = 0;
	$jenisKelas = $temp['kelas'];
	$jumlahPeserta = $temp['jml_peserta'];

	if ($jenisKelas == "Private") {
		if($jumlahPeserta > 5){
			$biayaTambahan = 75000;
		}else{
			$biayaTambahan = 50000;
		}
	}else if($jenisKelas == "Reguler"){
		if ($jumlahPeserta < 10) {
			$biayaTambahan = 50000;
		}else{
			$biayaTambahan = 0;
		}
	}else{

	}

	$biayaBayar = ($biayaKursus - $biayaSubsidi) + $biayaTambahan;
	return [
		'biayaKursus' => $biayaKursus,
		'biayaSubsidi' => $biayaSubsidi,
		'hari' => $hari,
		'noUrut' => $noUrut,
		'lamaPertemuan' => $lamaPertemuan,
		'jenisKursus' => $jenisKursus,
		'biayaTambahan' => $biayaTambahan,
		'biayaBayar' => $biayaBayar
	];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal UTS - Mila Rosa</title>
</head>
<style type="text/css">
.form-control {
    display: block;
    padding: 5px;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>
<body style="padding: 0; margin:0;">
<div class="header" style="background-color: antiquewhite; padding:10px">
<center><h2>NUSANTARA COMPUTER CENTER</h2></center>
</div>
<center>
<form method="post">
<div class="content" style="max-width:900px; margin-top:10px; padding: 15px; border: 1px solid #3d3d3d;">
    <table width="70%">
        <tr>
            <td style="width:30%;">Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" class="form-control" style="width: 97%;" required></td>
        </tr>
        <tr>
            <td>Kode Pendaftaran</td>
            <td>:</td>
            <td>
                <select name="kode_pendaftaran" class="form-control" style="width: 100%; padding:7px">
					<option value="">Pilih Kode Pendaftaran</option>
                    <option value="VBSK00108">VBSK00108</option>
					<option value="DPSJ00210">DPSJ00210</option>
					<option value="LXSM10105">LXSM10105</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>
                <select name=kelas class="form-control" style="width: 100%; padding:7px">
                    <option value="">Pilih Kelas</option>
                    <option value="Reguler">Reguler</option>
					<option value="Private">Private</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width:30%;">Jumlah Pertemuan</td>
            <td>:</td>
            <td><input type="text" name="jml_pertemuan" class="form-control" style="width: 97%;"></td>
            <td> Kali</td>
        </tr>
        <tr>
            <td style="width:30%;">Jumlah Peserta</td>
            <td>:</td>
            <td><input type="text" name="jml_peserta" class="form-control" style="width: 97%;"></td>
            <td> Orang</td>
        </tr>
        <tr>
            <td>Hasil Tes Awal</td>
            <td>:</td>
            <td>
                <select name=hasil class="form-control" style="width: 100%; padding:7px">
                    <option value="">Pilih Grade</option>
                    <option value="Grade A">Grade A</option>
                    <option value="Grade B">Grade B</option>
                    <option value="Grade C">Grade C</option>
                </select>
            </td>
        </tr>
        <tr>
			<td colspan="3" style="text-align: right;">
                <button type="submit" class="btn btn-primary" name="proses" value="proses">Proses</button>
                <button type="cancel" class="btn btn-primary">Ulang</button>
            </td>
        </tr>
    </table>
</div>
</form>
</center>
<center>
<?php if(isset($_POST['proses'])):?>
	<?php $temp = CariJenisKursus($_POST); ?>
	<br>
        <div class="content" style="max-width:900px; margin:0px 0px;padding: 15px; border: 2px solid #0000FF;">
		    <center><h2>NUSANTARA COMPUTER CENTER</h2></center>
				<h2 align="center">Kode Pendaftaran: <?= $_POST['kode_pendaftaran']?></h2>
				<table width="70%">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= $_POST['nama']?></td>
						<td>Jenis Kursus</td>
						<td>:</td>
						<td><?= $temp['jenisKursus']?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td><?= $_POST['kelas']?></td>
						<td>No Urut</td>
						<td>:</td>
						<td><?= $temp['noUrut']?></td>
					</tr>
					<tr>
						<td>Hasil Test Awal</td>
						<td>:</td>
						<td><?= $_POST['hasil']?></td>
						<td>Hari</td>
						<td>:</td>
						<td><?= $temp['hari']?></td>
					</tr>
					<tr>
						<td>Jumlah Peserta</td>
						<td>:</td>
						<td><?= $_POST['jml_peserta']?> Orang</td>
						<td>Jumlah Pertemuan</td>
						<td>:</td>
						<td><?= $temp['lamaPertemuan']?> Kali</td>
					</tr>
					<tr>
						<td>Biaya Kursus</td>
						<td>:</td> 
						<td><?= $temp['biayaKursus']?></td>
						<td>Biaya Tambahan</td>
						<td>:</td>
						<td><?= $temp['biayaTambahan']?></td>
					</tr>
					<tr>
						<td>Biaya Subsidi</td>
						<td>:</td>
						<td><?= $temp['biayaSubsidi']?></td>
						<td>Biaya Yang Di Bayar</td>
						<td>:</td>
						<td><?= $temp['biayaBayar']?></td>
					</tr>
				</table>
			</div>
<?php endif?>
</center>
</body>
</html>