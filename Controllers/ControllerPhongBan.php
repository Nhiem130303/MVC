<?php 
	//import model
	include "Models/ModelPhongBan.php";
	class ControllerPhongBan{
		//kế thừa model
		use ModelPhongBan;
		//hàm liệt kê các bản ghi
		public function read(){
			//quy định số bản ghi hiển thị trên một trang
			$recordPerPage = 3;
			//tính số trang
			$numPage = ceil($this->modelTotalRecord($recordPerPage)/$recordPerPage);
			//lấy dữ liệu từ model
			$records = $this->modelRead($recordPerPage);
			//import file view
			include "Views/ViewPhongBan.php";
		}
		public function update(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			//tạo biến action để đưa vào thuộc tính action của thẻ form
			$action = "index.php?action=updatePost&maphongban=$maphongban";
			//lấy một bản ghi
			$record = $this->modelGetRecord($maphongban);
			//import file FormPhongBan.php
			include "Views/FormPhongBan.php";
		}
		public function updatePost(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			$this->modelUpdate($maphongban);
			//di chuyển đến một url
			header("location:index.php");
		}
		public function create(){
			//tạo biến action để đưa vào thuộc tính action của thẻ form
			$action = "index.php?action=createPost";
			//import file FormPhongBan.php
			include "Views/FormPhongBan.php";
		}
		public function createPost(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			$this->modelCreate();
			//di chuyển đến một url
			header("location:index.php");
		}
		public function delete(){
			$maphongban = isset($_GET["maphongban"])&&is_numeric($_GET["maphongban"])?$_GET["maphongban"]:0;
			$this->modelDelete($maphongban);
			//di chuyển đến một url
			header("location:index.php");
		}
	}
 ?>