CRUD
	- Create: Thêm mới bản ghi
	- Read: Hiển thị danh sách các bản ghi
	- Update: Cập nhật bản ghi
	- Delete: Xóa bản ghi
MVC
	- Model: phần gần nhất với csdl, chứa các hàm sử dụng để thao tác csdl
	- Controller: nằm giữa model và view, lấy dữ liệu từ model và truyền ra view. Ngoài ra nó còn có chức năng là xử lý điều khiển.
	- View: hiển thị dữ liệu
Xây dựng CRUD theo MVC hướng đối tượng
	- class Connection{
			hàm getInstance(){kết nối csdl, trả kết quả về biến kết nối}
		}
	- class Model{
		hàm liệt kê các bản ghi{}
		hàm lấy một bản ghi{} -> phục vụ cho chức năng update
		hàm update bản ghi{}
		hàm insert bản ghi{} -> phục vụ cho tính năng create
		hàm xóa bản ghi
	}
	- class Controller{
		điều khiển CRUD thông qua lấy biến truyền từ url
	}
	- file View
	index.php -> load MVC