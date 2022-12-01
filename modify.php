<!doctype html>

<html>
    <head>
        <meta charset = "utf-8">

        <style>
            table.table2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin: 20px 10px;
            }

            table.table2 tr {
                width: 50px;
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }

            table.table tr {
                width: 100px;
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }
        </style>
    </head>

    <body>
        <?php
            session_start();

            $connect = mysqli_connect('localhost', 'korea', '1234', 'project');
            $no = $_GET['number'];
            $query = "select title, content, date, id from board where no = '$no'";
            $result = $connect->query($query);
            $rows = mysqli_fetch_array($result);

            $title = $rows['title'];
            $content = $rows['content'];
            $id = $rows['id'];

            $URL = "main.php";

            echo $id;

            if (!isset($_SESSION['id'])) {
                 
        ?>
        <script>
                alert("권한이 없습니다.");
                location.replace("<?php echo $URL ?>");
            </script>
        
        <?php
            } else if ($_SESSION['id'] == $id) {
        ?>

        <form method = "post" action = "modify_action.php">
            <table style = "padding-top:50px" align = center width = auto border = 0 cellpadding = 2>
                <tr>
                    <td style = "height:40; float:center; background-color:#3C3C3C">
                        <p style = "font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 수정하기</b></p>
                    </td>   
                </tr>

                <tr>
                    <td bgcolor = white>
                        <table class = "table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type = "hidden" name = "id" value = "<?= $_SESSION['id'] ?>"><?= $_SESSION['id'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type = text name = title size = 87 value = "<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea name = content col = 75 rows = 15><?= $content ?></textarea></td>
                            </tr>
                        </table>

                        <center>
                            <input type = "hidden" name = "no" value = "<?= $no ?>">
                            <button style = "height:50px; width:100px; font-size:16px;" type = "submit">수정하기</button>
                        </center>
                    </td>
                </tr>
            </table>
        </form>

        <?php
            } else {
        ?>
            <script>
                alert("권한이 없습니다.");
                location.replace("<?php echo $URL ?>");
            </script>
        <?php
            }
        ?>
            
    </body>
</html>