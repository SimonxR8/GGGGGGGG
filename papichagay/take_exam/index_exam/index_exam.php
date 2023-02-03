<?php
$id = $_GET['id'];
include("connectdb.php");
session_start();
$sql = "SELECT * FROM tb_member INNER JOIN tb_student_level ON tb_member.member_id=tb_student_level.member_id where tb_member.member_code='" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$student = $row['student_level'];

if ($row['member_code'] == '') {
    $sql = "SELECT * FROM tb_member where member_code='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $conn->close();
}

if ($_SESSION['username'] != $row['member_code'] || $_SESSION['username'] == '') {
    header("location:../index_exam/index_exam.php?id=$id");
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
    <link rel="stylesheet" href="index_exam.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../images/technic1.png">
</head>
<body>
    <nav>
        <div style="margin-left: 10px;">
            <form action="check_exam.php" method="post">
                <button type="submit" name="back" class="back">
                <i class="fa-solid fa-arrow-rotate-left icon"></i>กลับ</button>
            </form>
        </div>

        <div style="display: flex; align-items: center; margin-right: 10px;">   
        <img class='image' src='<?php if ($row['member_img'] == '') echo '../images/img_avatar.png';
                                        else echo '../../Page/student/uploads/' . $row['member_img']; ?>' width='60px' height='60px' style="margin-right: 10px;">
            <p style="color: #fff;"><?php echo $row['member_title'];?> <?php echo $row['member_firstname'];?> <?php echo $row['member_lastname']?></p>
        </div>
    </nav>
    <div class="main">
            <?php
                include('connectdb.php');
                $sql = "SELECT * FROM tb_member INNER JOIN ceate_quiz  WHERE statuss = '2' AND edu = '$student' and member_id = '$id' ";
                $result = mysqli_query($conn, $sql);
                $order = 1; 
                // echo $student;
                // loop ข้อมูล
                while ($row = mysqli_fetch_assoc($result)) { ?>
            <?php if($row['member_approve'] == 1) { ?>
            <div class="submain">
             <a href="index_exam.php?id=<?php echo $id?>" class="link_exam">
                <div class="box">
                <div class="detail">
                    <label>ชื่อข้อสอบ :</label> 
                    <p><?php echo $row['quizname'];?></p>
                </div>
                <br>

                <?php if($row['exam'] == "สอบมาตราฐานฝีมือแรงงาน") {?>
                <div class="detail-long">
                    <label>ประเภท :</label>
                    <p><?php echo $row['exam'];?></p>
                </div>
                <?php }else { ?>
                <div class="detail">
                    <label>ประเภท :</label> 
                    <p><?php echo $row['exam'];?></p>
                </div>
                <?php } ?>

                <br>
                <div class="detail">
                    <label>ระดับการศึกษา :</label> 
                    <p><?php echo $row['edu'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>จำนวนตัวเลือก :</label> 
                    <p><?php echo $row['choice'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>จำนวนข้อ :</label> 
                    <p><?php echo $row['quantity'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>คะแนน :</label> 
                    <p><?php echo $row['points'];?></p>
                </div>
                <br>
                <!-- <?php if($row['statuss'] == "0") {?>
                    <label class="status1">สถานะ</label>
                    <label class="close">ปิด</label>
                    <input type="hidden" value="<?php echo $row['statuss']?>">
                <?php }else { ?>
                    <label class="status2">สถานะ</label>
                    <label class="open">เปิด</label>        
                    <input type="hidden" value="<?php echo $row['statuss']?>">
                <?php } ?> -->
            </div>
            </a>
        </div>     
        <?php }else{ ?>
            <div class="submain">
             <a href="check_exam.php?choice=<?php echo $row['choice'] ?>&id=<?php echo $row['id'] ?>&page_id=<?php echo $id?>" class="link_exam">
                <div class="box">
                <div class="detail">
                    <label>ชื่อข้อสอบ :</label> 
                    <p><?php echo $row['quizname'];?></p>
                </div>
                <br>

                <?php if($row['exam'] == "สอบมาตราฐานฝีมือแรงงาน") {?>
                <div class="detail-long">
                    <label>ประเภท :</label>
                    <p><?php echo $row['exam'];?></p>
                </div>
                <?php }else { ?>
                <div class="detail">
                    <label>ประเภท :</label> 
                    <p><?php echo $row['exam'];?></p>
                </div>
                <?php } ?>

                <br>
                <div class="detail">
                    <label>ระดับการศึกษา :</label> 
                    <p><?php echo $row['edu'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>จำนวนตัวเลือก :</label> 
                    <p><?php echo $row['choice'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>จำนวนข้อ :</label> 
                    <p><?php echo $row['quantity'];?></p>
                </div>
                <br>
                <div class="detail">
                    <label>คะแนน :</label> 
                    <p><?php echo $row['points'];?></p>
                </div>
                <br>
                <!-- <?php if($row['statuss'] == "0") {?>
                    <label class="status1">สถานะ</label>
                    <label class="close">ปิด</label>
                    <input type="hidden" value="<?php echo $row['statuss']?>">
                <?php }else { ?>
                    <label class="status2">สถานะ</label>
                    <label class="open">เปิด</label>        
                    <input type="hidden" value="<?php echo $row['statuss']?>">
                <?php } ?> -->
            </div>
            </a>
        </div>     
        <?php } ?>
        <?php } ?>
    </div>
</body>
</html>