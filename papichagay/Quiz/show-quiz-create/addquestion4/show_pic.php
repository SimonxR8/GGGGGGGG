<?php
include("./connectdb.php");
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

if ($_SESSION['username'] != $row['member_code'] || $_SESSION['username'] == '') {
    header("location:login.php");
    exit();
}

$id = $_GET['id'];
$q_id = $_GET['q_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="addquestion.css">
    <link rel="icon" href="../../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .remove{
    background-color: #E40000;
    color: #fff;
    font-size: 15px;
    padding: 7px 10px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 2px 2px 3px #000;
    }
    
    .remove:hover{
    background-color: #c62828;
    transition: 0.3s;
    }
    </style>
</head>
<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <a href="">
                        <img src="../../images/technic1.png">
                    </a>
                </span>

                <div class="text logo-text">
                    <span class="name">ระบบแบบทดสอบ</span>
                    <div class="name-header text logo-text">
                        <h3 class="h3-style"><?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?></h3>
                        <hr>
                    </div>
                </div>
                
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link"></li>
                        <li class="nav-link"></li>
                        <li class="nav-link"></li>
                        <li class="nav-link"></li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li>
                        <a href="./addquestion.php?id=<?php echo $id ?>">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">ออก</span>
                        </a>
                    </li>
                </div>
        </div>
    </nav> 

    <div class="dashboard">
        <table style="margin-top: -15px; margin-left: 10px;">
            <tr>
                <th>ข้อ</th>
                <th>รูปภาพ</th>
            </tr>
            <?php

            include('connectdb.php');
            $sql = "SELECT * FROM question WHERE questionid = '$id' and id = '$q_id' ";
            $result = mysqli_query($conn, $sql);
            $order = 1;

            // loop ข้อมูล
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <form action="delete.php?id=<?php echo $id ?>&q_id=<?php echo $q_id ?>" method="post">
                <tr>
                    <td>โจทย์</td>
                    <td> 
                    <?php if ($row['question_img'] == '') { ?>
                            <p> <img class='image'>ไม่มีรูป</p>
                    <?php } ?>
                    <?php if ($row['question_img'] != '') { ?>
                            <p> <img class='image' src="<?php echo 'uploads/' . $row['question_img']; ?>" width='300px' height='180px'></p>
                    <?php }?>
                    </td>

                </tr>
                <tr>
                    <td>ข้อ ก</td>
                    <td> 
                    <?php if ($row['choice1_img'] == '') { ?>
                            <p> <img class='image'>ไม่มีรูป</p>
                    <?php } ?>
                    <?php if ($row['choice1_img'] != '') { ?>
                            <p> <img class='image' src="<?php echo 'uploads/' . $row['choice1_img']; ?>" width='300px' height='180px'></p>
                    <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>ข้อ ข</td>
                    <td> 
                    <?php if ($row['choice2_img'] == '') { ?>
                            <p> <img class='image'>ไม่มีรูป</p>
                    <?php } ?>
                    <?php if ($row['choice2_img'] != '') { ?>
                            <p> <img class='image' src="<?php echo 'uploads/' . $row['choice2_img']; ?>" width='300px' height='180px'></p>
                    <?php }?>
                    </td>
                  
                </tr>
                <tr>
                    <td>ข้อ ค</td>
                    <td> 
                    <?php if ($row['choice3_img'] == '') { ?>
                            <p> <img class='image'>ไม่มีรูป</p>
                    <?php } ?>
                    <?php if ($row['choice3_img'] != '') { ?>
                            <p> <img class='image' src="<?php echo 'uploads/' . $row['choice3_img']; ?>" width='300px' height='180px'></p>
                    <?php }?>
                    </td>
                    
                </tr>
                <tr>
                    <td>ข้อ ง</td>
                    <td> 
                    <?php if ($row['choice4_img'] == '') { ?>
                            <p> <img class='image'>ไม่มีรูป</p>
                    <?php } ?>
                    <?php if ($row['choice4_img'] != '') { ?>
                            <p> <img class='image' src="<?php echo 'uploads/' . $row['choice4_img']; ?>" width='300px' height='180px'></p>
                    <?php }?>
                    </td>

                </tr>
             </form>
            <?php } ?>
        </table>
    </div>
    <script src="../../script.js"></script>
</body>
</html>