function login_Check() {

    var id = document.getElementById("id");
    var pw = document.getElementById("pw");

    if(!id.value){
        alert("아이디를 입력해 주세요.");
        id.focus();
        return false;
    }

    if(!pw.value) {
        alert("비밀번호를 입력해 주세요.");
        pw.focus();
        return false;
    }

    document.login_form.submit();
}