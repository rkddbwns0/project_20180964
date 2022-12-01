<!doctype html>
<html>
    
    <head>
        <meta charset = "utf-8">

        <style>
            .read_table {
                border: 1px solid #444444;
                margin-top: 30px;
            }

            .read_title {
                height: 45px;
                font-size: 23.5px;
                text-align: center;
                background-color: #3C3C3C;
                color: white;
                width: 1000px;
            }

            .read_id {
                text-align: center;
                background-color: #EEEEEE;
                width: 30px;
                height: 33px;
            }

            .read_id2 {
                background-color: white;
                width: 60px;
                height: 33px;
                padding-left: 10px;
            }

            .read_hit {
                background-color: #EEEEEE;
                width: 30px;
                text-align: center;
                height: 33px;
            }

            .read_hit2 {
                background-color: white;
                width: 60px;
                height: 33px;
                padding-left: 10px;
            }

            .read_content {
                padding: 20px;
                border-top: 1px solid #444444;
                height: 300px;
            }

            .read_btn {
                width: 700px;
                height: 100px;
                text-align: center;
                margin: auto;
                margin-top: 50px;
            }

            .read_btn1 {
                height: 50px;
                width: 100px;
                font-size: 20px;
                text-align: center;
                background-color: white;
                border: 2px solid black;
                border-radius: 10px;
            }

            .read_comment_input {
                width: 700px;
                height: 500px;
                text-align: center;
                margin: auto;
            }

            .read_text3 {
                font-weight: bold;
                float: left;
                margin-left: 20px;
            }

            .read_com_id {
                width: 100px;
            }

            .read_comment {
                width: 500px;
            }
        </style>
        <!-- <script src = "reply.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <body>
            <?php
                $connect = mysqli_connect('localhost', 'korea', '1234', 'project');
                $no = $_GET['no'];
                $query = "select title, content, date, hit, id from board where no = $no";
                $result = $connect->query($query);
                $rows = mysqli_fetch_array($result);

                session_start();
              
                $hit = "update board set hit = hit + 1 where no = $no";
                $connect->query($hit);

                if (isset($_SESSION['id'])) {
            ?>
                <b><?php echo $_SESSION['id']; ?></b>
                <br />

            <?php
                } 
            ?>

            <table class = "read_table" align = center>
                <tr>
                    <td colspan = "4" class = "read_title"><?php echo $rows['title'] ?></td>
                </tr>

                <tr>
                    <td class = "read_id">작성자</td>
                    <td class = "read_id2"><?php echo $rows['id'] ?></td>
                    <td class = "read_hit">조회수</td>
                    <td class = "read_hit2"><?php echo $rows['hit'] + 1?></td>
                </tr>

                <tr>
                    <td colspan = "4" class = "read_content" valign = "top">
                        <?php echo $rows['content'] ?></td>
                </tr>
            </table>

            <div class = "read_btn">
                <button class = "read_btn1" onclick = "location.href = 'main.php'">목록</button>&nbsp;&nbsp;
                <?php
                    if (isset($_SESSION['id']) and $_SESSION['id'] == $rows['id']) { ?>
                <button class = "read_btn1" onclick = "location.href = 'modify.php?number=<?= $no ?>'">수정</button>&nbsp;&nbsp;
                <button class = "read_btn1"  a onclick = "ask();">삭제</button>

                <script>
                    function ask() { 
                        if (confirm("게시글을 삭제하시겠습니까?")) {
                            window.location = 'delete.php?number=<?= $no ?>'
                        }
                    }
                </script>
                <?php } ?>       
            </div>



            <div class="reply_view">
            <h3>댓글목록</h3>
                <?php

                    $connect = mysqli_connect('localhost', 'korea', '1234', 'project');
                    $query = "select * from reply where no ='".$no."' order by idx desc";
                    $result = $connect->query($query);
                    while($rows = mysqli_fetch_array($result)){ 
                ?>
                <div class="dap_lo">
                    <div><b><?php echo $rows['name'];?></b></div>
                    <div class="dap_to comt_edit"><?php echo nl2br("$rows[content]"); ?></div>
                    <div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
                    <br><br>
                </div>
            <?php } ?>

            <!--- 댓글 입력 폼 -->
            <div class="dap_ins">
                <form action="reply_ok.php?idx=<?php echo $no; ?>" method="post">
                    <input type="text" name="id" id="id" class="dat_user" size="15" placeholder="아이디">
                    <div style="margin-top:10px; ">
                        <textarea name="content" class="reply_content" id="content" ></textarea>
                        <button id="rep_bt" class="re_bt">댓글</button>
                    </div>
                </form>
            </div>
        </div>
        </body>   
</html>