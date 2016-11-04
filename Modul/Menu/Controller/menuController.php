<?php
/**
* 
*/
class menuController
{
	protected $menu;
	protected $tempat;

	function __construct($menu,$tempat)
	{
		$this->menu = $menu;
		$this->tempat = $tempat;
	}

	public function aksi($aksi)
	{
		if ($aksi == "" || $aksi == "beranda") {
			$this->beranda($_GET['id']);
		}elseif ($aksi == "tambah") {
			$this->tambah($_GET['id']);
		}elseif ($aksi == "edit") {
			$this->edit($_GET['id']);
		}elseif ($aksi == "hapus") {
			$this->hapus($_GET['id'],$_GET['dir']);
		}else {
			echo "Error 404";
		}
	}

	public function beranda($id)
	{
		$result = $this->menu->semua($id);
		// var_dump($result);
		include __DIR__.'/../View/index.php';
	}

	public function form($data)
	{
		extract($data);
		include __DIR__.'/../View/form.php';
	}

	public function tambah($id)
	{
		if (!empty($_FILES)) {
			$file = array();
			$gambar = $_FILES['gambar'];
			$count = count($_FILES['gambar']['name']);
			$file_keys = array_keys($gambar);
			for($i=0 ; $i < $count ; $i++){
				foreach ($file_keys as $key) {
					$file[$i][$key] = $gambar[$key][$i];
				}
			}
			// foreach ($file as $data) {
			// 	echo $data['name']." ".$data['type']." ".$data['size']." ".$data['tmp_name']."<br>";
			// }
			$this->menu->simpan($file,$id);
			$data = $this->tempat->cariId($id);
			$nama = $data->nama;
			header("location:index.php?mod=menu&aksi=beranda&id=".$id."&nama=".$nama);
		}else{
			$item = new \StdClass;
			$item->id = null;
			$item->nmenu = null;
			$this->form(["url"=>"?mod=menu&aksi=tambah&id=".$id,"item"=>$item]);
		}
	}

	public function edit($id)
	{
		if (!empty($_POST)) {
			$this->menu->ubah($id,$_POST);
			header("location:index.php?mod=menu");
		}else{
			$item = $this->menu->cariId($id);
			$this->form(["url"=>"?mod=menu&aksi=edit&id=".$id,"item"=>$item]);
		}
	}

	public function hapus($id,$dir)
	{
		$this->menu->hapus($id);
		header("location:index.php?mod=menu&id=".$dir);
	}
}