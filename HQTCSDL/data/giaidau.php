<div class="gd_table">
        <h2 class="table-name">Giải Đấu Đấu</h2>
        <?php
                $sql="Select * from GIAIDAU";
                $result=sqlsrv_query($conn,$sql);
                $rs=sqlsrv_fetch_all($result);
                ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên Giải đấu</th>
                    <th>Địa Điểm</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rs as $League):?>
                <tr>
                    <td><?php echo $League['TenGD'];?></td>
                    <td><?php echo $League['DiaDiem'];?></td>
                    <td><?php echo $Date = $League['TGBatDau']->format('H:m d/m/Y');?></td>
                    <td><?php echo $Date = $League['TGKetThuc']->format('H:m d/m/Y');?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>