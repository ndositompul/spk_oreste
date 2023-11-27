<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Metode ORESTE</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>

<h3 align="center" class="mb-5"> Sekolah SMK PAB 5 KLAMBIR V</h3>
<hr>
<h3 align="center">Laporan Hasil Perhitungan Metode Oreste Mutasi Guru Pada Sekolah SMK PAB 5 KLAMBIR V</h3>
<br>
<table border="1" width="100%">
	<thead class="bg-secondary text-white">
		<tr align="center">
			<th>Alternatif</th>
			<th>Nilai Preference</th>
			<th width="15%">Ranking</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach ($hasil as $keys): ?>
		<tr align="center">
			<td align="left">
				<?php
				$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
				echo $nama_alternatif['nama'];
				?>
			
			</td>
			<td><?= $keys->nilai ?></td>
			<td><?= $no; ?></td>
		</tr>
		<?php
			$no++;
			endforeach ?>
	</tbody>
</table>
<br>
<br>
<table border="0" align="center" width="90%" style="border:none;margin-top:5px;margin-bottom:20px;">
	<tr>
        <td align="right" style="border:none;">Medan, <?php echo date('d-M-Y')?></td>
    </tr>
	<tr>
        <td align="right" style="border:none;">Mengetahui,</td>
    </tr>
    <tr>
        <td align="right" style="border:none;">Kepala Sekolah</td>
    </tr>
   
    <tr>
    <td style="border:none;"><br/><br/><br/><br/></td>
    </tr>
    <tr>
		<td align="right" style="border:none;">(Agus Sudjono, M.Pd)</td>
	</tr>
</table>

</body>
</html>