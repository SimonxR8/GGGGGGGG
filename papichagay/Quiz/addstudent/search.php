<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="">
    <link rel="icon" href="../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 97%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .box-create {
            height: 50%;
            margin-top: 30px;
            display: block;
            background-color: #e74c3c;
            padding: 10px;
            width: 95%;
            border: 2px solid #fff;
            border-radius: 10px;
        }

        .close {
            background-color: #e74c3c;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            border: none;
            cursor: pointer;
            box-shadow: 0px 0.5px 0px 0px #000;
            border-radius: 2px;
        }

        .open {
            background-color: #2ecc71;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            border: none;
            cursor: pointer;
            box-shadow: 0px 0.5px 0px 0px #000;
            border-radius: 2px;
        }

        .close_1 {
            background-color: #e74c3c;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            border: none;
            box-shadow: 0px 0.5px 0px 0px #000;
            border-radius: 2px;
        }

        .open_1 {
            background-color: #2ecc71;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            border: none;
            box-shadow: 0px 0.5px 0px 0px #000;
            border-radius: 2px;
        }
        .close:active {
            transform: translateY(3px);
            box-shadow: 0px 0.5px 0px 0px #000;
        }

        .open:active {
            transform: translateY(3px);
            box-shadow: 0px 0.5px 0px 0px #000;
        }

        .select {
            font-size: 15px;
            padding: 5px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .open_all {
            font-size: 15px;
            padding: 5px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .close_all {
            font-size: 15px;
            padding: 5px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .select:hover {
            background-color: #2980b9;
        }

        .open_all:hover {
            background-color: #27ae60;
        }

        .close_all:hover {
            background-color: #c0392b;
        }

        .searth {
            border: 2px solid #000;
            padding: 5px;
        }

        .disabled {
            color: #fff;
            background-color: #000;
        }

        .status0 {
            text-decoration: none;
            color: #fff;
            background-color: #e74c3c;
            padding: 5px 10px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.12);
        }

        .status0:hover {
            background-color: #c0392b;
        }

        .status1 {
            text-decoration: none;
            color: #fff;
            background-color: #2ecc71;
            padding: 5px 10px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.12);
        }

        .status1:hover {
            background-color: #27ae60;
        }

        input[type=checkbox] {
            width: 20px;
            height: 20px;
        }

    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    ?>
    <div style="margin-top: 5px; margin-bottom: 5px; float: left; margin-left: 20px;margin-right: 20px;">
        <a href="addstudent.php?id=<?php echo $id?>" class="close_all" style="text-decoration: none; font-size: 20px;" >กลับ</a>
    </div>

    <div style="margin-top: 5px; margin-bottom: 5px; float: right; margin-left: 5px;margin-right: 20px;">
        <button class="select" onclick="checkAll()" style="font-size: 20px;">เลือกทั้งหมด</button>
        <button class="close_all" onclick="cancel()"  style="font-size: 20px;">ยกเลิก</button>
    </div>

    <form action="check_addstudent.php" method="post">

    <div style="margin-top: 5px; margin-bottom: 5px; float: right; margin-left: 20px;">
        <button class="open_all" name="open" style="font-size: 20px;">เปิด</button>
        <button class="close_all" name="close" style="font-size: 20px;">ปิด</button>
    </div>

    <table style="margin: 20px; margin-top: 5px;">
        <tr>
            <th>ลำดับ</th>
            <th>รหัส</th>
            <th>ชื่อ-สกุล</th>
            <th>ระดับการศึกษา</th>
            <th>ปี</th>
            <th>กลุ่ม</th>
            <th>เลือกนักเรียน</th>
            <th>สถานะ</th>
        </tr>
        <?php
        include('connectdb.php');
        $edu = $_GET['edu'];
        $year = $_GET['year'];
        $group = $_GET['group'];

        $sql = "SELECT * FROM tb_member INNER JOIN tb_student_level on tb_member.member_id = tb_student_level.member_id where member_type = 'student' and student_level = '$edu' and student_num = '$year' and student_group = '$group' ";
        $result = mysqli_query($conn, $sql);
        $order = 1;
        $order2 = 0;
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $order++ ?></td>
                <td><?php echo $row['member_code'] ?></td>
                <td><?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?></td>
                <td><?php echo $row['student_level'] ?></td>
                <td><?php echo $row['student_num'] ?></td>
                <td><?php echo $row['student_group'] ?></td>
                <td>
                <?php
                    include('connectdb.php');
                    $sql2 = "SELECT COUNT(member_code) AS SumCount FROM tb_member INNER JOIN tb_student_level on tb_member.member_id = tb_student_level.member_id where member_type = 'student' and student_level = '$edu' and student_num = '$year' and student_group = '$group'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($result2);
                    // echo $row2['SumCount'];
                ?>
                    <?php $order2++?>
                    <input type="checkbox" name="idcheckbox<?php echo $order2?>" >
                    <input type="hidden" name="id<?php echo $order2?>" value="<?php echo $row['member_code'] ?>">
                    <input type="hidden" name="count_all" value="<?php echo $row2['SumCount'] ?>">

                    <input type="hidden" name="page_id" value="<?php echo $id ?>">
                    <input type="hidden" name="edu" value="<?php echo $edu?>">
                    <input type="hidden" name="year" value="<?php echo $year?>">
                    <input type="hidden" name="group" value="<?php echo $group?>">
                </td>
            
                <?php if ($row['member_approve'] == '1') { ?>
                    <td><div class="close_1">ปิด</div></td>
                <?php }else{ ?>
                    <td><div class="open_1">เปิด</div></td>
                <?php } ?>
                </tr>

                <?php } ?>
    </table>
    </form>

    <script>
        function checkAll() {
            var formele = document.forms[0].length;
            for (i = 0; i < formele; i++) {
                document.forms[0].elements[i].checked = true;
            }
        }

        function cancel() {
            var formele = document.forms[0].length;
            for (i = 0; i < formele; i++) {
                document.forms[0].elements[i].checked = false;
            }
        }
    </script>

</body>

</html>