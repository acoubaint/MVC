<div class="fixed-action-btn" style="right: 24px;">
    <a href="?mod=tempat&aksi=tambah" class="btn-floating btn-large orange">
        <i class="material-icons">mode_edit</i>
	</a>
</div>
<div class="row">
	<div class="col s12">

		<?php foreach ($result as $data): ?>
			<div class="col l3 m12">
				<div class="card medium">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="/Modul/Tempat/View/pic.php?id=<?=$data->id?>" alt="<?=$data->nama;?>">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4"><?=$data->nama;?><i class="material-icons right">more_vert</i></span>
			      <p><a href="?mod=tempat&aksi=show&id=<?=$data->id;?>">Detail Tempat!</a></p>
			    </div>
			    <div class="card-action">
			          	<a href="?mod=menu&aksi=beranda&id=<?=$data->id;?>&nama=<?=$data->nama;?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="menu">
							<i class="material-icons">local_dining</i>
			          	</a>
						<a href="?mod=fasilitas&aksi=beranda&id=<?=$data->id;?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="fasilitas">
							<i class="material-icons">weekend</i>
						</a>
						<a href="?mod=tempat&aksi=edit&id=<?=$data->id;?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="edit">
							<i class="material-icons">mode_edit</i>
						</a> 
						<a href="#modal<?=$data->id;?>" class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="hapus" >
							<i class="material-icons">delete</i>
						</a>
						
						<div id="modal<?=$data->id;?>" class="modal">
						    <div class="modal-content">
						      <h4>Modal Header</h4>
						      <p>A bunch of text</p>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Jangan Hapus</a>
						      <a href="?mod=tempat&aksi=hapus&id=<?=$data->id;?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Hapus</a>
						    </div>
						</div>

				</div>
			    <div class="card-reveal">
			      <span class="card-title grey-text text-darken-4"><?=$data->nama;?><i class="material-icons right">close</i></span>
			      <p><?=$data->tentang;?></p>
			    </div>
			  </div>
		  </div>
		<?php endforeach ?>
	</div>
</div>