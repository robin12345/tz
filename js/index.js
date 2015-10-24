function Before(){
    console.log('wait');
}
function Success(data){
    console.log(data);
    data = JSON.parse(data);
    //console.log(data);
    $("table").empty();
    $("table").append($(
        "<tr>" + "<th>" + "ИФО курьера" + "</th>"
        + "<th>" + "Регион" + "</th>"
        + "<th>" + "Дата отъезда из Москвы" + "</th>"
        + "<th>" + "Дата прибытия в регион" + "</th>"
        + "<th>" + "Дата возвращения в Москву" + "</th>" +
        "</tr>"
    ));
    for(var i=0; i < data.length; i++ ) {
        $("table").append($(
            "<tr>" + "<th>" + data[i]['data_courier']['name'] + " " + data[i]['data_courier']['second_name'] + " " + data[i]['data_courier']['last_name'] + "</th>"
            + "<th>" + data[i]['data_region']['title'] + "</th>"
            + "<th>" + data[i]['date_out'] + "</th>"
            + "<th>" + data[i]['date_in'] + "</th>"
            + "<th>" + data[i]['date_back'] + "</th>" +
            "</tr>"
        ))
    }

}
$(document).ready(function(){

    $("input[name='start']").bind("change", function(){
        var end = $(".end").val();
        var start = $(".start").val();
        if( end != ''){
            if (end > start){
                $.ajax({
                    url: "/update",
                    type: "post",
                    data: ({ date_end: end, date_start: start }),
                    dataType: "html",
                    beforeSend: Before,
                    success: Success
                });
            }
            else if( start >= end) {
                alert("Дата начала должна быть меньше даты завершения")
            }
        }
    });
    $("input[name='end']").bind("change", function(){
        var end = $(".end").val();
        var start = $(".start").val();
        if(start != ''){
            if (end > start){
                $.ajax({
                    url: "/update",
                    type: "post",
                    data: ({ date_end: end, date_start: start }),
                    dataType: "html",
                    beforeSend: Before,
                    success: Success
                });
            }
            else if( start >= end) {
                alert("Дата начала должна быть меньше даты завершения")
            }
        }
    })
})