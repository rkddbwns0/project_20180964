<?php
    session_start();

    $connect = mysqli_connect('localhost', 'korea', '1234', 'project') or die("connect failed");
    $no = $_GET['number'];
    
    $query = "select id from board where no = '$no'";
    $result = $connect->query($query);
    $rows = mysqli_fetch_array($result);

    $id = $rows['id'];


    $URL = "main.php";

?>

<?php

    if (!isset($_SESSION['id'])) {
?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php
    } else if ($_SESSION['id'] == $id) {
        $query1 = "delete from board where no = $no";
        $result1 = $connect->query($query1); 
?>
    <script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
    }
?>