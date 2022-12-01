$(function() {
    $("#rep_btn").click(function() {
        $.ajax({
            url : "reply_ok.php",
            type : "post",
            data : {
                "b_no" : $(".b_no").val(),
                "name" : $(".name").val(),
                "pw" : $(".pw").val(),
                "content" : $(".content").val(),
            },
            success : function(date) {
                alert("댓글이 작성되었습니다.");
                location.reload();
            }
        });
    });

    $(".dat_del_btn").click(function() {
        $("#rep_modal_del").modal();
    });

});
