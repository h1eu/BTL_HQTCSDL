$('#LH_inp_func1').change(function(){
    let MaTT=$('#LH_inp_func1').val();
    $.ajax({
        url: './function/LeHieu/func1.php',
        type: 'post',
        data: {
            MaTT:MaTT
        },
        dataType: 'json',
        success:function(response){
            $('#LH_func1').empty();
            for(data of response)
            $('#LH_func1').append("<tr>"+
            "<td scope='row'>"+data['tuoi']+"</td>"+
            +"</tr>")
        }
    })
})

$('#LH_inp_func2').change(function(){
    let MaGD=$('#LH_inp_func2').val();
    $.ajax({
        url: './function/LeHieu/func2.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#LH_func2').empty();
            for(data of response)
            $('#LH_func2').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['MaGD']+"</td>"+
            "<td>"+data['TenGD']+"</td>"+
            "<td>"+data['Hoten']+"</td>"+
            "<td>"+data['Quocgia']+"</td>"+
            "<td>"+data['Heso']+"</td>"
            +"</tr>")
        }
    })
})

$('#LH_inp_proc1').change(function(){
    let MaGD=$('#LH_inp_proc1').val();
    $.ajax({
        url: './function/LeHieu/proc1.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#LH_proc1').empty();
            for(data of response)
            $('#LH_proc1').append("<tr>"+
            "<td scope='row'>"+data['MATT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['HeSo']+"</td>"+
            "<td>"+data['TranThang']+"</td>"+
            "<td>"+data['Diem']+"</td>"+
            +"</tr>")
        }
    })
})

$('#LH_inp_proc2').change(function(){
    let MaGD=$('#LH_inp_proc2').val();
    $.ajax({
        url: './function/LeHieu/proc2.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#LH_proc2').empty();
            for(data of response)
            $('#LH_proc2').append("<tr>"+
            "<td scope='row'>"+data['Ten']+"</td>"+
            "<td>"+data['Diem']+"</td>"+
            +"</tr>")
        }
    })
})
$('.LH_view1').click(function(){
    $.ajax({
        url: './function/LeHieu/view1.php',
        type: 'post',
        data: {
            log:'ok'
        },
        dataType: 'json',
        success:function(response){
            $('#LH_view1').empty();
            for(data of response)
            $('#LH_view1').append("<tr>"+
            "<td scope='row'>"+data['MaTT']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['tuoi']+"</td>"
            +"</tr>")
        }
    })
})

$('.LH_view2').click(function(){
    $.ajax({
        url: './function/LeHieu/view2.php',
        type: 'post',
        data: {
            log:"ok"
        },
        dataType: 'json',
        success:function(response){
            $('#LH_view2').empty();
            for(data of response)
            $('#LH_view2').append("<tr>"+
            "<td scope='row'>"+data['MATT']+"</td>"+
            "<td>"+data['MaGD']+"</td>"+
            "<td>"+data['TenGD']+"</td>"+
            "<td>"+data['Ten']+"</td>"+
            "<td>"+data['Diem']+"</td>"+
            +"</tr>")
        }
    })
})