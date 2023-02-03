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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="show-point.css">
    <link rel="icon" href="../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        
    </style>
</head>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <a href="teacher_page.php">
                    <img src="../images/technic1.png">
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
                <li class="nav-link">
                    <a onclick="window.print()" style="cursor: pointer;" id="print">
                        <i class="fa-solid fa-print icon"></i>
                        <span class="text nav-text">ปริ้น</span>
                    </a>
                </li>
                <li class="nav-link"></li>
                <li class="nav-link"></li>
                <li class="nav-link"></li>
            </ul>
        </div>
        <div class="bottom-content">
            <li>
                <a href="show-point.php?id=<?php echo $row['member_id'] ?>">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">ออก</span>
                </a>
            </li>
        </div>
    </div>
</nav>

<body>
    <div class="dashboard">
        <h1 style="text-align: center; margin: 10px;" class="headerss">ชื่อแบบทดสอบ</h1>
        <table>
            <?php
            $id = $_GET['id'];
            include('connectdb.php');
            $sql2 = "SELECT * FROM ceate_quiz where id = '$id' ";
            $result2 = mysqli_query($conn, $sql2);
            $show = mysqli_fetch_array($result2);
            
            $sql3 = "SELECT * FROM score where quiz_id = '$id' ";
            $result3 = mysqli_query($conn, $sql3);
            $count = mysqli_num_rows($result3);

            ?>
            <tr>
                <th>ชื่อแบบทดสอบ</th>
                <th>ประเภท</th>
                <th>จำนวนตัวเลือก</th>
                <th>ระดับการศึกษา</th>
                <th>จำนวนข้อ</th>
                <th>คะแนน</th>
                <th>จำนวนผู้เข้าทดสอบ</th>
            </tr>
            <tr>
                <td><?php echo $show['quizname']; ?></td>
                <td><?php echo $show['exam']; ?></td>
                <td><?php echo $show['choice']; ?></td>
                <td><?php echo $show['edu']; ?></td>
                <td><?php echo $show['quantity']; ?></td>
                <td><?php echo $show['points']; ?></td>
                <td><?php echo $count ?></td>
            </tr>
        </table>

        <h1 style="text-align: center; margin: 10px;">รายชื่อนักเรียนที่เข้าทำแบบทดสอบ</h1>
        <table class="show-table">
            <tr>
                <th>ลำดับ</th>
                <th>รหัสประจำตัว</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>คะแนน</th>
                <th class="delete">ลบ</th>
            </tr>
            <?php
            $member = $_GET['member'];
            include('connectdb.php');
            $sql = "SELECT * FROM score where quiz_id = '$id' order by student_id asc ";
            $result = mysqli_query($conn, $sql);
            $order = 1;

            // loop ข้อมูล
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $order++ ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['score']; ?> คะแนน</td>
                    <td class="delete">
                        <form action="delete_point.php" method="post">
                            <input type="hidden" value="<?php echo $id ?>" name="id2">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id1">
                            <button type="submit" name="delete_point" class="remove" onclick="return confirm('คุณต้องการลบหรือไม่!?')">ลบ<i class="fa-regular fa-trash-can fontawesome"></i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>    
    </div>
    <script src="../script.js">
    </script>
</body>

</html>