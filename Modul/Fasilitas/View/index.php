<div class="fixed-action-btn">
	<a href="?mod=fasilitas&aksi=tambah&id=<?=$_GET['id'];?>" class="btn-floating btn-large orange">
		<i class="material-icons">mode_edit</i>
	</a>
</div>
<div class="row">
	<div class="col s12">
	<?php foreach ($result as $data): ?>
		<div class="col s12 m3">
				<div class="card small">
					<div class="card-content">
						<img class="responesive-img materialboxed" src="/Modul/Fasilitas/View/pic.php?id=<?=$data['id']?>" width="200" alt="<?=$data['id'];?>">
					</div>
					<div class="card-action">
						<a class="btn col s12" href="?mod=fasilitas&aksi=hapus&id=<?=$data['id'];?>&dir=<?=$_GET['id']?>">hapus</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>