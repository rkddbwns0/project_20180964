function joinform_check() {

    var id = document.getElementById("id");
    var pw = document.getElementById("pw");
    var pwc = document.getElementById("pwc");
    var NickName = document.getElementById("NickName");
    var name = document.getElementById("name");
    var tel = document.getElementById("tel");

    if (id.value == "") { 
        alert("아이디를 입력하세요.");
        id.focus(); 
        return false; 
    };

    if (pw.value == "") {
        alert("비밀번호를 입력하세요.");
        pw.focus();
        return false;
    };


    var pwdCheck = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,25}$/;

    if (!pwdCheck.test(pw.value)) {
        alert("비밀번호는 영문자+숫자+특수문자 조합으로 8~25자리 사용해야 합니다.");
        pw.focus();
        return false;
    };

    if (pwc.value !== pw.value) {
        alert("비밀번호가 일치하지 않습니다..");
        pwc.focus();
        return false;
    };

    if (NickName.value == "") {
        alert("닉네임을 입력하세요.");
        NcickName.focus();
        return false;
    };

    if (name.value == "") {
        alert("이름을 입력하세요.");
        name.focus();
        return false;
    };

    if (tel.value == "") {
        alert("전화번호를 입력하세요.");
        tel.focus();
        return false;
    };

    if (tel.value.length != 11) {
        alert("전화번호를 제대로 입력하세요.");
        tel.focus();
        return false;
    };

    var reg = /^[0-9]+/g;

    if (!reg.test(tel.value)) {
        alert("전화번호는 숫자만 입력할 수 있습니다.");
        tel.focus();
        return false;

    }



    
    document.join_form.submit();
}
