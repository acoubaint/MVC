<div class="fixed-action-btn">
	<a class="btn-floating btn-large orange" href="?mod=kota&aksi=tambah">
		<i class="material-icons">mode_edit</i>
	</a>
</div>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="container">
				<div class="card-content">
				<table>
				<thead>
					<tr>
						<th class="data-field">ID</th>
						<th class="data-field">Nama Kota</th>
						<th class="data-field"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $data): ?>
					<tr>
						<td><?=$data->id;?></td>
						<td><?=$data->nkota;?></td>
						<td>
							<a href="?mod=kota&aksi=edit&id=<?=$data->id;?>" class="tooltipped" data-tooltip="edit">
								<i class="material-icons">mode_edit</i>
							</a>
							<a href="#modal<?=$data->id;?>" class="modal-trigger tooltipped" data-tooltip="hapus">
								<i class="material-icons">delete</i>
							</a>
							<div id="modal<?=$data->id;?>" class="modal">
						    <div class="modal-content">
						      <h4>Hapus Data</h4>
						      <p>Anda yakin ingin menghapus <b><?=$data->nkota?></b> ?</p>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Jangan Hapus</a>
						      <a href="?mod=kota&aksi=hapus&id=<?=$data->id;?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Hapus</a>
						    </div>
						</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
				</table>		
				</div>
			</div>
		</div>
	</div>
</div>