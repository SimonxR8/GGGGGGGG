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
    header("location:login.php");
    exit();
}
?>
<?php $id = $_GET['id']?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="../admin_page.css">
    <link rel="icon" href="../../images/technic1.png">
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
        background: var(--danger);
        color: #fff;
    }
    .button-style-change-profile:hover{
        color: #000;
    }
    .button-style-change-private{
        background: var(--danger);
        color: #fff;
    }
    .button-style-change-private:hover{
        color: #000;
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
        <form action="check_img.php" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="page_id" value="<?php echo $id?>">
            <h1 style="text-align: center;">ข้อมูลส่วนตัว</h1>
            <br>
            <a href=""></a>
            <div class='data' style="display: flex; justify-content: center; margin-bottom: 10px;">
                <img class='image' src='<?php if ($row['member_img'] == '') echo '../../images/img_avatar.png';
                                        else echo '../../student/uploads/' . $row['member_img']; ?>' width='400px' height='333px'>
            </div>
            <?php
                if ($_GET['text'] != "")
                echo "<center><font color='red'>ไฟล์รูปภาพของคุณขนาดใหญ่เกินไป</font></center>"
            ?>
            
                <div style="width: 100%;margin: 10px auto;" >
                    <div style="margin: 0 auto; width: 20%;">
                        <input type="hidden" name="picname" value="<?php echo $row['member_code'] ?>">
                        <input type="file" name="filUpload">
                    </div>
                <div class="dashboard-bottom">
                    <button class="btn button-style-change-profile " type="submit">
                        <!-- <i class='bx bx-edit style-icon-CPF'></i> -->
                        ตกลง
                    </button>
                    </form>
                    <a href="edit_list_student.php?id=<?php echo $id?>" class="btn button-style-change-private">
                        <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                        ยกเลิก
                    </a>
                </div>
            </form>
        </div>
    </section>
    <script src="../../page.js"></script>
</body>

</html>