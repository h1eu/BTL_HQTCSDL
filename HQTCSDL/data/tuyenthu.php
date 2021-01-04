<div class="tt_table">
        <h2 class="table-name">Thông tin Tuyển Thủ</h2>
        <?php
                $sql="Select * from TUYENTHU";
                $result=sqlsrv_query($conn,$sql);
                $rs=sqlsrv_fetch_all($result);
                ?>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ Tên</th>
                    <th>Elo</th>
                    <th>Quốc Gia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rs as $key=>$tt):?>
                <tr>
                    <td scope="row"><?php echo $key+1;?></td>
                    <td><?php echo $tt['Ten'];?></td>
                    <td><?php echo $tt['HeSo'];?></td>
                    <td><?php echo $tt['QuocGia'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>