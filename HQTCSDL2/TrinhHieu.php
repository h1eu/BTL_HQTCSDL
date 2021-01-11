<?php include_once('./includes/header.php');
?>

<div class="container">
    <br>
    <br>
    <h5>Hàm đưa ra thông tin chi tiết 1 trận đấu và tỉ lệ thắng</h5>
    <div class="form-group">
      <label for="">Nhập mã trận đấu</label>
      <input type="text" class="form-control" id="inp_tilewin1" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Trận Đấu</th>
                <th>Mã Tuyển Thủ Tiên</th>
                <th>Tên Tuyển Thủ Tiên</th>
                <th>Mã Tuyển Hậu</th>
                <th>Tên Tuyển Thủ Hậu</th>
                <th>Thời gian bắt đầu</th>
                <th>Kết quả</th>
                <th>Tỉ lệ thắng tt1</th>
                <th>Tỉ lệ thắng tt2</th>
            </tr>
        </thead>
        <tbody id="tilewin1">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Tính tỉ lệ thắng của 1 tuyển thủ trong toàn bộ các giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã tuyển thủ</label>
      <input type="text" class="form-control" id="inp_tilewin2" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Hệ Số</th>
                <th>Quốc Gia</th>
                <th>Tỉ lệ thắng</th>
            </tr>
        </thead>
        <tbody id="tilewin2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Thủ tục thống kê 10 trận gần nhất của 2 tuyển thủ</h5>
    <div class="form-group">
      <label for="">Nhập mã tuyển thủ 1</label>
      <input type="text" class="form-control" id="inp1_thongke1" aria-describedby="helpId" placeholder="">            
      <label for="">Nhập mã tuyển thủ 2</label>
      <input type="text" class="form-control" id="inp2_thongke1" aria-describedby="helpId" placeholder="">    
      <button type="button" class="btn btn-primary thongke">Check</button>                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Giải Đấu</th>
                <th>Mã Trận Đấu</th>
                <th>Mã TT1</th>
                <th>Mã TT2</th>
                <th>Thời gian bắt đầu</th>
                <th>Kết Quả</th>
            </tr>
        </thead>
        <tbody id="thongke1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5>Thủ tục đưa ra danh sách 10 tuyển thủ dưới số tuổi nhập vào có nhiều trận thắng nhất</h5>
    <label for="">Nhập số tuổi</label>
    <input type="text" class="form-control" id="inp_thongke2" aria-describedby="helpId" placeholder="">    
    <button type="button" class="btn btn-primary thongke2">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Số Trận thắng</th>
            </tr>
        </thead>
        <tbody id="thongke2">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> BXH 20 tuyển thủ thắng nhiều nhất và số trận thắng</h5>
    <button type="button" class="btn btn-primary view1">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Tuổi</th>
                <th>Hệ Số</th>
                <th>Số Trận thắng</th>
            </tr>
        </thead>
        <tbody id="view1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> BXH 10 tuyển thủ thua nhiều nhất và số trận thua</h5>
    <button type="button" class="btn btn-primary view2">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Số Trận thua</th>
            </tr>
        </thead>
        <tbody id="view2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
</div>
<?php include_once('./includes/footer.php');