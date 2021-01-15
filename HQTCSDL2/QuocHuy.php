<?php include_once('./includes/header.php');
?>

<div class="container">
    <br>
    <br>
    <h5>Thủ tục đưa ra danh sách các tuyển thủ đã có 3 trận thắng trong một giải đấu bất kì</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="inp_proc1" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Giải Đấu</th>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
            </tr>
        </thead>
        <tbody id="proc1">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Thủ tục hiển thị ra danh sách tuyển thủ của một giải đấu nào đó</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="inp_proc2" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
            </tr>
        </thead>
        <tbody id="proc2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>hàm trả về danh sách các tuyển thủ có hiệu số >=2 của 1 giải đấu bất kì</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="inp_func1" aria-describedby="helpId" placeholder="">                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
                <th>Ngày Sinh</th>
            </tr>
        </thead>
        <tbody id="func1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5>hàm trả về tuổi trung bình của các tuyển thủ trong một giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="inp_func2" aria-describedby="helpId" placeholder="">                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Tuổi Trung Bình</th>
            </tr>
        </thead>
        <tbody id="func2">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> view hiển thị mã giải đấu , tên tuyển thủ  , quốc gia số trận thắng , số trận hòa , số trận thua , hiệu số , điểm số của các tuyển thủ tham gia vào giải đấu</h5>
    <button type="button" class="btn btn-primary QH_view1">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Giải Đấu</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
                <th>Trận Thắng</th>
                <th>Trận Hòa</th>
                <th>Trận Thua</th>
                <th>Hiệu Số</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody id="QH_view1">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> view hiển  thị mã tuyển thủ,tên tuyển thủ,quốc gia ,ngày dinh ,Diem trong  giải đấu</h5>
    <button type="button" class="btn btn-primary QH_view2">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
                <th>Ngày Sinh</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody id="QH_view2">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
</div>
<?php include_once('./includes/footer.php');