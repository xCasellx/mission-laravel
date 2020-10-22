
$(".message-success").ready(function () {
    setTimeout(function () {
        $(".message-success").slideUp(300);
    }, 5000);
})

$(document).on("click", ".response-comment", function () {
    let comment_id = $(this).attr("data-id");
    $("#parent_id").val(comment_id);
})
