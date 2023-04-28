<?php
//import model
include "Models/ModelNhanVien.php";
class ControllerNhanVien
{
    //kế thừa model
    use ModelNhanVien;
    //hàm liệt kê các bản ghi
    public function read()
    {
        //quy định số bản ghi hiển thị trên một trang
        $recordPerPage = 3;
        //tính số trang
        $numPage = ceil($this->modelTotalRecord($recordPerPage) / $recordPerPage);
        //lấy dữ liệu từ model
        $records = $this->modelRead($recordPerPage);
        //import file view
        include "Views/ViewNhanVien.php";
    }
    public function update()
    {
        $manhanvien = isset($_GET["manhanvien"]) && is_numeric($_GET["manhanvien"]) ? $_GET["manhanvien"] : 0;
        //tạo biến action để đưa vào thuộc tính action của thẻ form
        $action = "index.php?action=updateNhanVien&manhanvien=$manhanvien";
        //lấy một bản ghi
        $record = $this->modelGetRecord($manhanvien);
        //import file FormNhanVien.php
        include "Views/FormNhanVien.php";
    }
    public function updateNhanVien()
    {
        $manhanvien = isset($_GET["manhanvien"]) && is_numeric($_GET["manhanvien"]) ? $_GET["manhanvien"] : 0;
        $this->modelUpdate($manhanvien);
        //di chuyển đến một url
        header("location:index.php");
    }
    public function create()
    {
        //tạo biến action để đưa vào thuộc tính action của thẻ form
        $action = "index.php?action=createNhanVien";
        //import file FormNhanVien.php
        include "Views/FormNhanVien.php";
    }
    public function createNhanVien()
    {
        $manhanvien = isset($_GET["manhanvien"]) && is_numeric($_GET["manhanvien"]) ? $_GET["manhanvien"] : 0;
        $this->modelCreate();
        //di chuyển đến một url
        header("location:index.php");
    }
    public function delete()
    {
        $manhanvien = isset($_GET["manhanvien"]) && is_numeric($_GET["manhanvien"]) ? $_GET["manhanvien"] : 0;
        $this->modelDelete($manhanvien);
        //di chuyển đến một url
        header("location:index.php");
    }
}
