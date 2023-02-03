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
    <link rel="stylesheet" href="editquestion.css">
    <link rel="icon" href="../../images/technic1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                        <a href="../show-quiz.php?id=<?php echo $row['member_id']?>">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">ออก</span>
                        </a>
                    </li>
                </div>
        </div>
    </nav> 

<div class="dashboard">
        <div class="box-create" style="padding: 10px; color: #101010   ;">
            <h1 style="text-align: center;">แก้ไขข้อสอบ</h1>
            <div style="margin: 20px; text-align: center; margin-top: 10px;">
                <form action="check_editquestion.php" method="POST">
                    <?php

                    $id = $_GET['id'];
                    include('connectdb.php');
                    $sql = "SELECT * FROM ceate_quiz WHERE id = '$id' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <div>
                        <label for="">ชื่อแบบทดสอบ :</label>
                        <input type="text" name="quizname" value="<?php echo $row['quizname']?>" required>
                    </div>

                    <div style="margin-top: 10px;">
                        <label for="">ประเภท : </label>
                        <?php
                            if($row['exam'] == 'ทดสอบย่อย'){
                            echo "<input type='radio' name='exam' value='ทดสอบย่อย' required style='font-size: 20px;' checked>";
                            echo "<label>ทดสอบย่อย</label>";
                            echo "<input type='radio' name='exam' value='สอบกลางภาค' required>";
                            echo "<label>สอบกลางภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบปลายภาค' required>";
                            echo "<label>สอบปลายภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบมาตราฐานฝีมือแรงงาน' required>";
                            echo "<label>สอบมาตราฐานฝีมือแรงงาน</label>";
                            }elseif($row['exam'] == 'สอบกลางภาค'){
                            echo "<input type='radio' name='exam' value='ทดสอบย่อย' required style='font-size: 20px;' >";
                            echo "<label>ทดสอบย่อย</label>";
                            echo "<input type='radio' name='exam' value='สอบกลางภาค' required checked>";
                            echo "<label>สอบกลางภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบปลายภาค' required>";
                            echo "<label>สอบปลายภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบมาตราฐานฝีมือแรงงาน' required>";
                            echo "<label>สอบมาตราฐานฝีมือแรงงาน</label>";
                            }elseif($row['exam'] == 'สอบปลายภาค'){
                            echo "<input type='radio' name='exam' value='ทดสอบย่อย' required style='font-size: 20px;' >";
                            echo "<label>ทดสอบย่อย</label>";
                            echo "<input type='radio' name='exam' value='สอบกลางภาค' required >";
                            echo "<label>สอบกลางภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบปลายภาค' required checked>";
                            echo "<label>สอบปลายภาค</label>";
                            echo "<input type='radio' name='exam' value='สอบมาตราฐานฝีมือแรงงาน' required>";
                            echo "<label>สอบมาตราฐานฝีมือแรงงาน</label>";
                            }elseif($row['exam'] == 'สอบมาตราฐานฝีมือแรงงาน'){
                                echo "<input type='radio' name='exam' value='ทดสอบย่อย' required style='font-size: 20px;' >";
                                echo "<label>ทดสอบย่อย</label>";
                                echo "<input type='radio' name='exam' value='สอบกลางภาค' required>";
                                echo "<label>สอบกลางภาค</label>";
                                echo "<input type='radio' name='exam' value='สอบปลายภาค' required>";
                                echo "<label>สอบปลายภาค</label>";
                                echo "<input type='radio' name='exam' value='สอบมาตราฐานฝีมือแรงงาน' required checked>";
                                echo "<label>สอบมาตราฐานฝีมือแรงงาน</label>";
                            }
                        ?>
                        
                    </div>

                    <div style="margin-top: 10px;">
                        <label for="">ระดับการศึกษา : </label>
                        <?php
                        if($row['edu'] == "ปวช"){
                            echo "<input type='radio' name='edu' value='ปวช' required checked>";
                            echo "<label>ปวช</label>";
                            echo "<input type='radio' name='edu' value='ปวส' required>";
                            echo "<label>ปวส</label>";
                        }elseif($row['edu'] == "ปวส"){
                            echo "<input type='radio' name='edu' value='ปวช' required>";
                            echo "<label>ปวช</label>";
                            echo "<input type='radio' name='edu' value='ปวส' required checked>";
                            echo "<label>ปวส</label>";
                        }
                        ?>
                    </div>

                    <div style="margin-top: 10px;">
                        <label for="">จำนวนตัวเลือก : </label>
                        <?php
                        if($row['choice'] == "4 ตัวเลือก"){
                            echo "<input type='radio' name='choice' value='4 ตัวเลือก' required checked>";
                            echo "<label>4 ตัวเลือก</label>";
                            echo "<input type='radio' name='choice' value='5 ตัวเลือก' required>";
                            echo "<label>5 ตัวเลือก</label>";
                        }elseif($row['choice'] == "5 ตัวเลือก"){
                            echo "<input type='radio' name='choice' value='4 ตัวเลือก' required>";
                            echo "<label>4 ตัวเลือก</label>";
                            echo "<input type='radio' name='choice' value='5 ตัวเลือก' required checked>";
                            echo "<label>5 ตัวเลือก</label>";
                        }
                        ?>
                    </div>

                    <div style="margin-top: 10px;">
                        <label for="">จำนวน : </label>
                        <select name="quantity" required>
                            <?php
                            $quantity = $row['quantity'];
                            for ($i = 1; $i <= 100; $i++) {
                                echo "<option value='$i'";
                                echo ($row['quantity'] == $i) ? " selected='selected'" : "";
                                echo ">$i" . "</option>";
                            }
                            ?>
                        </select>
                        <label for="">คะแนน : </label>
                        <select name="point"  required>
                            <?php
                            $point = $row['points'];
                            for ($i = 1; $i <= 100; $i++) {
                                echo "<option value='$i'";
                                echo ($row['points'] == $i) ? " selected='selected'" : "";
                                echo ">$i" . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn-submit">บันทึก</button>
                    </div>
                 </div>
                 <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                 <input type="hidden" value="<?php echo $row['tb_member']?>" name="tb_member">
            </form>
        </div>
    </div>
    <script src="../../script.js"></script>
</body>

</html>