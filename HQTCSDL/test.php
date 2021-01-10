<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toidicode.com  demo location</title>
</head>
<body>
    <p class="content">click vào button để xem kết quả</p>
    <button onclick="reload()" >Load lại trang</button>
    <script>
        function reload(){
          	document.getElementsByClassName("content")[0].textContent="helo";
            document.getElementsByClassName("content")[0].reload();
        }
    </script>
</body>
</html>
            