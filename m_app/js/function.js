function back() {
    window.location.href="list.php";
}

function add_prod() {
    var img = $("input[name='img']").val();
    var title = $("input[name='title']").val();
    var des = $("#des").val();
    var coordinate = $("input[name='coordinate']").val();
    var types = $("#types").val();

    if(!img){
        alert("Please upload the picture")
        return false;
    }

    if(!title){
        alert("Please enter a name")
        return false;
    }

    if(!des){
        alert("Please enter a des")
        return false;
    }

    if(!coordinate){
        alert("Please enter a longitude and latitude")
        return false;
    }

    $.ajax({
        url: "",
        type: "post",
        data: {
            img: img,
            title: title,
            des: des,
            coordinate: coordinate,
            types: types
        },
        success: function (res) {
            var res = JSON.parse(res);
            if(res.code == 1){
                alert(res.msg)
                setTimeout(function () {
                    window.location.href="list.php";
                },1000)
            }else{
                alert(res.msg)
            }
        }
    })

}


function edit() {
    var img = $("input[name='img']").val();
    var title = $("input[name='title']").val();
    var des = $("#des").val();
    var coordinate = $("input[name='coordinate']").val();
    var types = $("#types").val();
    var id = $("input[name='id']").val();

    if(!id){
        window.location.href="list.php";
        return false;
    }

    if(!img){
        alert("Please upload the picture")
        return false;
    }

    if(!title){
        alert("Please enter a name")
        return false;
    }

    if(!des){
        alert("Please enter a des")
        return false;
    }

    if(!coordinate){
        alert("Please enter a longitude and latitude")
        return false;
    }

    $.ajax({
        url: "",
        type: "post",
        data: {
            img: img,
            title: title,
            des: des,
            coordinate: coordinate,
            types: types,
            id: id
        },
        success: function (res) {
            var res = JSON.parse(res);
            if(res.code == 1){
                alert(res.msg)
                setTimeout(function () {
                    window.location.href="list.php";
                },1000)
            }else{
                alert(res.msg)
            }
        }
    })

}

function search() {
    var search =  $("input[name='search']").val();

    location.href="/recent.php?search="+search;

}