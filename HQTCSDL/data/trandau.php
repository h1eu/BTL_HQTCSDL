<div class="td_table">
        <h2 class="table-name">Thông tin Trận Đấu</h2>
        <?php
                $sql="Select * from TRANDAU";
                $result=sqlsrv_query($conn,$sql);
                $rs=sqlsrv_fetch_all($result);
                ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Trận Đấu</th>
                    <th>Mã Giải Đấu</th>
                    <th>Mã Tuyển Thủ Tiên</th>
                    <th>Mã Tuyển Thủ Hậu</th>
                    <th>Thời Gian Bắt Đầu</th>
                    <th>Kết Quả</th> 
                </tr>
            </thead>
            <tbody id="td_body">

            </tbody>
        </table>
    </div>