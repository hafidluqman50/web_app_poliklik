<?php $this->load('layout\header') ?>
<?php $this->load('admin\navbar-admin') ?>
	<section class="content">
		<?php if (isset($_SESSION['simpan'])): ?>
		<div class="alert alert-success">
			<?= $_SESSION['simpan'] ?>
			<?php unset($_SESSION['simpan']) ?>
		</div>	
		<?php unset($_SESSION['simpan']) ?>
		<?php elseif(isset($_SESSION['edit'])): ?>
		<div class="alert alert-warning">
			<?= $_SESSION['edit'] ?>
			<?php unset($_SESSION['edit']) ?>
		</div>
		<?php unset($_SESSION['edit']) ?>
		<?php elseif(isset($_SESSION['hapus'])): ?>
		<div class="alert alert-danger">
			<?= $_SESSION['hapus'] ?>
			<?php unset($_SESSION['hapus']) ?>
		</div>
		<?php unset($_SESSION['hapus']) ?>
		<?php endif ?>
		<div class="data-table">
			<div class="data-table-header">
				<a href="?c=admin&m=tambah_data_dokter">
					<button class="btn btn-danger-outline">
						Tambah Data
					</button>
				</a>
				<input type="search" class="input input-float-right light-table-filter" data-table="table" placeholder="Cari Data Pasien">
			</div>
			<div class="data-table-body">
				<table class="table" id="table">
					<thead>
						<th>No</th>
						<th>Nama Dokter</th>
						<th>Spesialis</th>
						<th>Nama Poli</th>
						<th>Tarif</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php if ($cek != 0): ?>
							<?php foreach ($get_dokter as $num => $dokter): ?>
							<tr>
								<td><?= $num+1; ?></td>
								<td><?= $dokter['nama_dkt'] ?></td>
								<td><?= $dokter['spesialis'] ?></td>
								<td><?= $dokter['nama_poli'] ?></td>
								<td><?= $dokter['tarif'] ?></td>
								<td><a href="?c=admin&m=edit_data_dokter&id=<?= $dokter['id_dkt'] ?>">
									<button class="btn btn-warning-outline btn-action">
										Edit
									</button>
								</a><a href="?c=admin&m=delete_data_dokter&id=<?= $dokter['id_dkt'] ?>">
									<button class="btn btn-danger-outline btn-action">
										Hapus
									</button>
								</a></td>
							</tr>
							<?php endforeach ?>
						<?php else: ?>
						<tr>
							<td colspan="7">Data Kosong</td>
						</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>	
		</div>
	</section>
<?php $this->load('layout\footer') ?>