<?php include_once('./includes/header.php');
?>

<div class="container">
    <br>
    <br>
    <h5>Hàm tính tuổi của một tuyển thủ bất kì với tham số truyền vào là mã tuyển thủ </h5>
    <div class="form-group">
      <label for="">Nhập mã tuyển thủ</label>
      <input type="text" class="form-control" id="LH_inp_func1" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Tuổi</th>
            </tr>
        </thead>
        <tbody id="LH_func1">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Hàm đưa ra 1 bảng chi tiết các tuyển thủ bất bại tại 1 giải đấu với tham số truyền vào là mã giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="LH_inp_func2" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Mã Giải Đấu</th>
                <th>Tên Giải Đấu</th>
                <th>Họ Tên</th>
                <th>Quốc Gia</th>
                <th>Hệ Số</th>
            </tr>
        </thead>
        <tbody id="LH_func2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Thủ tục hiển thị ra danh sách các tuyển thủ thắng trên 10 trận theo giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="LH_inp_proc1" aria-describedby="helpId" placeholder="">                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Hệ số</th>
                <th>TranThang</th>
                <th>Diem</th>
            </tr>
        </thead>
        <tbody id="LH_proc1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5>Thủ tục đưa ra tên 3 tuyển thủ có số điểm cao nhất trong một giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="LH_inp_proc2" aria-describedby="helpId" placeholder="">                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Ten</th>
                <th>Diem</th>
            </tr>
        </thead>
        <tbody id="LH_proc2">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5>View để thống kê tên và tuổi của các tuyển thủ</h5>
    <button type="button" class="btn btn-primary LH_view1">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Tuổi</th>
            </tr>
        </thead>
        <tbody id="LH_view1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5>View thống kê các giải đấu mà các tuyển thủ tham dự cùng với điểm của họ</h5>
    <button type="button" class="btn btn-primary LH_view2">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Mã Giải Đấu</th>
                <th>Tên Giải Đấu</th>
                <th>Tên Tuyển Thủ</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody id="LH_view2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
</div>
<?php include_once('./includes/footer.php');