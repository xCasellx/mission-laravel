
$(".message-success").ready(function () {
    setTimeout(function () {
        $(".message-success").slideUp(300);
    }, 5000);
})

$(document).on("click", ".response-comment", function () {
    let comment_id = $(this).attr("data-id");
    $("#parent_id").val(comment_id);
})

$(".form-comment").on("submit", function () {
    $(".create-btn").attr("disabled", true);
})

$(document).on("click", ".edit-comment", function () {
    let comment_id = $(this).attr("data-id");
    $("#comment_id").val(comment_id);
    let text = $(".comments-text[data-id = '"+comment_id+"']").text().trim();
    $("#edit_text_comment").text(text);

})

$(document).on("click", ".delete-comment", function () {
    let comment_id = $(this).attr("data-id");
    let href = $("#modal_button_delete").attr("href")+ comment_id;
    $("#modal_button_delete").attr("href", href);
})




