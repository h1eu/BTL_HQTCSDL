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
            if(response['log']===true) location.reload();
            else alert("dang nhap that bai");
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
            console.log("OK")
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
            url: 'get_bd.php',
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
                        if($('.bd_table').children().eq(1).children().eq(0).children().eq(0).children().length>6){
                            action="<td> <button type='button' class='btn btn-primary scboard_del'> Del </button> </td>";
                        }
                        $("#bd_body").append("<tr>"+
                        "<td scope='row'>"+data['MATT']+"</td>"+
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
                    $.ajax({
                        url: 'del_tt.php',
                        type: 'post',
                        data: {
                            MaTT:MaTT
                        },
                        dataType: 'json',
                        success:function(response){
                            console.log(response)
                        }
                    })
                })
                    
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
                let action="";
                
                for(data of response){
                    if($('.td_table').children().eq(3).children().eq(0).children().eq(0).children().length>6){
                        action="<td> <button type='button' class='btn btn-primary match_edit' onClick=(match_edit("+data['MaGD']+","+data['MaTD']+"))> Edit </button> </td>"+
                        "<td> <button type='button' class='btn btn-primary match_del' onClick=(match_del("+data['MaTD']+"))> Del </button> </td>";
                    }
                    $("#td_body").append("<tr>"+
                    "<td scope='row'>"+data['MaGD']+"</td>"+
                    "<td>"+data['MaTD']+"</td>"+
                    "<td>"+data['MaTT1']+"</td>"+
                    "<td>"+data['MaTT2']+"</td>"+
                    "<td>"+data['TGBD'].date.slice(0,11)+"</td>"+
                    "<td>"+data['Kq']+"</td>"+
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
            console.log(response+"ghahahah");
        }
    })
})

$('#create_match1').click(function(){
    $.ajax({
        url: 'get_tt.php',
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
            url: 'create_td.php',
            type: 'post',
            data: {
                maGD:maGD,
                MaTT1:MaTT1,
                MaTT2:MaTT2,
                TGBD:TGBD
            },
            dataType: 'json',
            success:function(response){
                console.log(response+"ghahahah");
            }
        })
    }
})


$('.league_edit').click(function(){
    let MaGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    maGD=MaGD;
    $.ajax({
        url: 'get_gd.php',
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
        url: 'edit_gd.php',
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
            console.log("xong");
        }
    })
})

$('.league_del').click(function(){
    maGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    $.ajax({
        url: 'del_gd.php',
        type: 'post',
        data: {
            MaGD:maGD
        },
        dataType: 'json',
        success:function(response){
            console.log(response)
        }
    })
})

function match_edit(val,MaTD){
    $('.open_ed_td').click();
    maGD=val;
    $.ajax({
        url: 'get_tt.php',
        type: 'post',
        data: {
            maGD:maGD
        },
        dataType: 'json',
        success:function(response){
            $('#ed_match_tt1').empty();
            $('#ed_match_tt2').empty();
            for(data of response)
            {
                $('#ed_match_tt1').append("<option id='MaTT1_"+data['MaTT']+"' value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
                $('#ed_match_tt2').append("<option id='MaTT2_"+data['MaTT']+"' value='"+data['MaTT']+"'>"+data['Ten']+"</option>");
            }
            
        }
        
    })

    $.ajax({
        url: 'get_td.php',
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
            $('#ed_match_result').val(response[0]['Kq']);      
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
            url: 'edit_td.php',
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
                console.log(response+"ghahahah");
            }
        })
    }
})
function match_del(MaTD){
    $.ajax({
        url: 'del_td.php',
        type: 'post',
        data: {
            MaTD:MaTD
        },
        dataType: 'json',
        success:function(response){
            console.log(response)
        }
    })
}

$('.league_enter').click(function(){
    //insert
    //lay ma gd
    let MaGD=$(this).parents().eq(1).children().eq(6).children().eq(0).val();
    $.ajax({
        url: 'enter_gd.php',
        type: 'post',
        data: {
            MaGD:MaGD
        },
        dataType: 'json',
        success:function(response){
            console.log(response[0]);
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
            if(response['status']=="success") location.reload();
            else alert("Đăng xuất thất bại!")
        }
    })
})