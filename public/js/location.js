$(document).ready(function () {
    loadListCountry();
})

$(document).on("change","#country", function () {
    $("#city").empty();
    $("#region").empty();
    loadListRegion();
});

$(document).on("change","#region", function () {
    $("#city").empty();
    loadListCity();
});

function  loadListCountry() {
    $.ajax({
        url: "/location/country",
        type : "GET",
        contentType : 'application/json',
        success : function(result) {
            $("#country").html(`<option></option>`);
            result.forEach(element => {
                $("#country").append(`<option value = `+element.id+` >`+element.name+`</option>`);
            });
            $("#country").trigger('load-data');
        }
    })
}

function  loadListRegion() {
    let id =$('#country option:selected').val();
    $.ajax({
        url: "/location/region/"+id,
        type : "GET",
        contentType: 'application/json',
        success: function(result) {
            $("#region").html("<option></option>");
            result.forEach(element => {
                $("#region").append(`<option value = `+element.id+` >`+element.name+`</option>`);
            });
            $("#region").trigger('load-data');
        },
        error: function (result) {
            console.log(result)
        }
    })
}

function  loadListCity() {
    let id =$('#region option:selected').val();
    $.ajax({
        url: "/location/city/"+id,
        type : "GET",
        contentType: 'application/json',
        success: function(result){
            $("#city").html(`<option></option>`);
            result.forEach(element => {
                $("#city").append(`<option  value = `+element.id+` >`+element.name+`</option>`);
            });
            $("#city").trigger('load-data');
        },
        error: function (result) {
            console.log(result)
        }
    })
}
