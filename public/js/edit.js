$("#country").on("load-data",function () {
    let id = $("#country-id").val();
    $(this).val(id);
    loadListRegion();
})

$("#region").on("load-data",function () {
    let id = $("#region-id").val();
    $(this).val(id);
    loadListCity();
})


$("#city").on("load-data",function () {
    let id = $("#city-id").val();
    $(this).val(id);
})

