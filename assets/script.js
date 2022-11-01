// kiểm tra thông tin đăng ký
var dangky=document.getElementById("fRegister");
if (dangky){
    dangky.addEventListener("submit", function(ev){
        var mk = document.getElementById("password");
        var xacnhanmk = document.getElementById("cfpassword");
        var sdt = document.getElementById("phone");
        if (/^\d{10}$/.test(sdt.value) == false){
            ev.preventDefault();
            alert('Định dạng số điện thoại không hợp lệ');
            return;
        }
        if (mk.value.length < 5){
            ev.preventDefault();
            alert("Mật khẩu không được ít hơn 5 ký tự");
            return;
        }
        if (mk.value != xacnhanmk.value){
            ev.preventDefault();
            alert("Mật khẩu và xác nhận mật khẩu không khớp, hãy thử lại");
            return;
        }
    });
}