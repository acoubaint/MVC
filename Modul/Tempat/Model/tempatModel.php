<?php
/**
* 
*/
class tempatModel
{
	protected $koneksi;
        

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function semua()
	{
		$sql = "select * from tempat";
		$query = $this->koneksi->query($sql);
		$data=[];
		while ($row = $query->fetch_object()) {
			$data[]=$row;
		}
		return $data;
	}

	public function cariId($id)
	{
		$query = "select * from tempat where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		$stmt->execute();
		$stmt->bind_result($id,$nama,$wktbuka,$wkttutup,$alamat,$telp,$gambar,$tipe,$tentang,$latitude,$longitude,$idkategori,$idkota);
		$stmt->fetch();
		$data = new \StdClass;
		$data->id = $id;
		$data->nama = $nama;
		$data->wktbuka = $wktbuka;
		$data->wkttutup = $wkttutup;
		$data->alamat = $alamat;
		$data->telp = $telp;
		$data->gambar = $gambar;
		$data->tipe = $tipe;
		$data->tentang = $tentang;
		$data->latitude = $latitude;
		$data->longitude = $longitude;
		$data->idkategori = $idkategori;
		$data->idkota = $idkota;
		return $data;
		$stmt->close();
	}

	public function simpan($data,$gambar)
	{
		$null = null;
		$query = "insert into tempat (nama,wktbuka,wkttutup,alamat,telp,gambar,tipe_gambar,tentang,latitude,longitude,idkategori,idkota) value (?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('sssssbssssii',
							$data['nama'],
							$data['wktbuka'],
							$data['wkttutup'],
							$data['alamat'],
							$data['telp'],
							$null,
							$gambar->tipe,
							$data['tentang'],
							$data['lat'],
							$data['long'],
							$data['idkategori'],
							$data['idkota']
							);
		$stmt->send_long_data(5,file_get_contents($this->koneksi->real_escape_string($gambar->nama_tmp)));
		return $stmt->execute();
		$stmt->close();
	}

	public function ubah($id,$data,$gambar)
	{	
		if ($gambar !== null) {

			$query = "update tempat set nama = ?,wktbuka = ?,wkttutup = ?,alamat = ?,telp = ?,gambar = ?,tipe_gambar = ?,tentang = ?,latitude = ?,longitude = ?,idkategori = ?,idkota = ? where id = ?";
			$stmt = $this->koneksi->prepare($query);
			$stmt->bind_param('sssssbssssiii',
								$data['nama'],
								$data['wktbuka'],
								$data['wkttutup'],
								$data['alamat'],
								$data['telp'],
								$null,
								$gambar->tipe,
								$data['tentang'],
								$data['lat'],
								$data['long'],
								$data['idkategori'],
								$data['idkota'],
								$id
								);
			$stmt->send_long_data(5,file_get_contents($this->koneksi->real_escape_string($gambar->nama_tmp)));
		}else{
			$query = "update tempat set nama = ?,wktbuka = ?,wkttutup = ?,alamat = ?,telp = ?,tentang = ?,latitude = ?,longitude = ?,idkategori = ?,idkota = ? where id = ?";
			$stmt = $this->koneksi->prepare($query);
			$stmt->bind_param('ssssssssiii',
								$data['nama'],
								$data['wktbuka'],
								$data['wkttutup'],
								$data['alamat'],
								$data['telp'],
								$data['tentang'],
								$data['lat'],
								$data['long'],
								$data['idkategori'],
								$data['idkota'],
								$id
								);
		}
		return $stmt->execute();
		$stmt->close();
	}

	public function hapus($id)
	{
		$query = "delete from tempat where id=?";
		$stmt = $this->koneksi->prepare($query);
		$stmt->bind_param('i',$id);
		return $stmt->execute();
		$stmt->close();
	}
}	