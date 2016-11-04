<?php
/**
* 
*/
class fasilitasModel
{
	protected $koneksi;

	function __construct($koneksi)
	{
		$this->koneksi = $koneksi;
	}

	public function semua($id)
	{
		$query = "select * from fasilitas where idtempat = ? order by id desc";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$stmt->bind_result($id,$gambar,$tipe,$idtempat);
		$data = [];
		while ($stmt->fetch()) {
			$data[] = array('id' => $id,'gambar' => $gambar,'tipe' => $tipe,'idtempat' => $idtempat);
		}
		return $data;
		$stmt->close();
	}

	public function cariId($id)
	{
		$query = "select * from fasilitas where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$stmt->bind_result($id,$gambar,$tipe,$idtempat);
		$data = new \StdClass;
		while ($stmt->fecth()) {
			$data->id = $id;
			$data->gambar = $gambar;
			$data->tipe = $tipe;
			$data->idtempat = $idtempat;
		}
		return $data;
	}

	public function simpan($data,$id)
	{
		$null = null;
		foreach ($data as $gambar) {
			$query = "insert into fasilitas (gambar,tipe_gambar,idtempat) value (?,?,?)";
			$stmt = $this->koneksi->prepare($query);
			$stmt->bind_param('bsi',$null,$gambar['type'],$id);
			$stmt->send_long_data(0,file_get_contents($this->koneksi->real_escape_string($gambar['tmp_name'])));
			$stmt->execute();
			$stmt->close();
		}
	}

	public function hapus($id)
	{
		$query = "delete from fasilitas where id = ?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		return $stmt->execute();
		$stmt->close();
	}
}