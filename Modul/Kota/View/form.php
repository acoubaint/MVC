<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<table>
					<form action="<?=$url;?>" method="post">
						<tr>
							<td>Nama Kota :</td>
							<td><input type="text" name="nkota" value="<?=$value= isset($item) ? $item : null;?>">
							</td>
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