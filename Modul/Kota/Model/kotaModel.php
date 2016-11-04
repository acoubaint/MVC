<?php
/**
* 
*/
class kotaModel
{
	protected $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function semua()
	{
		$query = $this->koneksi->query("select * from kota");
		$data=[];
		while ($row = $query->fetch_object()) {
			$data[]=$row;
		}
		return $data;
	}

	public function cariId($id)
	{
		$query = "select * from kota where id=?";
		$stmt = $this->koneksi->prepare($query);
		//s = string, i = integer , d = double,  b = blob
		$stmt->bind_param('i', $id);
		//eksekusi query
		$stmt->execute();
		//memnyimpan hasil kevariable
		$stmt->bind_result($id, $nama);
		$stmt->fetch();
		$nkota = $nama;
		return $nkota;
		$stmt->close();
	}

	public function simpan($data)
	{
		$query = "insert into kota (nkota) value (?)";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('s',$data['nkota']);
		return $stmt->execute();
		$stmt->close();
	}

	public function ubah($id,$data)
	{
		$query = "update kota set nkota = ? where id = ?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('si',$data['nkota'],$id);
		return $stmt->execute();
		$stmt->close();
	}

	public function hapus($id)
	{
		$query = "delete from kota where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		return $stmt->execute();
		$stmt->close();
	}
}