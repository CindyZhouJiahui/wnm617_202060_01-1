$.ajax({
    url: "login.php",
    type: "get",
    data: {

    },
    success: function (res) {
        var res = JSON.parse(res);
        if(res.code == 1){
            window.location.href="index.php";
        }
    }
})

$('#sing_in').submit(function(e) {
    var username = $("input[name='username']").val();
    var password = $("input[name='password']").val();

    if(!username.trim()){
        alert("Please enter your username")
        return false;
    }

    if(!password.trim()){
        alert("Please enter your password")
        return false;
    }

    $.ajax({
        url: "login.php",
        type: "post",
        data: {
            username: username,
            password: password
        },
        success: function (res) {
            var res = JSON.parse(res);
            if(res.code == 1){
                alert(res.msg)
                setTimeout(function () {
                    window.location.href="index.php";
                },1000)
            }else{
                alert(res.msg)
            }
        }
    })

    return false;
});