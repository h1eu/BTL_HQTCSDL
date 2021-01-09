<div class="bd_table">
        <h2 class="table-name">Anh Hùng Bảng</h2>
        <?php
                $sql="select * from BANGDIEM ORDER BY Diem DESC";
                $result=sqlsrv_query($conn,$sql);
                $rs=sqlsrv_fetch_all($result);
                ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Tuyển Thủ</th>
                    <th>Số Trận Thắng</th>
                    <th>Số Trận Thua</th>
                    <th>Số Trận Hòa</th>
                    <th>Hiệu Số</th>
                    <th>Điểm</th>
                    <?php if(isset($_SESSION['role'])):?>
                    <?php if($_SESSION['role']==2):?>
                    <th id="scboard_action">Action<th>
                    <?php endif;?>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody id="bd_body">
            </tbody>
        </table>
    </div>