<?php
/**
* 
*/
class kotaController
{
	protected $kota;

	function __construct($kota)
	{
		$this->kota = $kota;
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
		$result = $this->kota->semua();
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
			$this->kota->simpan($_POST);
			header("location:index.php?mod=kota");
		}else{
			$this->form(["url"=>"?mod=kota&aksi=tambah"]);
		}
	}

	public function edit($id)
	{
		if (!empty($_POST)) {
			$this->kota->ubah($id,$_POST);
			header("location:index.php?mod=kota");
		}else{
			$item = $this->kota->cariId($id);
			$this->form(["url"=>"?mod=kota&aksi=edit&id=".$id,"item"=>$item]);
		}
	}

	public function hapus($id)
	{
		$this->kota->hapus($id);
		header("location:index.php?mod=kota");
	}
}