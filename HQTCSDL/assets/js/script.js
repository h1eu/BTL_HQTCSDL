var maGD=0;
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
            if(response['status']=='success'){
                $('.message').text("Đăng nhập thành công!Bạn sẽ được tự động đăng nhập sau 2s");
                $('.close').click();
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    location.reload();
                },2500);
            }
            else alert("Đăng nhập thất bại! Sai tên tài khoản hoặc mật khẩu");
        }
    });
})

$('#signup').click(function(){
    let usname=$('#su_usname').val();
    let pass=$('#su_pass').val();
    let cfpass=$('#su_cfpass').val();
    let email=$('#su_email').val();
    let name=$('#su_name').val();
    let elo=$('#su_elo').val();
    let birthday=$('#su_birthday').val();
    let ctry=$('#su_ctry').val();
    if(pass!=cfpass) alert("Pass bạn nhập không trùng nhau!")
    else
    $.ajax({
        url: 'signup.php',
        type: 'post',
        data: {
            username:usname,
            password:pass,
            email:email,
            name:name,
            elo:elo,
            birthday:birthday,
            ctry:ctry
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=='success'){
                $('.message').text("Đăng ký thành công!");
                $('.close').click();
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                },2500);
            }
            else
            alert("Đăng ký thất bại! Kiểm tra lại dữ liệu nhập vào.")
        }
    });
})
$('.show').click(function(){
    if($(this).val()=="Show"){
        $('.td_table').show();
        $('.bd_table').show();
        $('.show').val('Show');
        $(this).val('Close');
        maGD=$(this).parent().contents()[0].value;
        $.ajax({
            url: './function/get_bd.php',
            type: 'post',
            data: {
                MaGD:maGD
            },
            dataType: 'json',
            success:function(response){
                $("#bd_body").empty();
                let action="";
                    for(data of response)
                    {
                        if($('.bd_table').children().eq(1).children().eq(0).children().eq(0).children().length>7){
                            action="<td> <button type='button' class='btn btn-primary scboard_del'> Del </button> </td>";
                        }
                        $("#bd_body").append("<tr>"+
                        "<td scope='row'>"+data['MATT']+"</td>"+
                        "<td>"+data['Ten']+"</td>"+
                        "<td>"+data['TranThang']+"</td>"+
                        "<td>"+data['TranThua']+"</td>"+
                        "<td>"+data['TranHoa']+"</td>"+
                        "<td>"+data['HieuSo']+"</td>"+
                        "<td>"+data['Diem']+"</td>"+
                        action
                        +"</tr>");
                    }
                
                $('.scboard_del').click(function(){
                    let MaTT=$(this).parent().parent().children().eq(0)[0].textContent;
                    if(confirm("Bạn có chắc muốn xóa tuyển thủ này khỏi giải đấu?"))
                    $.ajax({
                        url: './function/del_tt.php',
                        type: 'post',
                        data: {
                            MaGD:maGD,
                            MaTT:MaTT
                        },
                        dataType: 'json',
                        success:function(response){
                            if(response['status']=='success'){
                                $('.message').text("Xóa tuyển thủ thành công!");
                                $('.message').show();
                                setTimeout(function(){
                                    $('.message').hide();
                                    window.location.reload();
                                },2000);
                            }else{
                                alert("Xóa thất bại!")
                            }
                        }
                    })
                })
                    
            }
        })
    
        $.ajax({
            url: './function/get_td.php',
            type: 'post',
            data: {
                MaGD:maGD
            },
            dataType: 'json',
            success:function(response){
                $("#td_body").empty();
                let action="";
                
                for(data of response){
                    if($('.td_table').children().eq(3).children().eq(0).children().eq(0).children().length>6){
                        action="<td> <button type='button' class='btn btn-primary match_edit' onClick=(match_edit("+data['MaGD']+","+data['MaTD']+"))> Edit </button> </td>"+
                        "<td> <button type='button' class='btn btn-primary match_del' onClick=(match_del("+data['MaTD']+"))> Del </button> </td>";
                    }
                    let winner="Chưa";
                    if(data['Kq']==0) winner="Hòa";
                    if(data['Kq']==data['MaTT1']) winner=data['Ten1'];
                    if(data['Kq']==data['MaTT2']) winner=data['Ten2'];
                    $("#td_body").append("<tr>"+
                    "<td scope='row'>"+data['MaGD']+"</td>"+
                    "<td>"+data['MaTD']+"</td>"+
                    "<td>"+data['Ten1']+"</td>"+
                    "<td>"+data['Ten2']+"</td>"+
                    "<td>"+data['TGBD'].date.slice(0,11)+"</td>"+
                    "<td value='"+data['Kq']+"'>"+winner+"</td>"+
                    action
                    +"</tr>");
                }
                
            }
        })
    }
    else{
        $('.td_table').hide();
        $('.bd_table').hide();
        $(this).val("Show");
    }
    
});



$('#create_league1').click(function(){
    $('#TenGD').val("");
    $('#DiaDiem').val("");
    $('#TimeStart').val("");
    $('#TimeEnd').val("");
    $('#TongTran').val("");
    $('#TongTT').val("");
})

$('#create_league').click(function(){
    let TenGD=$('#TenGD').val();
    let DiaDiem=$('#DiaDiem').val();
    let TimeStart=$('#TimeStart').val();
    let TimeEnd=$('#TimeEnd').val();
    let TongTran=$('#TongTran').val();
    let TongTT=$('#TongTT').val();
    $.ajax({
        url: './function/create_gd.php',
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
            if(response['status']=='success'){
                $('.message').text("Thêm giải đấu thành công!");
                $('.shut').click();
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    window.location.reload();
                },2500);
            }
            else
            alert("Thêm thất bại! Kiểm tra lại dữ liệu nhập vào.")
        }
    })
})

$('#create_match1').click(function(){
    $.ajax({
        url: './function/get_tt.php',
        type: 'post',
        data: {
            maGD:maGD
        },
        dataType: 'json',
        success:function(response){
            $('#match_tt1').empty();
            $('#match_tt2').empty();
            for(data of response)
            {
                $('#match_tt1').append("<option value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
                $('#match_tt2').append("<option value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
            }
            
        }
    })
})

$('#create_match').click(function(){
    if($('#match_tt1').val()==$('#match_tt2').val()) alert("Phải chọn 2 tuyển thủ khác nhau");
    else{
        let MaTT1=$('#match_tt1').val()
        let MaTT2=$('#match_tt2').val();
        let TGBD=$('#match_TS').val();
        $.ajax({
            url: './function/create_td.php',
            type: 'post',
            data: {
                maGD:maGD,
                MaTT1:MaTT1,
                MaTT2:MaTT2,
                TGBD:TGBD
            },
            dataType: 'json',
            success:function(response){
                if(response['status']=='success'){
                    alert("Thêm thành công!")
                    window.location.reload();
                }
                else
                alert("Thêm thất bại! Kiểm tra lại dữ liệu nhập vào.")
            }
        })
    }
})


$('.league_edit').click(function(){
    let MaGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    maGD=MaGD;
    $.ajax({
        url: './function/get_gd.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            $('#TenGD2').val(response[0]['TenGD']);
            $('#DiaDiem2').val(response[0]['DiaDiem']);
            $('#TimeStart2').val(response[0]['TGBatDau'].date.slice(0,10));
            $('#TimeEnd2').val(response[0]['TGKetThuc'].date.slice(0,10));
            $('#TongTran2').val(response[0]['TongTran']);
            $('#TongTT2').val(response[0]['TongTT']);
        }
    })
})

$('#edit_league').click(function(){
    let TenGD=$('#TenGD2').val();
    let DiaDiem=$('#DiaDiem2').val();
    let TimeStart=$('#TimeStart2').val();
    let TimeEnd=$('#TimeEnd2').val();
    let TongTran=$('#TongTran2').val();
    let TongTT=$('#TongTT2').val();
    $.ajax({
        url: './function/edit_gd.php',
        type: 'post',
        data: {
            MaGD:maGD,
            TenGD:TenGD,
            DiaDiem:DiaDiem,
            TimeStart:TimeStart,
            TimeEnd:TimeEnd,
            TongTran:TongTran,
            TongTT:TongTT
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=='success'){
                $('.message').text("Sửa giải đấu thành công!");
                $('.close').click();
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    window.location.reload();
                },2500);
            }
            else
            alert("Sửa thất bại! Kiểm tra lại dữ liệu nhập vào.")
        }
    })
})

$('.league_del').click(function(){
    maGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    if(confirm("Bạn có chắc muốn xóa giải đấu này?"))
    $.ajax({
        url: './function/del_gd.php',
        type: 'post',
        data: {
            MaGD:maGD
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=='success'){
                $('.message').text("Xóa giải đấu thành công!");
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    window.location.reload();
                },2000);
            }else{
                alert("Xóa thất bại!")
            }
        }
    })
})

function match_edit(val,MaTD){
    $('.open_ed_td').click();
    maGD=val;

    
    $.ajax({
        url: './function/get_tt.php',
        type: 'post',
        data: {
            maGD:maGD
        },
        dataType: 'json',
        success:function(response){
            $('#ed_match_tt1').empty();
            $('#ed_match_tt2').empty();
            $('#ed_match_result').empty();
            $('#ed_match_result').append("<option value='-1'>Chưa</option>"+
            "<option value='0'>Hòa</option>")
            
            for(data of response)
            {
                $('#ed_match_tt1').append("<option id='MaTT1_"+data['MaTT']+"' value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
                $('#ed_match_tt2').append("<option id='MaTT2_"+data['MaTT']+"' value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
                $('#ed_match_result').append("<option value='"+data['MaTT']+"'>"+data['Ten']+"</option>")
            }
               
        }
        
    })
    
    $('#ed_match_tt1').change(function(){
        let Matt1=$('#ed_match_tt1').val();
        let Matt2=$('#ed_match_tt2').val();
        let Tentt1=$( "#ed_match_tt1 option:selected").text();
        let Tentt2=$( "#ed_match_tt2 option:selected").text();
        $('#ed_match_result').empty();
        $('#ed_match_result').append("<option value='-1'>Chưa</option>"+
        "<option value='0'>Hòa</option>"+
        "<option value='"+Matt1+"'>"+Tentt1+"</option>"+
        "<option value='"+Matt2+"'>"+Tentt2+"</option>"
        );
    })
    $('#ed_match_tt2').change(function(){
        let Matt1=$('#ed_match_tt1').val();
        let Matt2=$('#ed_match_tt2').val();
        let Tentt1=$( "#ed_match_tt1 option:selected" ).text();
        let Tentt2=$( "#ed_match_tt2 option:selected" ).text();
        $('#ed_match_result').empty();
        $('#ed_match_result').append("<option value='-1'>Chưa</option>"+
        "<option value='0'>Hòa</option>"+
        "<option value='"+Matt1+"'>"+Tentt1+"</option>"+
        "<option value='"+Matt2+"'>"+Tentt2+"</option>"
        );
    })
    $.ajax({
        url: './function/get_td.php',
        type: 'post',
        data: {
            MaTD:MaTD
        },
        dataType: 'json',
        
        success:function(response){
            let MaTT1=response[0]['MaTT1'];
            let MaTT2=response[0]['MaTT2'];
            $('#MaTT1_'+MaTT1).attr('selected','')
            $('#MaTT2_'+MaTT2).attr('selected','')
            $('#ed_match_TS').val(response[0]['TGBD'].date.slice(0,10));
            // $('#ed_match_result').val(response[0]['Kq']);

            $('#ed_match_MaTD').val(MaTD);      
        }
    })



}

$('#edit_match').click(function(){
    if($('#ed_match_tt1').val()==$('#ed_match_tt2').val()) alert("Phải chọn 2 tuyển thủ khác nhau");
    else{
        let MaTT1=$('#ed_match_tt1').val()
        let MaTT2=$('#ed_match_tt2').val();
        let TGBD=$('#ed_match_TS').val();
        let MaTD=$('#ed_match_MaTD').val();
        let Kq=$('#ed_match_result').val();
        $.ajax({
            url: './function/edit_td.php',
            type: 'post',
            data: {
                MaTD:MaTD,
                MaTT1:MaTT1,
                MaTT2:MaTT2,
                TGBD:TGBD,
                Kq:Kq
            },
            dataType: 'json',
            success:function(response){
                if(response['status']=='success'){
                    $('.message').text("Sửa trận đấu thành công!");
                    $('.close').click();
                    $('.message').show();
                    setTimeout(function(){
                        $('.message').hide();
                        window.location.reload();
                    },2500);
                }
                else
                alert("Sửa thất bại! Kiểm tra lại dữ liệu nhập vào.")
            }
        })
    }
})
function match_del(MaTD){
    if(confirm("Bạn có chắc muốn xóa trận đấu này?"))
    $.ajax({
        url: './function/del_td.php',
        type: 'post',
        data: {
            MaTD:MaTD
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=='success'){
                $('.message').text("Xóa trận đấu thành công!");
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    window.location.reload();
                },2000);
            }else{
                alert("Xóa thất bại!")
            }
        }
    })
}

$('.league_enter').click(function(){
    //insert
    //lay ma gd
    let MaGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    $.ajax({
        url: './function/enter_gd.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=='success'){
                $('.message').text("Tham gia giải đấu thành công!");
                $('.message').show();
                setTimeout(function(){
                    $('.message').hide();
                    window.location.reload();
                },2500);
            }
            else
            alert("Tham gia thất bại!")
        }
    })
})

$('.logout').click(function(){
    $.ajax({
        url: './function/logout.php',
        type: 'post',
        data: {
            out:'ok'
        },
        dataType: 'json',
        success:function(response){
            if(response['status']=="success") {
                location.reload();
            }
            else alert("Đăng xuất thất bại!")
        }
    })
})