<div class="row">
	<div class="col s12">
		<div class="card">
			<div id="map" class="card-image waves-effect waves-block waves-light">
				<!-- <img src="modul/tempat/view/pic.php?id=<?=$data->id?>" alt="<?=$data->nama?>"> -->
			</div>
			<div class="card-content">
				<div class="card-title">
					<h3><?=$data->nama?></h3>
				</div>
				<table>
					<tr>
						<th>Buka</th>
						<td><?=$data->wktbuka?></td>
					</tr>
					<tr>
						<th>Tutup</th>
						<td><?=$data->wkttutup?></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td><?=$data->alamat?></td>
					</tr>
					<tr>
						<th>Telepon</th>
						<td><?=$data->telp?></td>
					</tr>
					<tr>
						<th>Tentang</th>
						<td><?=$data->tentang?></td>
					</tr>
					<tr>
						<th>Latitude</th>
						<td><?=$data->latitude?></td>
					</tr>
					<tr>
						<th>Longitude</th>
						<td><?=$data->longitude?></td>
					</tr>
					<tr>
						<th>Kategori</th>
						<td><?php 
							foreach ($kat as $ka) {
								if ($data->idkategori !== "") {
									if ($ka->id == $data->idkategori) {
										echo $ka->nkategori;
									}
								}else{
									echo "kategori error!";
								}
							}
						?></td>
					</tr>
					<tr>
						<th>Kota</th>
						<td><?php 
							foreach ($kot as $ko) {
								if ($data->idkategori !== "") {
									if ($ko->id == $data->idkota) {
										echo $ko->nkota;
									}
								}else{
									echo "kategori error!";
								}
							}
						?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var url = GMaps.staticMapURL({
			lat : <?=$data->latitude?>,
			lng : <?=$data->longitude?>,
			zoom : 18,
			key : 'AIzaSyBEhEeu3hILtxyefBn1r5YOV-6c6YYaaog',
			markers: [
				{lat : <?=$data->latitude?>, lng : <?=$data->longitude?>, color : 'yellow'}
			]
		})

		$('<img/>').attr('src',url).appendTo('#map');
	})
</script>