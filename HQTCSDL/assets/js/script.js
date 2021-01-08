
$('#login').click(function(){
    let usname=$('#usname').val();
    let pass=$('#pass').val();
    $.ajax({
        url: 'login.php',
        type: 'post',
        data: {
            username:usname,
            password:pass
        },
        dataType: 'json',
        success:function(response){
            if(response['log']===true) console.log("dang nhap thanh cong");
            else console.log("dang nhap that bai");
        }
    });
})


$('.show').click(function(){
    if($(this).val()=="Show"){
        $('.td_table').show();
        $('.bd_table').show();
        $('.show').val('Show');
        $(this).val('Close');
        let maGD=$(this).parent().contents()[0].value;
        $.ajax({
            url: 'get_bd.php',
            type: 'post',
            data: {
                MaGD:maGD
            },
            dataType: 'json',
            success:function(response){
                $("#bd_body").empty();
                    for(data of response)
                    $("#bd_body").append("<tr>"+
                    "<td>"+data['MATT']+"</td>"+
                    "<td>"+data['TranThang']+"</td>"+
                    "<td>"+data['TranThua']+"</td>"+
                    "<td>"+data['TranHoa']+"</td>"+
                    "<td>"+data['HieuSo']+"</td>"+
                    "<td>"+data['Diem']+"</td>"+
                    +"</tr>");
                    
            }
        })
    
        $.ajax({
            url: 'get_td.php',
            type: 'post',
            data: {
                MaGD:maGD
            },
            dataType: 'json',
            success:function(response){
                $("#td_body").empty();
                    for(data of response)
                    $("#td_body").append("<tr>"+
                    "<td>"+data['MaGD']+"</td>"+
                    "<td>"+data['MaTD']+"</td>"+
                    "<td>"+data['MaTT1']+"</td>"+
                    "<td>"+data['MaTT2']+"</td>"+
                    "<td>"+data['TGBD'].date.slice(0,11)+"</td>"+
                    "<td>"+data['Kq']+"</td>"+
                    +"</tr>");
            }
        })
    }
    else{
        $('.td_table').hide();
        $('.bd_table').hide();
        $(this).val("Show");
    }
    
});

$('#create_league').click(function(){
    let TenGD=$('#TenGD').val();
    let DiaDiem=$('#DiaDiem').val();
    let TimeStart=$('#TimeStart').val();
    let TimeEnd=$('#TimeEnd').val();
    let TongTran=$('#TongTran').val();
    let TongTT=$('#TongTT').val();
    $.ajax({
        url: 'create_gd.php',
        type: 'post',
        data: {
            TenGD:TenGD,
            DiaDiem:DiaDiem,
            TimeStart:TimeStart,
            TimeEnd:TimeEnd,
            TongTran:TongTran,
            TongTT:TongTT
        },
        dataType: 'json',
        success:function(response){
            if(response=="success") alert("Thêm thành công");
            else alert("Thêm thất bại");
        }
    })
})