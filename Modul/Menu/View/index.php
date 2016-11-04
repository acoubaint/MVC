<div class="fixed-action-btn">
	<a href="?mod=menu&aksi=tambah&id=<?=$_GET['id'];?>" class="btn-floating btn-large orange">
		<i class="material-icons">mode_edit</i>
	</a>
</div>
<div class="row">
	<div class="col s12">
		<?php foreach ($result as $data): ?>
			<div class="col s12 m3">
				<div class="card small">
					<div class="card-content">
							<img class="responesive-img materialboxed" src="/Modul/Menu/View/pic.php?id=<?=$data['id']?>" alt="<?=$data['id'];?>" width="100%">
					</div>
					<div class="card-action">
						<a class="btn col s12" href="?mod=menu&aksi=hapus&id=<?=$data['id'];?>&dir=<?=$_GET['id']?>">hapus</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
