<?php
include("../connectdb.php");
session_start();
$sql = "SELECT * FROM tb_member INNER JOIN jointthectn_tb ON tb_member.member_code=jointthectn_tb.member_code where tb_member.member_code='" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

if ($row['member_code'] == '') {
    $sql = "SELECT * FROM tb_member where member_code='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
}

if ($_SESSION['username'] != 'admin' || $_SESSION['username'] == '') {
    header("location:../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="admin_page.css">
    <link rel="icon" href=".././images/technic1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    :root {
        --theme-primary: #6F1E51;
        --theme-sub: #8e44ad;
        --theme-cut: #fff;
        --theme-cut-sub: #f1c40f;
        --theme-fade-f7: #f7f7f7;
        --theme-fade-e5: #e5e5e5;
        --theme-fade-ad: #adadad;
        --danger: #EA2027;
        --warning: #FFC312;
        --success: #1abc9c;
        --info: #3498db;
        --liner1: linear-gradient(to bottom, #929b92, #a8b4b1, #c4ccce, #e2e5e7, #ffffff);
    }

    input[type=text] {
        border: 2px solid #aaa;
        width: 40%;
        font-size: 17px;
        padding: 7px;
        margin: 5px 10px;
        outline: none;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .style-icon-logout {
        margin-right: 5px;
    }

    .dashboard-bottom {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .style-icon-CPF {
        font-size: 1.3rem;
        margin-right: 5px;
    }

    .fa-pen-to-square {
        margin-right: 5px;
    }

    .button-style-change-profile {
        margin-left: 1.5rem;
        margin-right: 10px;
        background: #4fee2d;
        color: #000;

    }

    .button-style-change-private {
        background: #11eedf;
        color: #000;
    }

    .label-style-name {
        font-size: 17px;
        margin-right: 60px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
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

    .edit{
        padding: 5px;
        text-decoration: none;
        color: #fff;
        border-radius: 3px;
        background-color: #3498db;
        font-size: 15px;
    }
    .edit:hover{
        background-color: #2980b9;
    }
    .dashboard-addmin-Settingstu{
        width: 100%;
        overflow: auto;
        background:linear-gradient(to bottom, #e4ebe4, #e8f1ef, #eff5f7, #f8fafc, #ffffff);
        padding: 20px 20px 20px 100px;
        display: flex;
        justify-content: center;
        margin-top: -20px;
    }
</style>

<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../images/technic1.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">ระบบแบบทดสอบ</span>
                    <div class="Admin">
                    <b>Admin</b>
                </div>
                <hr>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="addmin_page.php">
                            <i class='bx bxs-home icon'></i>
                                <span class="text nav-text">หน้าหลัก</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="list_student.php">
                                <i class="fa-solid fa-user-gear icon"></i>
                                <span class="text nav-text">จัดการข้อมูลนักเรียน</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="list_teacher.php">
                                <i class="fa-solid fa-user-gear icon"></i>
                                <span class="text nav-text">จัดการข้อมูลครู</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="logout.php">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">ออกจากระบบ</span>
                        </a>
                    </li>
                </div>
        </div>
    </nav> 
        <div class="dashboard-addmin-Settingstu">
            <table>
                <tr>
                    <th>ลำดับที่</th>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>สถานะ</th>
                    <th>แก้ไขข้อมูล</th>
                </tr>
                <?php
                include('connectdb.php');
                $sql = "SELECT * FROM tb_member WHERE member_type = 'student' ";
                $result = mysqli_query($conn, $sql);
                $order = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $order++ ?></td>
                        <td><?php echo $row['member_code']?></td>
                        <td><?php echo $row['member_title']." ".$row['member_firstname']." "." ".$row['member_lastname']; ?></td>
                        <td><?php echo $row['member_type']?></td>
                        <td><a href="./edit_student/edit_list_student.php?id=<?php echo $row['member_id']?>" class="edit">แก้ไขข้อมูล</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <script src="../page.js"></script>
</body>

</html>