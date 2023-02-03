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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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

    .label-style-name{
        font-size: 17px;
        margin-right: 60px;
    }

    .Admin{
        display: flex; 
        align-items: center;
        justify-content: center;
        color: var(--text-color);
    }

    .box{
        background-color: #e74c3c;
        width: 80%;
        height: 570px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 2px 2px 7px #000;
        margin-left: 230px;
        margin-top: -15px;
    }
    .box-item{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        font-size: 2.5rem;
    }

    .dashboard-addmin{
        overflow: auto;
        background:linear-gradient(to bottom, #e4ebe4, #e8f1ef, #eff5f7, #f8fafc, #ffffff);
        padding: 30px;
        display: flex;
        justify-content: center;
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
    <!-- <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar">
            <div class="sidebar-top">
                <div class="sb-logo" style="margin-bottom: 50px;">
                    <a href="addmin_page.php">
                        <img src="../images/technic1.png">
                    </a>    
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <h1 style="color: #fff;">admin</h1>
                    </div>
                    <hr>
                </div>
                <ul class="sb-ul">
                    <li>
                        <a href="addmin_page.php"><i class="fa-solid fa-user fontawesome"></i></i>หน้าหลัก</a>
                    </li>
                    
                    <li>
                        <a href="list_student.php">
                            <i class="fa-solid fa-image-portrait fontawesome"></i>
                                จัดการข้อมูลนักเรียน
                             </a>
                    </li>
                    <li>
                        <a href="list_teacher.php">
                            <i class="fa-solid fa-pen-to-square fontawesome"></i>
                                จัดการข้อมูลครู
                            </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-bottom">
                <a href="../../login/login.php" class="btn btn-logout">
                    <i class="fa-solid fa-right-from-bracket style-icon-logout"></i>
                    ออกจากระบบ</a>
            </div>
        </div> -->
        <div class="dashboard-addmin">
            <div class="box">
                <div class="box-item">
                    <p>Admin</p>
                    <p>จัดการเกี่ยวกับข้อมูลนักเรียนนักศึกษาและอาจารย์</p>
                </div>
            </div>
        </div>
    <script src="../page.js"></script>
</body>

</html>