<?php
/**
* 
*/
class berandaController
{
	protected $tempat;
	protected $kategori;
	protected $kota;
	protected $menu;
	protected $fasilitas;

	function __construct($data)
	{
		extract($data);
		$this->tempat = $tempat;
		$this->kategori = $kategori;
		$this->kota = $kota;
		$this->menu = $menu;
		$this->fasilitas = $fasilitas;
	}

	public function aksi($aksi)
	{
		if ($aksi == "" || $aksi == "beranda") {
			$this->beranda();
		}elseif ($aksi == "tambah") {
			$this->tambah();
		}elseif ($aksi == "edit") {
			$this->edit($_GET['id']);
		}elseif ($aksi == "show") {
			$this->show($_GET['id']);
		}elseif ($aksi == "hapus") {
			$this->hapus($_GET['id']);
		}else {
			echo "Error 404";
		}
	}

	public function beranda()
	{
		$tempatCount = count($this->tempat->semua());
		$kategoriCount = count($this->kategori->semua());
		$kotaCount = count($this->kota->semua());
		include __DIR__.'/../View/index.php';
	}

	public function show($id)
	{
		$data = $this->tempat->cariId($id);
		$kot = $this->kota->semua();
		$kat = $this->kategori->semua();
		include __DIR__.'/../View/show.php';
	}

	public function form($data)
	{
		extract($data);
		include __DIR__.'/../View/form.php';
	}

	public function tambah()
	{
		if (!empty($_POST)) {
			$gambar = $this->gambar($_FILES['gambar']['name'],$_FILES['gambar']['tmp_name'],$_FILES['gambar']['size'],$_FILES['gambar']['type']);
			// var_dump($_POST);
			// var_dump($_FILES['gambar']);
			$this->tempat->simpan($_POST,$gambar);
			header("location:index.php?mod=tempat");
		}else{
			$item = new \StdClass;
			$item->id = null;
			$item->nama = null;
			$item->wktbuka = null;
			$item->wkttutup = null;
			$item->alamat = null;
			$item->telp = null;
			$item->gambar = null;
			$item->tentang = null;
			$item->latitude = null;
			$item->longitude = null;
			$item->idkategori = null;
			$item->idkota = null;
			$kat = $this->kategori->semua();
			$kot = $this->kota->semua();
			$this->form(["url"=>"?mod=tempat&aksi=tambah","item"=>$item,"kat"=>$kat,"kot"=>$kot]);
		}
	}

	public function edit($id)
	{
		if (!empty($_POST)) {
			$gambar = null;
			if ($_FILES['gambar']['name'] !== "") {
				$gambar = $this->gambar($_FILES['gambar']['name'],$_FILES['gambar']['tmp_name'],$_FILES['gambar']['size'],$_FILES['gambar']['type']);
			}
			$this->tempat->ubah($id,$_POST,$gambar);
			header("location:index.php?mod=tempat");
		}else{
			$item = $this->tempat->cariId($id);
			$kat = $this->kategori->semua();
			$kot = $this->kota->semua();
			$this->form(["url"=>"?mod=tempat&aksi=edit&id=".$id,"item"=>$item,"kat"=>$kat,"kot"=>$kot]);
		}
	}

	public function hapus($id)
	{
		$this->tempat->hapus($id);
		header("location:index.php?mod=tempat");
	}

	public function gambar($nama,$nama_tmp,$ukuran,$tipe)
	{
		$data = new \StdClass;
		$data->nama = $nama;
		$data->nama_tmp = $nama_tmp;
		$data->ukuran = $ukuran;
		$data->tipe = $tipe;
		$fp = fopen($data->nama_tmp, 'r');
		//fopen(filename, mode)
		$data->konten = fread($fp, $data->ukuran);
		// $data->konten = mysql_real_escape_string($data->konten);
		fclose($fp);
		return $data;
	}

}