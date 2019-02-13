$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(".post-audit").click(function (event) {
    target = $(event.target);
    let post_id = target.attr("post-id");
    let status = target.attr("post-action-status");

    $.ajax({
        url: "/admin/posts/" + post_id + "/status",
        type: "post",
        dataType: "",
        data: { status: status },
        success: function (data) {
            if (data.status !== 0) {
                alert(data.msg);
                return;
            }

            target.parent().parent().remove();
        }
    });
});
