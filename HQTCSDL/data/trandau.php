<div class="td_table">
        <h2 class="table-name">Thông tin Trận Đấu</h2>
        <?php if(isset($_SESSION['role'])&&$_SESSION['role']==2):?>
        <button type="button" id="create_match1" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create_match2">
            Thêm Trận Đấu
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="create_match2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm một Trận Đấu</h5>
                        
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <p><i>Số trận đấu được thêm có thể vượt quá tổng số trận đấu (do cần các trận đấu phụ vì kết quả hòa) nhưng không vượt quá 10 trận so với tổng số trận</i></p>
                        <div class="form-group">
                            <label for="">Tuyển Thủ Tiên</label>
                            <select class="form-control" id="match_tt1">
                              <option></option>
                              
                            </select>

                            <label>Tuyển Thủ Hậu</label>
                                <select class="form-control" id="match_tt2">
                                <option></option>
                                
                            </select>
                            <label>Thời Gian Bắt đầu</label>
                            <input type="text" class="form-control" id="match_TS" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="create_match" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Giải Đấu</th>
                    <th>Mã Trận Đấu</th>
                    <th>Mã Tuyển Thủ Tiên</th>
                    <th>Mã Tuyển Thủ Hậu</th>
                    <th>Thời Gian Bắt Đầu</th>
                    <th>Kết Quả</th>
                    <?php if(isset($_SESSION['role'])):?>
                        <?php if($_SESSION['role']==2):?>
                        <th colspan="2" id="match_action">Action</th>
                        <?php endif;?>
                    <?php endif;?>

                </tr>
            </thead>
            <tbody id="td_body">
            </tbody>
        </table>
    </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg open_ed_td" data-toggle="modal" data-target="#edit_td" hidden>
</button>

<!-- Modal -->
<div class="modal fade" id="edit_td" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cập nhật Trận Đấu</h5>
                        
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tuyển Thủ Tiên</label>
                            <select class="form-control" id="ed_match_tt1">
                              <option></option>
                            </select>

                            <label>Tuyển Thủ Hậu</label>
                                <select class="form-control" id="ed_match_tt2">
                                <option></option>        
                            </select>
                            <label>Thời Gian Bắt đầu</label>
                            <input type="text" class="form-control" id="ed_match_TS" aria-describedby="helpId" placeholder="">
                            <label>Kết Quả</label>
                            <input type="text" class="form-control" id="ed_match_result" aria-describedby="helpId" placeholder="">
                            <input type="text" class="form-control" id="ed_match_MaTD" aria-describedby="helpId" placeholder="" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="edit_match" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div>