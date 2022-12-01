<?php
    $connect = mysqli_connect('localhost', 'korea', '1234', 'project') or die("connect failed");

    $no = $_POST['no'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $date = date('Y-m-d');

    $query = "update board set title = '$title', content = '$content', date = '$date' where no = $no";
    $result = $connect->query($query);

    if ($result) {
?>

    <script>
        alert("수정되었습니다.");
        location.replace("read.php?no=<?= $no ?>");
    </script>

<?php
     } else {
        echo "다시 시도해주세요.";
     }
?>
