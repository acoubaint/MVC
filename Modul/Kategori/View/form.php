<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<table>
					<form action="<?=$url;?>" method="post" enctype="multipart/form-data">
						<tr>
							<td>Kategori :</td>
							<td><input type="text" name="nkategori" value="<?=$item->nkategori?>">
							</td>
						</tr>
						<tr>
							<td>Gambar :</td>
							<td>
							<div class="file-field input-field">
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
							<td></td>
							<td><img id="gambar" src="
											<?php 
												if ($item->gambar != null) {
													echo "modul/kategori/view/pic.php?id=".$item->id;
												}else{
													echo "res/noImage.jpg";
												}
											?>
							" alt="" class="responsive-img"></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn orange" type="submit"></td>
						</tr>
					</form>
				</table>
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
		$('#in_gam').change(function(){
			bacaGambar(this);
		});
	});
</script>