<!doctype html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <style>
            body {
                margin-top: 60px;
                align-items: center;
            }

            table {
                border-top: 1px solid #444444;
                border-collapse: collapse;
            }

            tr {
                border-bottom: 1px solid #444444;
                padding: 10px;
            }

            td {
                border-bottom: 1px solid #efefef;
                padding: 10px;
            }

            table .even {
                background: #efefef;
            }

            .text {
                text-align: center;
                padding-top: 20px;
                color: #000000;
            }

            .text:hover {
                text-decoration: underline;
            }

            a:link {
                color: #57A0EE;
                text-decoration: none;
            }
            
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <?php
        $connect = mysqli_connect('localhost', 'korea', '1234', 'project') or die("connect failed");
        $query = "select * from board order by no desc";
        $result = mysqli_query($connect, $query);
        $total = mysqli_num_rows($result);

        session_start();

        if (isset($_SESSION['id'])) {
        ?><b><?php echo $_SESSION['id']; ?></b>
                <button onclick="location.href='./logout_action.php'" style="float:right; font-size:15.5px;">로그아웃</button>
            <br />
        <?php
        } else {
        ?>
            <button onclick = "location.href = 'login.html'" style = "float:right; font-size:15.5px;">로그인</button>
            <br />
        <?php
        }
        ?>
        <p style = "font-size:25px; text-align:center"><b>게시판</b></p>
        <table align = "center">
            <thead align = "center">
                <tr>
                    <td width = "50" align = "center">번호</td>
                    <td width = "500" align = "center">제목</td>
                    <td width = "100" align = "center">작성자</td>
                    <td width = "200" align = "center">날짜</td>
                    <td width = "50" align = "center">조회수</td>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($rows = mysqli_fetch_array($result)) {
                    if ($total % 2 == 0) { ?>
                <tr class = "even">
                    <?php } else { ?>
                <tr>
                <?php } ?>

                <td width = "50" align = "center"><?php echo $total ?></td>
                <td width = "500" align = "center">
                <a href="read.php?no=<?php echo $rows['no'] ?>">
                    <?php echo $rows['title'] ?>
                </td>
                <td width="100" align="center"><?php echo $rows['id'] ?></td>
                <td width="200" align="center"><?php echo $rows['date'] ?></td>
                <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                </tr>
                
            <?php
                $total--;
                    }
            ?>
            </tbody>
        </table>

        <div class = "text">
            <font style = "cusor: hand" onclick = "location.href = 'write.php'">글쓰기</font>
        </div>
    </body>
</html>