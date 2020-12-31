<div class="td_table d-none">
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
            <tbody>
                <?php foreach($rs as $match):?>
                <tr>
                    <td><?php echo $match['MaGD'];?></td>
                    <td><?php echo $match['MaTD'];?></td>
                    <td><?php echo $match['MaTT1'];?></td>
                    <td><?php echo $match['MaTT2'];?></td>
                    <td><?php echo $Date = $match['TGBD']->format('H:m d/m/Y');?></td>
                    <td><?php echo $match['Kq'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>