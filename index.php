<?php
//import file Connection.php
include "Application/Connection.php";
//để load MVC PhongBan thì cần import file PhongBanController.php vào đây
include "Controllers/ControllerPhongBan.php";
include "Controllers/ControllerNhanVien.php";
?>
<?php
/*
		- index.php -> thực hiện tác vụ Read trong CRUD
		- index.php?action=create -> thực hiện tác vụ create (hiển thị form create)
		- index.php?action=createNhanVien -> thực hiện tác vụ create (sau khi ấn nút submit)
		- index.php?action=update&id=so -> thực hiện tác vụ update (hiển thị form update)
		- index.php?aciton=updateNhanVien&id=so -> thực hiện tác vụ update (sau khi ấn nút submit)
 	*/
//khởi tạo object cho class ControllerPhongBan
// $obj = new ControllerPhongBan();
// $action = isset($_GET["action"]) ? $_GET["action"] : "";
// switch ($action) {
// 	case "create":
// 		$obj->create();
// 		break; //thêm mới
// 	case "createNhanVien":
// 		$obj->createNhanVien();
// 		break; //thêm mới sau khi submit
// 	case "update":
// 		$obj->update();
// 		break; //sửa bản ghi
// 	case "updateNhanVien":
// 		$obj->updateNhanVien();
// 		break; //sửa bản ghi sau submit
// 	case "delete":
// 		$obj->delete();
// 		break; //xóa bản ghi
// 	default:
// 		$obj->read();
// 		break; //hiển thị danh sách bản ghi
// }

$obj = new ControllerNhanVien();
$action = isset($_GET["action"]) ? $_GET["action"] : "";
switch ($action) {
	case "create":
		$obj->create();
		break; //thêm mới
	case "createNhanVien":
		$obj->createNhanVien();
		break; //thêm mới sau khi submit
	case "update":
		$obj->update();
		break; //sửa bản ghi
	case "updateNhanVien":
		$obj->updateNhanVien();
		break; //sửa bản ghi sau submit
	case "delete":
		$obj->delete();
		break; //xóa bản ghi
	default:
		$obj->read();
		break; //hiển thị danh sách bản ghi
}
?>