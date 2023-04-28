<?php 
	trait ModelPhongBan{
		//Lấy tất cả các bản ghi trên một trang nào đó
		public function modelRead($recordPerPage){
			//tính số trang = Tổng số bản ghi / số bản ghi trên một trang
			/*
				- Hàm ceil sẽ lấy trần. VD: ceil(3.6) = 4
				- Hàm floor sẽ lấy sàn. VD: floor(3.6) = 3
			*/
			//lấy biến p truyền từ url (chỉ trang hiện tại)
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0?$_GET["p"]-1:0;
			//tính số bản ghi hiển thị trên một trang
			$from = $p * $recordPerPage;
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from phongban order by maphongban desc limit $from,$recordPerPage");
			//trả về tất cả các bản ghi
			return $query->fetchAll();
		}
		//Đếm tổng số bản ghi
		public function modelTotalRecord($recordPerPage){
			//lấy biến kết nối từ class Connection
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from phongban");
			//trả về số lượng bản ghi
			return $query->rowCount();
		}
		//lấy một bản ghi
		public function modelGetRecord($maphongban){
			//lấy biến kết nối từ class Connection
			$conn = Connection::getInstance();
			//chuẩn bị truy vấn
			$query = $conn->prepare("select * from phongban where maphongban=:var_maphongban");
			//thực thi truy vấn
			$query->execute(["var_maphongban"=>$maphongban]);
			//trả về một bản ghi
			return $query->fetch();
		}
		//update bản ghi
		public function modelUpdate($maphongban){
			$tenphongban = $_POST['tenphongban'];
			//lấy biến kết nối từ class Connection
			$conn = Connection::getInstance();
			//chuẩn bị truy vấn
			$query = $conn->prepare("update phongban set tenphongban=:var_tenphongban where maphongban=:var_maphongban");
			//thực thi truy vấn
			$query->execute(["var_maphongban"=>$maphongban,"var_tenphongban"=>$tenphongban]);
		}
		//create bản ghi
		public function modelCreate(){
			$tenphongban = $_POST['tenphongban'];
			//lấy biến kết nối từ class Connection
			$conn = Connection::getInstance();
			//chuẩn bị truy vấn
			$query = $conn->prepare("insert into phongban set tenphongban=:var_tenphongban");
			//thực thi truy vấn
			$query->execute(["var_tenphongban"=>$tenphongban]);
		}
		//delete bản ghi
		public function modelDelete($maphongban){
			//lấy biến kết nối từ class Connection
			$conn = Connection::getInstance();
			//chuẩn bị truy vấn
			$query = $conn->prepare("delete from phongban where maphongban=:var_maphongban");
			//thực thi truy vấn
			$query->execute(["var_maphongban"=>$maphongban]);
		}
	}
 ?>