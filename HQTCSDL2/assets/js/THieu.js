$('#inp_tilewin1').change(function(){
    let MaTD=$('#inp_tilewin1').val();
    $.ajax({
        url: './function/td_tilewin1.php',
        type: 'post',
        data: {
            MaTD:MaTD
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=="fail") alert("Không tìm thấy")
            $('#tilewin1').empty();
            $('#tilewin1').append("<tr>"+
            "<td scope='row'>"+response[0]['MaTD']+"</td>"+
            "<td>"+response[0]['MaTT1']+"</td>"+
            "<td>"+response[0]['TenTT1']+"</td>"+
            "<td>"+response[0]['MaTT2']+"</td>"+
            "<td>"+response[0]['TenTT2']+"</td>"+
            "<td>"+response[0]['TGBD'].date.slice(0,11)+"</td>"+
            "<td>"+response[0]['Kq']+"</td>"+
            "<td>"+response[0]['tilewin'].toFixed(2)+"</td>"+
            "<td>"+(1-response[0]['tilewin']).toFixed(2)+"</td>"
            +"</tr>")
        }
    })
})

$('#inp_tilewin2').change(function(){
    let MaTT=$('#inp_tilewin2').val();
    $.ajax({
        url: './function/td_tilewin2.php',
        type: 'post',
        data: {
            MaTT:MaTT
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=="fail") alert("Không tìm thấy")
            $('#tilewin2').empty();
            $('#tilewin2').append("<tr>"+
            "<td scope='row'>"+response[0]['MaTT']+"</td>"+
            "<td>"+response[0]['Ten']+"</td>"+
            "<td>"+response[0]['HeSo']+"</td>"+
            "<td>"+response[0]['QuocGia']+"</td>"+
            "<td>"+response[1]['tilewin'].toFixed(2)+"</td>"
            +"</tr>")
        }
    })
})

$('.thongke').click(function(){
    let MaTT1=$('#inp1_thongke1').val()
    let MaTT2=$('#inp2_thongke1').val()
    $.ajax({
        url: './function/tt_thongke1.php',
        type: 'post',
        data: {
            MaTT1:MaTT1,
            MaTT2:MaTT2
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=="fail") alert("Không tìm thấy")
            $('#thongke1').empty();
            for(data of response)
            $('#thongke1').append("<tr>"+
            "<td scope='row'>"+data['MaGD']+"</td>"+
            "<td>"+data['MaTD']+"</td>"+
            "<td>"+data['MaTT1']+"</td>"+
            "<td>"+data['MaTT2']+"</td>"+
            "<td>"+data['TGBD'].date.slice(0,10)+"</td>"+
            "<td>"+data['Kq']+"</td>"
            +"</tr>")
        }
    })
})


$('.thongke2').click(function(){
    let tuoi=$('#inp_thongke2').val();
    $.ajax({
        url: './function/tt_thongke2.php',
        type: 'post',
        data: {
            age:tuoi
        },
        dataType: 'json',
        success:function(response){
            $('#thongke2').empty();
            for(data of response)
            $('#thongke2').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['Thang']+"</td>"
            +"</tr>")
        }
    })
})

$('.view1').click(function(){
    $.ajax({
        url: './function/bd_view1.php',
        type: 'post',
        data: {
            check:"ok"
        },
        dataType: 'json',
        success:function(response){
            $('#view1').empty();
            for(data of response)
            $('#view1').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['tuoi']+"</td>"+
            "<td>"+data['HeSo']+"</td>"+
            "<td>"+data['Win']+"</td>"
            +"</tr>")
        }
    })
})

$('.view2').click(function(){
    $.ajax({
        url: './function/bd_view2.php',
        type: 'post',
        data: {
            check:"ok"
        },
        dataType: 'json',
        success:function(response){
            $('#view2').empty();
            for(data of response)
            $('#view2').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['Thua']+"</td>"
            +"</tr>")
        }
    })
})