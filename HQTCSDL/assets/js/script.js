
$('.nav-link').click(function(){
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
})

$('.match').click(function(){
    $('.td_table').show();
    $('.tt_table').hide();
    $('.gd_table').hide();
    $('.bd_table').hide();
})
$('.league').click(function(){
    $('.gd_table').show();
    $('.tt_table').hide();
    $('.td_table').hide();
    $('.bd_table').hide();
})
$('.player').click(function(){
    $('.tt_table').show();
    $('.gd_table').hide();
    $('.td_table').hide();
    $('.bd_table').hide();
})

$('.scboard').click(function(){
    $('.bd_table').show();
    $('.tt_table').hide();
    $('.gd_table').hide();
    $('.td_table').hide();
})
$('#datetimepicker7').datetimepicker();
$('#login').click(function(){
    // alert("helo"+$('#usname').val()+$('#pass').val());
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
        // var len = response.length;
        // $("#sel_user").empty();
        //     for( var i = 0; i<len; i++){
        //     var id = response[i]['id'];
        //     var name = response[i]['name'];
        //     $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");
        //     }
        }
    });
})
