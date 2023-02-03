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
    <link rel="stylesheet" href="../show-quiz-create/show-quiz.css">
    <link rel="icon" href="../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
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

        .closee {
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
        .container{
            background-color: rgba(0, 0, 0, 0.22);
            min-height:100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
            margin: 10px;
            width: 50%;
            border-radius: 5px;
            font-size: 25px;
        }
        .sub{
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
    </style>
</head>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <a href="addstudent.php?id=<?php echo $row['member_id']?>">
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
                            <a href="../show-quiz-create/show-quiz.php?id=<?php echo $row['member_id'] ?>">
                            <i class="fa-solid fa-plus icon"></i>
                            <span class="text nav-text">จำนวนแบบทดสอบ</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="../create_quiz/create-quiz.php?id=<?php echo $row['member_id'] ?>">
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
                            <a href="../show-quiz-create/show-point.php?id=<?php echo $row['member_id'] ?>">
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
<body>

    <div class="dashboard">
        <form action="check.php" method="post">
        <h1 style="text-align: center; margin-top: 10px;">เพิ่มนักเรียน</h1>
        <div class="sub">
            <div class="container">
                <div style=" display: flex; margin-bottom: 10px;">
                    <div style="width: 50%;">
                        <label style="text-align: center;">เลือกระดับการศึกษา :</label>
                    </div>
                    <div style="width: 50%;">
                        <select style=" width: 100%; height: 100%;" name="edu">
                            <option value=""></option>
                            <option value="ปวช">ปวช</option>
                            <option value="ปวส">ปวส</option>
                            <option value="ปวสม6">ปวส ม.6</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex; margin-bottom: 10px;">
                <div style="width: 50%;">
                    <label>เลือกปี :</label>
                </div>
                <div style="width: 50%;">
                    <select style="width: 100%; height: 100%; margin-top: 0px;" name="year">
                        <option></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                </div>

                <div style=" display: flex; margin-bottom: 10px;">
                <div style="width: 50%;">
                    <label>เลือกกลุ่ม :</label>
                </div>
                <div style="width: 50%;">
                    <select style="width: 100%; height: 100%;" name="group">
                        <option></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                </div>

                <input type="hidden" name="page_id" value="<?php echo $row['member_id']?>">
                <button class="select" type="submit" name="search" style="font-size: 25px;">ค้นหา</button>
            </div>
            </div>
        </form>
    </div>

    <script src="../script.js"></script>
</body>
</html>