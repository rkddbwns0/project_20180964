<?php
        $host = 'localhost';
        $user = 'korea';
        $pw = '1234';
        $dbName = 'project';
        $mysqli = new mysqli($host, $user, $pw, $dbName);

        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $pwc = $_POST['pwc'];
        $NickName = $_POST['NickName'];
        $name= $_POST['name'];
        $tel = $_POST['tel'];
        
        $sql = "insert into signup (
                id,
                pw,
                pwc,
                NickName,
                name,
                tel
        )";
        
        $sql = $sql. "values (
                '$id',
                '$pw',
                '$pwc',
                '$NickName',
                '$name',
                '$tel'                
        )";

        if($mysqli->query($sql)){ 
        echo '<script>alert("회원가입이 완료되었습니다!")</script>';
        echo '<script>location.href="login.html"</script>'; 
        }else{ 
        echo '<script>alert("fail to insert sql")</script>';
        }

        mysqli_close($mysqli);
       
?>

<script>
	location.href = "signup.html";
</script>