<?php
/**
* 
*/
class kategoriModel
{
	protected $koneksi;

	function __construct($koneksi)
	{
		$this->koneksi = $koneksi;
	}

	public function semua()
	{
		$query = $this->koneksi->query("select * from kategori");
		$data=[];
		while ($row = $query->fetch_object()) {
			$data[]=$row;
		}
		return $data;
	}

	public function cariId($id)
	{
		$query = "select * from kategori where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$stmt->bind_result($id,$nkategori,$gambar,$tipe);
		$stmt->fetch();
		$data = new \StdClass;
		$data->id = $id;
		$data->nkategori = $nkategori;
		$data->gambar = $gambar;
		$data->tipe = $tipe;
		return $data;
		$stmt->close();
	}

	public function simpan($data,$gambar)
	{
		$null = null;
		$query = "insert into kategori (nkategori,gambar,tipe_gambar) value (?,?,?)";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('sbs',$data['nkategori'],$null,$gambar->tipe);
		$stmt->send_long_data(1,file_get_contents($gambar->nama_tmp));
		return $stmt->execute();
		$stmt->close();
	}

	public function ubah($id,$data,$gambar)
	{
		$null = null;
		$query = "update kategori set nkategori = ?,gambar = ?,tipe_gambar = ? where id = ?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('sbsi',$data['nkategori'],$null,$gambar->tipe,$id);
		$stmt->send_long_data(1,file_get_contents($gambar->nama_tmp));
		return $stmt->execute();
		$stmt->close();
	}

	public function hapus($id)
	{
		$query = "delete from kategori where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		return $stmt->execute();
		$stmt->close();
	}
}