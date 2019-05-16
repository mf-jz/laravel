$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

let E = window.wangEditor
let editor = new E('#editor')
let $text1 = $('#text-editor')
editor.customConfig.onchange = function (html) {
    // 监控变化，同步更新到 textarea
    $text1.val(html)
}
// 下面两个配置，使用其中一个即可显示“上传图片”的tab。但是两者不要同时使用！！！
// editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
editor.customConfig.uploadImgServer = '/posts/image/upload'  // 上传图片到服务器
editor.customConfig.uploadFileName = 'filename'
editor.customConfig.uploadImgHeaders = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
editor.create()
// 初始化 textarea 的值
$text1.val(editor.txt.html())

$(".like-button").click(function (event) {
    const target = $(event.target)
    const current_like = target.attr("like-value")
    const user_id = target.attr("like-user")
    if (current_like === 1) {
        $.ajax({
            url: "/user/" + user_id + "/unfan",
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.error !== 0) {
                    alert(data.msg);
                    return;
                }
                target.text("关注");
                target.attr("like-value", 0);
            }
        })
    } else {
        $.ajax({
            url: "/user/" + user_id + "/fan",
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.error !== 0) {
                    alert(data.msg);
                    return;
                }
                target.text("取消关注");
                target.attr("like-value", 1);
            }
        })
    }
});

