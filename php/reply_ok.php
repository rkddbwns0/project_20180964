<?php
	$connect = mysqli_connect('localhost', 'korea', '1234', 'project');
    $no = $_GET['idx'];
    $query = "insert into reply(no, name, content) values('".$no."','".$_POST['id']."','".$_POST['content']."')";
    
    if($connect -> query($query)){
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='read.php?no=$no';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
?>