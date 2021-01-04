<?php include_once('./includes/header.php');
?>

<div class="container border border-dark mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item league">
            <a href="#" class="nav-link active">Giải đấu</a>
        </li>
        <li class="nav-item match">
            <a href="#" class="nav-link">Trận Đấu</a>
        </li>
        <li class="nav-item player">
            <a href="#" class="nav-link">Tuyển Thủ</a>
        </li>
        <li class="nav-item scboard">
            <a href="#" class="nav-link">Bảng Điểm</a>
        </li>
    </ul>
    <!-- Thêm đk rồi mới require sau chăng? -->
    <?php require_once('./data/tuyenthu.php')?>
    <?php require_once('./data/trandau.php')?>
    <?php require_once('./data/giaidau.php')?>
    <?php require_once('./data/bangdiem.php')?>
    <!-- <canvas id="game" width="500" height="500"></canvas> -->
</div>



<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include_once('./includes/footer.php');