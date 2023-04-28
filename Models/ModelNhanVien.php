<?php
trait ModelNhanVien
{
    //Lấy tất cả các bản ghi trên một trang nào đó
    public function modelRead($recordPerPage)
    {
        //tính số trang = Tổng số bản ghi / số bản ghi trên một trang
        /*
				- Hàm ceil sẽ lấy trần. VD: ceil(3.6) = 4
				- Hàm floor sẽ lấy sàn. VD: floor(3.6) = 3
			*/
        //lấy biến p truyền từ url (chỉ trang hiện tại)
        $p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] - 1 : 0;
        //tính số bản ghi hiển thị trên một trang
        $from = $p * $recordPerPage;
        //lấy biến kết nối csdl
        $conn = Connection::getInstance();
        //thực hiện truy vấn
        $query = $conn->query("select * from nhanvien order by manhanvien desc limit $from,$recordPerPage");
        //trả về tất cả các bản ghi
        return $query->fetchAll();
    }
    //Đếm tổng số bản ghi
    public function modelTotalRecord($recordPerPage)
    {
        //lấy biến kết nối từ class Connection
        $conn = Connection::getInstance();
        //thực hiện truy vấn
        $query = $conn->query("select * from nhanvien");
        //trả về số lượng bản ghi
        return $query->rowCount();
    }
    //lấy một bản ghi
    public function modelGetRecord($manhanvien)
    {
        //lấy biến kết nối từ class Connection
        $conn = Connection::getInstance();
        //chuẩn bị truy vấn
        $query = $conn->prepare("select * from nhanvien where manhanvien=:var_manhanvien");
        //thực thi truy vấn
        $query->execute(["var_manhanvien" => $manhanvien]);
        //trả về một bản ghi
        return $query->fetch();
    }
    //update bản ghi
    public function modelUpdate($manhanvien)
    {
        $hovaten = $_POST['hovaten'];
        $quequan = $_POST['quequan'];
        $luong = $_POST['luong'];
        //lấy biến kết nối từ class Connection
        $conn = Connection::getInstance();
        //chuẩn bị truy vấn
        $query = $conn->prepare("update nhanvien set hovaten=:var_hovaten,quequan=:var_quequan,luong=:luong where manhanvien=:var_manhanvien");
        //thực thi truy vấn
        $query->execute(["var_manhanvien" => $manhanvien, "var_hovaten" => $hovaten, "var_quequan" => $quequan, "luong" => $luong]);
    }
    //create bản ghi
    public function modelCreate()
    {
        $hovaten = $_POST['hovaten'];
        $quequan = $_POST['quequan'];
        $luong = $_POST['luong'];
        //lấy biến kết nối từ class Connection
        $conn = Connection::getInstance();
        //chuẩn bị truy vấn
        $query = $conn->prepare("insert into nhanvien set hovaten=:var_hovaten,quequan=:quequan,luong=:luong");
        //thực thi truy vấn
        $query->execute(["var_hovaten" => $hovaten, "quequan" => $quequan, "luong" => $luong]);
    }
    //delete bản ghi
    public function modelDelete($manhanvien)
    {
        //lấy biến kết nối từ class Connection
        $conn = Connection::getInstance();
        //chuẩn bị truy vấn
        $query = $conn->prepare("delete from nhanvien where manhanvien=:var_manhanvien");
        //thực thi truy vấn
        $query->execute(["var_manhanvien" => $manhanvien]);
    }
}
