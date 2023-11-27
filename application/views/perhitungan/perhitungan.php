<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Perhitungan Metode Oreste</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<!-- Modal -->
<div class="modal fade" id="nilai_r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai R</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <?php echo form_open('Perhitungan'); ?>
		  <div class="modal-body">
			<div class="form-group">
				<label class="font-weight-bold">Nama R (Koefisien)</label>
				<input autocomplete="off" type="number" name="nilai" value="<?php echo $nilai_r->nilai ?>" required class="form-control"/>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		  </div>
	  <?php echo form_close() ?>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Penilaian Alternatif Terhadap Kriteria</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai'];
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php foreach ($kriteria as $key): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Kriteria <?= $key->keterangan ?></h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<th>Nilai</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<td>
						<?php 
							$data_rank = $this->Perhitungan_model->data_rank($keys->id_alternatif,$key->id_kriteria);
							echo $data_rank['nilai'];
						?>
						</td>
						<td>Ranking = 
						<?php 
							echo $data_rank['rank'];
						?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php endforeach ?>


<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Nilai Normalisasi Besson Rank</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_rank = $this->Perhitungan_model->data_rank($keys->id_alternatif,$key->id_kriteria);
							echo $data_rank['rank'];
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
	  <div class="d-sm-flex align-items-center justify-content-between">
	  	<h6 class="ml-3 mt-2 font-weight-bold text-dark"><i class="fa fa-table"></i> Nilai Distance Score</h6>
		<button type="button" class="btn btn-success btn-sm ml-auto" data-toggle="modal" data-target="#nilai_r" style="height:">
			<i class="fa fa-cogs"></i> Atur Nilai R (Koefisien)
		</button>
	  </div>
    </div>
						
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php 
						$n_o = 1;
						foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_rank = $this->Perhitungan_model->data_rank($keys->id_alternatif,$key->id_kriteria);
							$n_a = pow($data_rank['rank'],$nilai_r->nilai);
							$n_b = pow($n_o,$nilai_r->nilai);
							$n_c = 1/$nilai_r->nilai;
							$n_d = ((1/2)*$n_a)+((1/2)*($n_b));
							$nilai_d = pow($n_d,$n_c);
							echo number_format($nilai_d,2);
						?>
						</td>
						<?php 
						$n_o++;
						endforeach; ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
	  <div class="d-sm-flex align-items-center justify-content-between">
	  	<h6 class="ml-3 mt-2 font-weight-bold text-dark"><i class="fa fa-table"></i> Distance Score * Wj (Bobot Kriteria )</h6>
	  </div>
    </div>
						
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php 
						$n_o = 1;
						foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_rank = $this->Perhitungan_model->data_rank($keys->id_alternatif,$key->id_kriteria);
							$n_a = pow($data_rank['rank'],$nilai_r->nilai);
							$n_b = pow($n_o,$nilai_r->nilai);
							$n_c = 1/$nilai_r->nilai;
							$n_d = ((1/2)*$n_a)+((1/2)*($n_b));
							$nilai_d = pow($n_d,$n_c);
							echo number_format($nilai_d,2);
						?>
						</td>
						<?php 
						$n_o++;
						endforeach; ?>
					</tr>
					<?php
						$no++;
						endforeach
						?>
					<tr class="bg-dark text-white">
						<td colspan="7" align="center"><b>X (dikali)<b></td>
					</tr>
					<tr align="center">
						<td colspan="2" align="center"><b>Bobot<b></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
						echo $key->bobot;
						?>
						</td>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Nilai Preferensi</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<th>Nilai Preference</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$this->Perhitungan_model->hapus_hasil();
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php 
						$n_o = 1;
						$n_kali = 1;
						$n_jum = 0;
						foreach ($kriteria as $key): ?>
						<?php 
							$data_rank = $this->Perhitungan_model->data_rank($keys->id_alternatif,$key->id_kriteria);
							$n_a = pow($data_rank['rank'],$nilai_r->nilai);
							$n_b = pow($n_o,$nilai_r->nilai);
							$n_c = 1/$nilai_r->nilai;
							$n_d = ((1/2)*$n_a)+((1/2)*($n_b));
							$nilai_d = pow($n_d,$n_c);
							
							$n_kali = number_format($nilai_d,2)*$key->bobot;
							$n_jum += $n_kali;
						?>
						<?php 
						$n_o++;
						endforeach; ?>
						<td><?= $n_jum ?></td>
					</tr>
					<?php
						$hasil_akhir = [
							'id_alternatif' => $keys->id_alternatif,
							'nilai' => $n_jum
						];
						$this->Perhitungan_model->insert_hasil($hasil_akhir);
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th>Alternatif</th>
						<th>Nilai Preference (Vi)</th>
						<th width="15%">Rank</th>
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
		</div>
	</div>
</div>

<?php
$this->load->view('layouts/footer_admin');
?>