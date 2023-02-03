<?php $id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="../admin_page.css">
    <link rel="icon" href="../../images/technic1.png">
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
</style>
<body>
<nav class="sidebar close">
        <header>
        <div class="image-text">
                <span class="image">
                    <img src="../../images/technic1.png" alt="">
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
                                <a href="edit_list_student.php?id=<?php echo $id?>">
                                <i class='bx bxs-user icon'></i>
                                <span class="text nav-text">โปรไฟล์</span>
                                </a>
                        </li>
                        <li class="nav-link">
                                <a href="edit_img_profile.php?id=<?php echo $id?>">
                                <i class='bx bxs-image-alt icon'></i>
                                <span class="text nav-text">เปลี่ยนรูปโปรไฟล์</span>
                            </a>
                        </li>
                        <li>
                                <a href="edit_Profile.php?id=<?php echo $id?>">
                                <i class='bx bxs-edit icon'></i>
                                <span class="text nav-text">แก้ไขข้อมูลส่วนตัว</span>
                                </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li>
                                <a href="../list_student.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">ออก</span>
                                </a>
                    </li>
                </div>
        </div>
    </nav> 
        <?php
        include('../connectdb.php');
        $sql = "SELECT * FROM tb_member where member_id = '$id' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="dashboard">
            <h1 style="text-align: center;">ข้อมูลส่วนตัว</h1>
            <br>
            <div class='data' style="display: flex; justify-content: center;">
                <img class='image' src='<?php if ($row['member_img'] == '') echo '../../images/img_avatar.png';
                                        else echo '../../student/uploads/' . $row['member_img']; ?>' width='200px' height='166px'>
            </div>
            <div class="main-profile">
                <div>
                    <label for="" class="label-style-name"><b>ชื่อ-นามสกุล</b></label>
                    <input type="text" value="<?php echo $row['member_title'] . " " . $row['member_firstname'] . " " . $row['member_lastname'] ?>" readonly ?>
                </div>
                <div>
                    <label for="" class="label-style-id"><b>รหัสประจำตัวนักศึกษา</b></label>
                    <input type="text" value="<?php echo $row['member_code'] ?>" readonly>
                </div>

                <div>
                    <label class="label-style-tel"><b>เบอร์โทรศัพท์</b></label>
                    <input type="text" value="<?php echo $row['member_mobile']; ?>" readonly>
                </div>

                <div class="box4">
                    <label for="" class="label-style-email"><b>อีเมล</b></label>
                    <input type="text" value="<?php echo $row['member_email'] ?>" readonly>
                </div>

                <div class="box5">
                    <label for="" class="label-style-address"><b>ที่อยู่</b></label>
                    <input type="text" value="<?php echo $row['member_address'] ?>" readonly>
                </div>

                <div class="box6">
                    <label for="" class="label-style-status"><b>สถานะ</b></label>
                    <input type="text" value="<?php echo $row['member_type'] ?>" readonly>
                </div>
            </div>
        </div>
    </section>
    <script src="../../page.js"></script>
</body>

</html>