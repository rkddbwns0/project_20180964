<?php
    $connect = mysqli_connect("localhost", "korea", "1234", "project") or die("fail");

    $id = $_POST['name'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    $URL = "main.php";

    $query = "insert into board (no, title, content, date, hit, id) 
                values(null, '$title', '$content', '$date', 0, '$id')";

    
    $result = $connect->query($query);
    if ($result) {
    ?>
    <script>
        alert("<?php echo "게시글이 등록되었습니다."?>");
        location.replace("<?php echo $URL ?>");
    </script>
    <?php
    } else {
        echo "게시글 등록에 실패하였습니다.";
    }

    mysqli_close($connect);
    ?>