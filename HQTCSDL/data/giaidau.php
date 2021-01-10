<div class="gd_table">
        <h2 class="table-name">Giải Đấu</h2>
        <!-- Button trigger modal -->
        <?php if(isset($_SESSION['role'])&&$_SESSION['role']==2):?>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="create_league1" data-target="#create_league2">
            Thêm Giải Đấu
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="create_league2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin Giải Đấu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label>Tên Giải Đấu</label>
                          <input type="text" class="form-control" id="TenGD" aria-describedby="helpId" placeholder="">
                          <label>Địa Điểm</label>
                          <input type="text" class="form-control" id="DiaDiem" aria-describedby="helpId" placeholder="">
                          <label>Thời Gian Bắt Đầu</label>
                          <input type="text" class="form-control" id="TimeStart" aria-describedby="helpId" placeholder="yyyy/mm/dd">
                          <label>Thời Gian Kết Thúc</label>
                          <input type="text" class="form-control" id="TimeEnd" aria-describedby="helpId" placeholder="yyyy/mm/dd">
                          <label>Tổng số Trận</label>
                          <input type="text" class="form-control" id="TongTran" aria-describedby="helpId" placeholder="">
                          <label>Tổng số tuyển thủ</label>
                          <input type="text" class="form-control" id="TongTT" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shut" data-dismiss="modal">Close</button>
                        <button type="button" id="create_league" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
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
                    <th>Tổng số trận</th>
                    <th>Tổng kỳ thủ</th>
                    <?php if(isset($_SESSION['role'])):?>
                        <?php if($_SESSION['role']==2):?>
                        <th colspan="3">Action</th>
                        <?php endif;?>
                        <?php if($_SESSION['role']==1):?>
                        <th colspan="2">Action</th>
                        <?php endif;?>
                    <?php else:?>
                        <th colspan="1">Action</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rs as $League):?>
                <tr>
                    <td><?php echo $League['TenGD'];?></td>
                    <td><?php echo $League['DiaDiem'];?></td>
                    <td><?php echo $Date = $League['TGBatDau']->format('H:m d/m/Y');?></td>
                    <td><?php echo $Date = $League['TGKetThuc']->format('H:m d/m/Y');?></td>
                    <td><?php echo $League['TongTran'];?></td>
                    <td><?php echo $League['TongTT'];?></td>
                    <td><input type="text" class="id_gd" value="<?php echo $League['MaGD'];?>" hidden><button type="button" class="btn btn-primary show" value="Show">Show>></button></td>
                    <?php if(isset($_SESSION['role'])):?>
                    <?php if($_SESSION['role']==2):?>
                    <td><button type="button"  class="btn btn-primary league_edit" data-toggle="modal" data-target="#edit_league1">Edit</button></td>
                    <td><button type="button" class="btn btn-primary league_del">Delete</button></td>
                    <?php endif;?>
                    <?php if($_SESSION['role']==1):?>
                    <td><button type="button" class="btn btn-primary league_enter">Enter</button></td>
                    <?php endif;?>
                    <?php endif;?>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>



    <div class="modal fade" id="edit_league1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin Giải Đấu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label>Tên Giải Đấu</label>
                          <input type="text" class="form-control" id="TenGD2" aria-describedby="helpId" placeholder="">
                          <label>Địa Điểm</label>
                          <input type="text" class="form-control" id="DiaDiem2" aria-describedby="helpId" placeholder="">
                          <label>Thời Gian Bắt Đầu</label>
                          <input type="text" class="form-control" id="TimeStart2" aria-describedby="helpId" placeholder="yyyy/mm/dd">
                          <label>Thời Gian Kết Thúc</label>
                          <input type="text" class="form-control" id="TimeEnd2" aria-describedby="helpId" placeholder="yyyy/mm/dd">
                          <label>Tổng số Trận</label>
                          <input type="text" class="form-control" id="TongTran2" aria-describedby="helpId" placeholder="">
                          <label>Tổng số tuyển thủ</label>
                          <input type="text" class="form-control" id="TongTT2" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="edit_league" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </div>
        </div>