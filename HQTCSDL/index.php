<?php include_once('./includes/header.php');
?>

<div class="container mt-3">
<span class="message bg-success text-center border rounded-lg border-dark" style="margin-top:20px;color:white;font-size:1.2rem;padding:5px"></span>
</div>
<div class="container border border-dark mt-5">
    
    <ul class="nav nav-tabs">
        <li class="nav-item league">
            <a href="#" class="nav-link active">Giải đấu</a>
        </li>
    </ul>
    <!-- Thêm đk rồi mới require sau chăng? -->
    <?php require_once('./data/giaidau.php')?>
    <?php require_once('./data/bangdiem.php')?>
    <?php require_once('./data/trandau.php')?>
</div>

<!-- tach bang nay ra trang moi lam view tong cua minh -->
<?php //require_once('./data/tuyenthu.php')?>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include_once('./includes/footer.php');

// 