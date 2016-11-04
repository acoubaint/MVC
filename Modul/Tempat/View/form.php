<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="row">
			<div class="col s12">
			<table class="centered">
				<form action="<?=$url;?>" method="post" enctype="multipart/form-data">
					<tr>
						<td colspan="2">
						<div class="file-field input-field">
						<img id="gambar" src="<?php 
						if ($item->gambar != null) {
							echo "/Modul/Tempat/View/pic.php?id=$item->id";
						}else{
							echo "res/noImage.jpg";
						}
					?>" width="100%" alt="" class="responsive-img">
	     					<div class="btn amber darken-4">
	        					<span>Pilih Gambar</span>
	        					<input type="file" name="gambar" id="in_gam">
	      					</div>
	      					<div class="file-path-wrapper">
	        					<input class="file-path validate" type="text">
	      					</div>
	    				</div>
						
						</td>
					</tr>
					<tr>
						<td>Nama Tempat :</td>
						<td><input type="text" name="nama" value="<?=$item->nama?>">
						</td>
					</tr>
					<tr>
						<td>Waktu Buka :</td>
						<td><input type="text" name="wktbuka" value="<?=$item->wktbuka?>">
						</td>
					</tr>
					<tr>
						<td>Waktu Tutup :</td>
						<td><input type="text" name="wkttutup" value="<?=$item->wkttutup?>">
						</td>
					</tr>
					<tr>
						<td>Alamat :</td>
						<td><input type="text" name="alamat" value="<?=$item->alamat?>">
						</td>
					</tr>
					<tr>
						<td>Telepon :</td>
						<td><input type="text" name="telp" value="<?=$item->telp?>">
						</td>
					</tr>
					<tr>
						<td>Tentang :</td>
						<td><input type="text" name="tentang" value="<?=$item->tentang?>">
						</td>
					</tr>
					<tr>
						<td colspan="2"><div id="map" class="col s12"></div></td>
					</tr>
					<tr>
						<td><input type="text" name="lat" value="<?=$item->latitude?>" id="lat">
						</td>
						<td><input type="text" name="long" value="<?=$item->longitude?>" id="long">
						</td>
					</tr>
					<tr>
						<td>Kategori :</td>
						<td>
							<select name="idkategori" class="browser-default">
							<?php foreach($kat as $kategori) : ?>
								<?php if ($item->idkategori == $kategori->id){ ?>
								<option value="<?=$kategori->id?>" selected><?=$kategori->nkategori?></option>	
								<?php }else{ ?>
								<option value="<?=$kategori->id?>"><?=$kategori->nkategori?></option>
								<?php } ?>
							<?php endforeach?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Kota :</td>
						<td>
							<select name="idkota" class="browser-default">
							<?php foreach($kot as $kota) : ?>
								<?php if ($item->idkota == $kota->id){ ?>
								<option value="<?=$kota->id?>" selected><?=$kota->nkota?></option>
								<?php }else{ ?>
								<option value="<?=$kota->id?>"><?=$kota->nkota?></option>
								<?php } ?>
							<?php endforeach?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="simpan" class="btn amber darken-4"></td>
					</tr>
				</form>
			</table>
			</div>
			</div>
		</div>
	</div>
</div>
<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#gambar').attr('src',e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

$(document).ready(function(){
	if ($('#lat').val() !== null && $('#long').val() !== null ) {
		var lat = $('#lat').val();
		var lng = $('#long').val()

		map = new GMaps({
			el: '#map',
	        lat: lat,
	        lng: lng,
        	zoom : 16
		})

		map.addMarker({
			lat : lat,
			lng : lng,
			infoWindow : {
				content : '<b> Posisi yang anda pilih! </b>'
			}
		});
	}else{
		map = new GMaps({
			el: '#map',
	        lat: -0.489356,
	        lng: 117.15,
        	zoom : 14
		})
	}

	GMaps.on('marker_added', map, function(marker){
		$('#lat').val(marker.getPosition().lat());
		$('#long').val(marker.getPosition().lng());
	})

	GMaps.on('click',map.map,function(event){
		var lat = event.latLng.lat();
		var lng = event.latLng.lng();
		map.removeMarkers();
		map.addMarker({
			lat : lat,
			lng : lng,
			infoWindow : {
				content : '<b> Posisi yang anda pilih! </b>'
			}
		})
	})

	$('#in_gam').change(function(){
			bacaGambar(this);
		});
})
</script>