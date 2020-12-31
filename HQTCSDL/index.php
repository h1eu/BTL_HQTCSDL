<?php include_once('./includes/header.php');
?>


<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item player-info">
            <a href="#" class="nav-link active">Active</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Link</a>
        </li>
        <li class="nav-item disabled">
            <a href="#" class="nav-link">Disabled</a>
        </li>
    </ul>
    <?php require_once('./data/tuyenthu.php')?>
    <?php require_once('./data/trandau.php')?>
    <?php require_once('./data/giaidau.php')?>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include_once('./includes/footer.php');