<?php include_once('./includes/header.php');
?>

<div class="container">
    <br>
    <br>
    <h5> View hiển  thị mã tuyển thủ,tên tuyển thủ,quốc gia ,ngày sinh ,Diem trong  giải đấu </h5>
    <button type="button" class="btn btn-primary view11">Show</button>
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
        <tbody id="view11">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> View hiển thị mã giải đấu , tên tuyển thủ  , quốc gia ,số trận thắng , số trận hòa , số trận thua , hiệu số , điểm số của các tuyển thủ tham gia vào giải đấu</h5>
    <button type="button" class="btn btn-primary view22">Show</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Giải Đấu</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
                <th>Số Trận Thắng</th>
                <th>Số Trận Hòa</th>
                <th>Số Trận Thua</th>
                <th>Hiệu Số</th>
                <th>Tổng Điểm</th>
            </tr>
        </thead>
        <tbody id="view22">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5> Hàm trả về danh sách các tuyển thủ có hiệu số >=2 của 1 giải đấu bất kì</h5>
    <div class="form-group">
      <label for="">Nhập mã trận đấu</label>
      <input type="text" class="form-control" id="ham1" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ </th>
                <th>Tên Tuyển Thủ </th>
                <th>Quốc gia</th>
                <th>Ngày Sinh</th>
            </tr>
        </thead>
        <tbody id="ham1">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Hàm trả về tuổi trung bình của các tuyển thủ trong một giải đấu</h5>
    <div class="form-group">
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="inp_tilewin2" aria-describedby="helpId" placeholder="">                                                                                                              
    </div>
    <table class="table">
        <thead>
            <tr>
            <tr>
                <th>Tuổi trung bình của các tuyển thủ trong giải đấu </th>
                
            </tr>
            </tr>
        </thead>
        <tbody id="ham1">
        </tbody>
    </table>
    <br>
    <br>
    </hr>
    <h5>Thủ tục đưa ra danh sách các tuyển thủ đã có 3 trận thắng trong một giải đấu bất kì</h5>
    <div class="form-group">            
      <label for="">Nhập mã giải đấu</label>
      <input type="text" class="form-control" id="sp1" aria-describedby="helpId" placeholder="">    
      <button type="button" class="btn btn-primary sp1">Check</button>                                                                                                      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Giải Đấu</th>
                <th>Mã Tuyển Thủ</th>
                <th>Tên tuyển Thủ</th>
                <th>Quốc Gia</th>
            </tr>
        </thead>
        <tbody id="sp11">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    <h5> Thủ tục hiển thị ra danh sách tuyển thủ của một giải đấu nào đó</h5>
    <label for="">Nhập mã giải đấu</label>
    <input type="text" class="form-control" id="inp_thongke2" aria-describedby="helpId" placeholder="">    
    <button type="button" class="btn btn-primary sp2">Check</button>
    <table class="table">
        <thead>
            <tr>
                <th>Mã Tuyển Thủ</th>
                <th>Tên Tuyển Thủ</th>
                <th>Quốc Gia</th>
            </tr>
        </thead>
        <tbody id="sp2">
        </tbody>
    </table>

    <br>
    <br>
    </hr>
    
</div>
<?php include_once('./includes/footer.php');