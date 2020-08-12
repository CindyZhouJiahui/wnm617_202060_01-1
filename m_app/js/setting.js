function setting() {
    var id = $("input[name='id']").val();
    var head = $("input[name='head']").val();
    var nickname = $("input[name='nickname']").val();
    var sex = $("input[name='sex']").val();
    var age = $("input[name='age']").val();

    $.ajax({
        url: "",
        type: "post",
        data: {
            id: id,
            head: head,
            nickname: nickname,
            sex: sex,
            age: age
        },
        success: function (response) {
            var res = JSON.parse(response);
            if(res.code == 1){
                alert("success");
            }else {
                alert("error");
                window.location.reload();
            }
        }
    })
}