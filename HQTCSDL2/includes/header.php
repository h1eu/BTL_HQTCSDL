<?php
    require_once('./config/config.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>

<body>
<div class="header border border-dark" style="height:150px">
    <!-- <img src="./assets/images/bg.png" style="height:100%;width:100%"> -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="TrinhHieu.php">Trịnh Hiếu</a>
                    <li class="nav-item active">
                    <a class="nav-link" href="huydeptrai.php">Huy Nguyễn</a>
                </li class="nav-item active">
                <?php if(isset($_SESSION['role'])):?>
                    <span class="nav-link" style="color:yellow">Hi, <?php echo $_SESSION['username'];?></span> <button type="button" class="btn btn-primary logout">Logout</button>
                <?php else:?>
                <li class="nav-item active">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup1">
                      Sign Up
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="signup1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Sign up an Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                    <!-- Ten,
                                    NgaySinh,
                                    HeSo,
                                    QuocGia,
                                    username,*
                                    pass,*
                                    email -->
                                      <label>Username</label>
                                      <input type="text" class="form-control" id="su_usname" aria-describedby="helpId" placeholder="username...">
                                      <label>Password</label>
                                      <input type="password" class="form-control" id="su_pass" aria-describedby="helpId" placeholder="password...">
                                      <label>Confirm Password</label>
                                      <input type="password" class="form-control" id="su_cfpass" aria-describedby="helpId" placeholder="confirm password...">
                                      <label>Email</label>
                                      <input type="email" class="form-control" id="su_email" aria-describedby="helpId" placeholder="...">
                                      <label>Ten</label>
                                      <input type="text" class="form-control" id="su_name" aria-describedby="helpId" placeholder="...">
                                      <label>NgaySinh</label>
                                      <input type="text" class="form-control" id="su_birthday" aria-describedby="helpId" placeholder="...">
                                      <label>HeSo</label>
                                      <input type="text" class="form-control" id="su_elo" aria-describedby="helpId" placeholder="...">
                                      <label>QuocGia</label>
                                      <input type="text" class="form-control" id="su_ctry" aria-describedby="helpId" placeholder="...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="signup" class="btn btn-primary">SignUp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item active">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                      Login
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login an Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" class="form-control" id="usname" aria-describedby="helpId" placeholder="username...">
                                      <label>Password</label>
                                      <input type="password" class="form-control" id="pass" aria-describedby="helpId" placeholder="password...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="login" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endif;?>
                
            </ul>
            <!-- <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div> -->
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
</div>