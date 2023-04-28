<?php 
	class Connection{
		public static function getInstance(){
			$hostname = "localhost";
			$user = "root";
			$password = "";
			$dbname = "php64_congty";
			//kết nối csdl, trả thông tin về biến kết nối
			$conn = new PDO("mysql:host=$hostname;dbname=$dbname",$user,$password);
			//cấu hình kiểu duyệt bản ghi
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			//lấy dữ liệu theo kiểu unicode
			$conn->exec("set names utf8");
			//trả kết quả về biến kết nối
			return $conn;
		}
	}
 ?>