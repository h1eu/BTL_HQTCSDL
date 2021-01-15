$('#inp_proc1').change(function(){
    let MaGD=$('#inp_proc1').val();
    $.ajax({
        url: './function/QuocHuy/proc1.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#proc1').empty();
            for(data of response)
            $('#proc1').append("<tr>"+
            "<td scope='row'>"+data['MaGD']+"</td>"+
            "<td>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['QuocGia']+"</td>"
            +"</tr>")
        }
    })
})

$('#inp_proc2').change(function(){
    let MaGD=$('#inp_proc2').val();
    $.ajax({
        url: './function/QuocHuy/proc2.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#proc2').empty();
            for(data of response)
            $('#proc2').append("<tr>"+
            "<td scope='row'>"+data['MATT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['QuocGia']+"</td>"
            +"</tr>")
        }
    })
})

$('#inp_func1').change(function(){
    let MaGD=$('#inp_func1').val();
    $.ajax({
        url: './function/QuocHuy/func1.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#func1').empty();
            for(data of response)
            $('#func1').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['QuocGia']+"</td>"+
            "<td>"+data['NgaySinh'].date.slice(0,10)+"</td>"
            +"</tr>")
        }
    })
})


$('#inp_func2').change(function(){
    let MaGD=$('#inp_func2').val();
    $.ajax({
        url: './function/QuocHuy/func2.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#func2').empty();
            for(data of response)
            $('#func2').append("<tr>"+
            "<td scope='row'>"+data['']+"</td>"+
            +"</tr>")
        }
    })
})

$('.QH_view1').click(function(){
    $.ajax({
        url: './function/QuocHuy/view1.php',
        type: 'post',
        data: {
            log:'ok'
        },
        dataType: 'json',
        success:function(response){
            $('#QH_view1').empty();
            for(data of response)
            $('#QH_view1').append("<tr>"+
            "<td scope='row'>"+data['MaGD']+"</td>"+
            "<td>"+data['TenTT']+"</td>"+
            "<td>"+data['QuocGia']+"</td>"+
            "<td>"+data['TranThang']+"</td>"+
            "<td>"+data['TranHoa']+"</td>"+
            "<td>"+data['TranThua']+"</td>"+
            "<td>"+data['Hieuso']+"</td>"+
            "<td>"+data['Diem']+"</td>"
            +"</tr>")
        }
    })
})

$('.QH_view2').click(function(){
    $.ajax({
        url: './function/QuocHuy/view2.php',
        type: 'post',
        data: {
            log:"ok"
        },
        dataType: 'json',
        success:function(response){
            $('#QH_view2').empty();
            for(data of response)
            $('#QH_view2').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['QuocGia']+"</td>"+
            "<td>"+data['NgaySinh'].date.slice(0,10)+"</td>"+
            "<td>"+data['Diem']+"</td>"+
            +"</tr>")
        }
    })
})