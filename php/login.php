<?php
        session_start();

        $connect = mysqli_connect("localhost", "korea", "1234", "project");

        $id = $_POST['id'];
        $pw = $_POST['pw'];

        $query = "select * from signup where id='$id'";
        $result =  mysqli_query($connect, $query);

        $row = mysqli_fetch_array($result);
        if($row['id'] == $id){
            if($row['pw'] == $pw){
                $_SESSION['id'] = $id;
                if(isset($_SESSION['id'])){
                    echo "<script>location.replace('main.php');</script>";
                }
                else{
                    echo "Session failed";
                }
            }
            else{
                echo "<script>alert('아이디 혹은 비밀번호를 확인해 주세요.'); history.back();</script>";
            }
        }
?>