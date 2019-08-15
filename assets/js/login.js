$(window).load(function () {
    $('body').bind('copy paste', function (e) {
        e.preventDefault();
        return !1;
    });
    setTimeout(function () {
        $('.row').show('slow');
    }, 1000);
});

function showpwd() {
    switch (document.getElementById("pwdtxt").type) {
        case "password":
            document.getElementById("pwdtxt").type = "text";
            $(".showpwd").removeClass("fa fa-eye");
            $(".showpwd").addClass("fa fa-eye-slash");
            break;
        case "text":
            document.getElementById("pwdtxt").type = "password";
            $(".showpwd").removeClass("fa fa-eye-slash");
            $(".showpwd").addClass("fa fa-eye");
    }
}

function Login() {
    var a, b;
    a = $('input[name=unametxt]').val();
    b = $('input[name=pwdtxt]').val();
    if (a === '') {
        $('#unamemsg').show('slow');
        document.getElementById("unamemsg").innerHTML = 'Masukkan username';
        $('#unamemsg').delay(3000).hide('slow');
    } else if (b === '') {
        $('#pwdmsg').show('slow');
        document.getElementById("pwdmsg").innerHTML = 'Masukkan password';
        $('#pwdmsg').delay(3000).hide('slow');
    } else {
        $.ajax({
            async: !1,
            type: 'POST',
            url: "http://localhost:8080/sut/Auth/Proses/",
            data: {
                'uname': a,
                'nik': b
            },
            statusCode: {
                200: function (data) {
                    if (data.hakakses == 1) {
                        window.location.href = "http://localhost:8080/sut/Admin/Dashboard/index";
                    } else if (data.hakakses == 2) {
                        window.location.href = "http://localhost:8080/sut/Customer/Dashboard/index";
                    } else if (data.hakakses == 3) {
                        window.location.href = "http://localhost:8080/sut/Direktur/Dashboard/index";
                    }
                },
                201: function (data) {
                    $('#errmsg').show('slow');
                    document.getElementById("errmsg").innerHTML = data.message;
                    $('#errmsg').delay(3500).hide('slow');
                }
            }
        });
    }
}
document.addEventListener("keypress", function onEvent(event) {
    if (event.key === "Enter") {
        Login();
    }
});