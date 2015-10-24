function funcBefore(){
    console.log('ожидайте');
}

function funcSuccess(data){
    //console.log(data);
    data = JSON.parse(data);

    $("select[name='courier']").empty();
    for(var i=0; i < data.length; i++ ){
        $("select[name='courier']").append($("<option value='" + data[i]['id'] + "'>" + data[i]['name'] + "</option>"))
    }
}
function reach_place(date_start_unix,days){
    var days_unix = date_start_unix + days*86400000;
    var convert = new Date(days_unix);
    convert = convert.getFullYear() + '-' + (convert.getMonth() + 1) + '-' +  convert.getDate();
    return convert;
}
function return_from_place(date_start_unix,days_there,days_back){
    var days_unix = date_start_unix + days_there*86400000 + days_back*86400000;
    var convert = new Date(days_unix);
    convert = convert.getFullYear() + '-' + (convert.getMonth() + 1) + '-' +  convert.getDate();
    return convert;
}

function come_back(){
    var date_out = $(".date").val();
    var out_unix = Date.parse(date_out);

    $("input[name='date_out']").empty();
    $("input[name='date_out']").val(date_out);

    $(".date_out").empty();
    $(".date_out").append(("Дата отъезда из Москвы " + date_out));

    $(".date_there").empty();
    var time_there = $(".region:selected").attr('date_there');
    var date_there = reach_place(out_unix,time_there);
    $(".date_there").append(("Дата прибытия в регион " + date_there));

    $("input[name='date_there']").empty();
    $("input[name='date_there']").val(date_there);

    $(".date_back").empty();
    var time_back = $(".region:selected").attr('date_back');
    var date_back = return_from_place(out_unix,time_there,time_back);
    $(".date_back").append(("Дата возвращения в Москву " + date_back));

    $("input[name='date_back']").empty();
    $("input[name='date_back']").val(date_back);
}

function check(){
    var result = true;
    var put = $("input");
    var sel = $("select[name='courier']").val();
    var reg = $("select[name='region']").val();

    for (var i = 0; put.length > i; i++){
        if( put.eq(i).val() == ''){
            result = false;
        }
    }
    if ( sel == '' ){
        result = false;
    }
    if ( reg == '' ){
        result = false;
    }
    if (result === true){
        $('form').submit();
    }
    else {
        alert('Одно из полей не заполнено');
    }
}

$(document).ready(function() {
    $("input[name='date_out']").bind("change", function(){
        var date_out = $("input[name='date_out']").val();
        $.ajax({
            url: "/check",
            type: "post",
            data: ({ date: date_out }),
            dataType: "html",
            beforeSend: funcBefore,
            success: funcSuccess
        });

        if($(".region:selected").text() != ''){
            come_back();
        }
    });

    $("select[name='region']").bind("change", function(){
        if ($(".date").val() != ''){
            come_back();
        }
    });

    $(".send").on('click',function(){
        check();
    });
});