<div class="row">
	<div class="col s12">
	<button id="btnAdd" class="btn col s12">tambah</button>
	<form action="<?=$url;?>" method="post" enctype="multipart/form-data">
		<div id="row-file" class="col s12">
			<div class="col s12 m4">
				<div id="file" class="card medium">
					<div class="card-content">
					<div id="input-gam" class="file-field input-field">
						<img id="gambar" class="activator" src="res/addImage.jpg" width="100%" alt="" class="responsive-img">
						<div class="btn amber darken-4">
		        			<span><i class="material-icons">picture_in_picture</i></span>
		        			<input id="in_gam" type="file" name="gambar[]">
		      			</div>
		      			<div class="file-path-wrapper">
		        			<input class="file-path validate" type="text">
		      			</div>
		    		</div>
		    		</div>
		    		<div class="card-action">
		    			<a class="btn col s12 waves-effect waves-light" id="btnDel">Hapus</a>
		    		</div>
				</div>
			</div>
		</div>
		<input class="btn col s12" type="submit">
		</form>
	</div>
</div>		

<script>
			function bacaGambar(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						// $('#gambar').attr('src',e.target.result);
						$('#tmp_gam').val(e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function(){
				// $('table').prepend('hallo');
				$('#btnAdd').click(function(){
					$('#row-file').prepend('<div class="col s12 m4">				<div id="file" class="card medium">					<div class="card-content">					<div id="input-gam" class="file-field input-field">						<img id="gambar" class="activator" src="res/addImage.jpg" width="100%" alt="" class="responsive-img">						<div class="btn amber darken-4">		        			<span><i class="material-icons">picture_in_picture</i></span>		        			<input id="in_gam" type="file" name="gambar[]">		      			</div>		      			<div class="file-path-wrapper">		        			<input class="file-path validate" type="text">		      			</div>		    		</div>		    		</div>		    		<div class="card-action">		    			<a class="btn col s12 waves-effect waves-light" id="btnDel">Hapus</a>		    		</div>				</div>			</div>');
				})
				$(document).on('click', '#btnDel', function(){
		   			$(this).parents('#file').remove(); 		
		  		})

		  		$('#in_gam').change(function(){
		  			var imgURL = $('#tmp_gam').val();
					// $(this).parents("#input-gam").children('img').attr('src',imgURL);
					// bacaGambar(this);
				});
			})
</script>