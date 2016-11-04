<div class="fixed-action-btn" style="right:24px;">
	<a href="?mod=kategori&aksi=tambah" class="btn-floating btn-large orange">
		<i class="material-icons">mode_edit</i>
	</a>
</div>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<table>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Gambar</th>
						<th></th>
					</tr>
					<?php $no=1; ?>
					<?php foreach ($result as $data): ?>
					<tr>
						<td><?=$no;?></td>
						<td><?=$data->nkategori;?></td>
						<td><img src="/Modul/Kategori/View/pic.php?id=<?=$data->id?>" width="64" alt=""></td>
						<td>
							<a href="?mod=kategori&aksi=edit&id=<?=$data->id;?>" class="tooltipped" data-tooltip="edit">
								<i class="material-icons">mode_edit</i>
							</a>
							<a href="#modal<?=$data->id;?>" class="modal-trigger tooltipped" data-tooltip="hapus">
								<i class="material-icons">delete</i>
							</a>
							<div id="modal<?=$data->id;?>" class="modal">
						    <div class="modal-content">
						      <h4>Hapus Data</h4>
						      <p>Anda yakin ingin menghapus <b><?=$data->nkategori?></b> ?</p>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Jangan Hapus</a>
						      <a href="?mod=kategori&aksi=hapus&id=<?=$data->id;?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Hapus</a>
						    </div>
						</div>
						</td>
					</tr>
					<?php $no++; ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>