$('.view11').click(function() {
    $.ajax({
        url: './function/h_view1.php',
        type: 'post',
        data: {
            check: "ok"
        },
        dataType: 'json',
        success: function(response) {
            $('#view11').empty();
            for (data of response)
                $('#view11').append("<tr>" +
                    "<td scope='row'>" + data['MaTT'] + "</td>" +
                    "<td>" + data['Ten'] + "</td>" +
                    "<td>" + data['QuocGia'] + "</td>" +
                    "<td>" + data['NgaySinh'] + "</td>" +
                    "<td>" + data['Diem'] + "</td>" +
                    "</tr>")
        }
    })
})
$('.view22').click(function() {
    $.ajax({
        url: './function/h_view2.php',
        type: 'post',
        data: {
            check: "ok"
        },
        dataType: 'json',
        success: function(response) {
            $('#view22').empty();
            for (data of response)
                $('#view22').append("<tr>" +
                    "<td scope='row'>" + data['MaGD'] + "</td>" +
                    "<td>" + data['TenTT'] + "</td>" +
                    "<td>" + data['QuocGia'] + "</td>" +
                    "<td>" + data['TranThang'] + "</td>" +
                    "<td>" + data['TranHoa'] + "</td>" +
                    "<td>" + data['TranThua'] + "</td>" +
                    "<td>" + data['Hieuso'] + "</td>" +
                    "<td>" + data['Diem'] + "</td>" +
                    "</tr>")
        }
    })
})
$('#sp1').change(function() {
    let MaGD = $('#sp1').val();
    $.ajax({
        url: './function/h_sp1.php',
        type: 'post',
        data: {
            MaGD: MaGD
        },
        dataType: 'json',
        success: function(response) {
            if (response['status'] == "fail") alert("Không tìm thấy")
            $('#sp11').empty();
            $('#sp11').append("<tr>" +
                "<td scope='row'>" + response[0]['MaGD'] + "</td>" +
                "<td>" + response[0]['MaTT'] + "</td>" +
                "<td>" + response[0]['Ten'] + "</td>" +
                "<td>" + response[0]['QuocGia'] + "</td>" +
                "</tr>")
        }
    })
})