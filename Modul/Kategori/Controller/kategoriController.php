<?php
/**
* 
*/
class kategoriController
{
	protected $kategori;

	function __construct($kategori)
	{
		$this->kategori = $kategori;
	}

	public function aksi($aksi)
	{
		if ($aksi == "" || $aksi == "beranda") {
			$this->beranda();
		}elseif ($aksi == "tambah") {
			$this->tambah();
		}elseif ($aksi == "edit") {
			$this->edit($_GET['id']);
		}elseif ($aksi == "hapus") {
			$this->hapus($_GET['id']);
		}else {
			echo "Error 404";
		}
	}

	public function beranda()
	{
		$result = $this->kategori->semua();
		include __DIR__.'/../View/index.php';
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
			$this->kategori->simpan($_POST,$gambar);
			header("location:index.php?mod=kategori");
		}else{
			$item = new \StdClass;
			$item->id = null;
			$item->nkategori = null;
			$item->gambar = null;
			$item->tipe_gambar = null;
			$this->form(["url"=>"?mod=kategori&aksi=tambah","item"=>$item]);
		}
	}

	public function edit($id)
	{
		if (!empty($_POST)) {
			$gambar = $this->gambar($_FILES['gambar']['name'],$_FILES['gambar']['tmp_name'],$_FILES['gambar']['size'],$_FILES['gambar']['type']);
			$this->kategori->ubah($id,$_POST,$gambar);
			header("location:index.php?mod=kategori");
		}else{
			$item = $this->kategori->cariId($id);
			$this->form(["url"=>"?mod=kategori&aksi=edit&id=".$id,"item"=>$item]);
		}
	}

	public function hapus($id)
	{
		$this->kategori->hapus($id);
		header("location:index.php?mod=kategori");
	}

	public function gambar($nama,$nama_tmp,$ukuran,$tipe)
	{
		$data = new \StdClass;
		$data->nama = $nama;
		$data->nama_tmp = $nama_tmp;
		$data->ukuran = $ukuran;
		$data->tipe = $tipe;
		return $data;
	}
}