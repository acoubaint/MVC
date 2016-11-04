<?php
/**
* 
*/
class fasilitasController
{
	protected $fasilitas;

	function __construct($fasilitas)
	{
		$this->fasilitas = $fasilitas;
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
			echo "Action - Error 404";
		}
	}

	public function beranda($id)
	{
		$result = $this->fasilitas->semua($id);
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
			$this->fasilitas->simpan($file,$id);
			header("location:index.php?mod=fasilitas&id=".$id);
		}else{
			$item = new \StdClass;
			$item->id = null;
			$item->nfasilitas = null;
			$this->form(["url"=>"?mod=fasilitas&aksi=tambah&id=".$id,"item"=>$item]);
		}
	}

	public function edit($id)
	{
		if (!empty($_POST)) {
			$this->fasilitas->ubah($id,$_POST);
			header("location:index.php?mod=fasilitas");
		}else{
			$item = $this->fasilitas->cariId($id);
			$this->form(["url"=>"?mod=fasilitas&aksi=edit&id=".$id,"item"=>$item]);
		}
	}

	public function hapus($id,$dir)
	{
		$this->fasilitas->hapus($id);
		header("location:index.php?mod=fasilitas&id=".$dir);
	}
}