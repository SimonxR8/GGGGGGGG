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
</head>
<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <a href="show-point.php?id=<?php echo $row['member_id']?>">
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
                            <a href="show-quiz.php?id=<?php echo $row['member_id']?>">
                            <i class="fa-solid fa-plus icon"></i>
                            <span class="text nav-text">จำนวนแบบทดสอบ</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="../create_quiz/create-quiz.php?id=<?php echo $row['member_id']?>">
                            <i class='bx bxs-book-add icon'></i>
                            <span class="text nav-text">สร้างแบบทดสอบ</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="../addstudent/addstudent.php?id=<?php echo $row['member_id']?>">
                            <i class="fas fa-user-plus icon"></i>
                            <span class="text nav-text">เพิ่มนักเรียน</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="show-point.php?id=<?php echo $row['member_id']?>">
                            <i class="fa-solid fa-circle-plus icon"></i>
                            <span class="text nav-text">ดูคะแนน</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>

                <div class="bottom-content">
                    <li>
                        <a href="../../Page/teacher/teacher_page.php">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">ออก</span>
                        </a>
                    </li>
                </div>
        </div>
    </nav> 
    <div class="dashboard">
        <h1 style="text-align: center;">ดูคะแนน</h1>
        <table>
            <tr>
                <th>ชุดที่</th>
                <th>ชื่อแบบทดสอบ</th>
                <th>ประเภท</th>
                <th>จำนวนตัวเลือก</th>
                <th>ระดับการศึกษา</th>
                <th>จำนวนข้อ</th>
                <th>คะแนน</th>
                <th>ดูคะแนน</th>
                
            </tr>
            <form action="allbutton.php" method="post">
                <?php
                $id = $_GET['id'];
                include('connectdb.php');
                $sql = "SELECT * FROM ceate_quiz INNER JOIN tb_member on ceate_quiz.tb_member = tb_member.member_id where tb_member = $id";
                $result = mysqli_query($conn, $sql);
                $order = 1;

                // loop ข้อมูล
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <input type="hidden" value="<?php echo $row['choice']; ?>" name="choice">
                    <tr>
                        <td><?php echo $order++ ?></td>
                        <td><?php echo $row['quizname']; ?></td>
                        <td><?php echo $row['exam']; ?></td>
                        <td><?php echo $row['choice']; ?></td>
                        <td><?php echo $row['edu']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['points']; ?></td>
                       <td><a href="point.php?id=<?php echo $row['id']?>" class="add">ดูคะแนน</ฟ></td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
    <script src="../script.js"></script>
</body>

</html>