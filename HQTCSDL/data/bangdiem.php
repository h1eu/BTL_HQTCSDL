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
                </tr>
            </thead>
            <tbody>
                <?php foreach($rs as $tt):?>
                <tr>
                    <td><?php echo $tt['MATT'];?></td>
                    <td><?php echo $tt['TranThang'];?></td>
                    <td><?php echo $tt['TranThua'];?></td>
                    <td><?php echo $tt['TranHoa'];?></td>
                    <td><?php echo $tt['HieuSo'];?></td>
                    <td><?php echo $tt['Diem'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>