$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(".post-audit").click(function (event) {
    let target = $(event.target);
    let post_id = target.attr("post-id");
    let status = target.attr("post-action-status");

    $.ajax({
        url: "/admin/posts/" + post_id + "/status",
        type: "post",
        dataType: "",
        data: {status: status},
        success: function (data) {
            if (data.status !== 0) {
                alert(data.msg);
                return;
            }

            target.parent().parent().remove();
        }
    });
});

$(".country-audit").click(function (event) {
    if (confirm("确定执行删除操作嘛？") === false) {
        return;
    }

    let target = $(event.target);
    let country_id = target.attr("country-id");

    $.ajax({
        url: "/admin/countries/" + country_id + "/status",
        type: "post",
        dataType: "",
        data: {},
        success: function (data) {
            if (data.status !== 0) {
                alert(data.msg);
                return;
            }

            target.parent().parent().remove();
        }
    });
});

$(".heart-audit").click(function (event) {
    if (confirm("确定执行删除操作嘛？") === false) {
        return;
    }

    let target = $(event.target);
    let heart_id = target.attr("heart-id");

    $.ajax({
        url: "/admin/hearts/" + heart_id + "/status",
        type: "post",
        dataType: "",
        data: {},
        success: function (data) {
            if (data.status !== 0) {
                alert(data.msg);
                return;
            }

            target.parent().parent().remove();
        }
    });
});

$(".resource-delete").click(function (event) {
    if (confirm("确定执行删除操作嘛？") === false) {
        return;
    }
    let target = $(event.target);
    event.preventDefault();
    let url = target.attr("delete-url");

    $.ajax({
        url: url,
        method: "POST",
        dataType: "",
        data: {'_method': 'DELETE'},
        success: function (data) {
            if (data.error !== 0) {
                alert(data.msg);
                return;
            }

            window.location.reload();
        }
    });
});
