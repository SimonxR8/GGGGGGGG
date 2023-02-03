<?php
$page_id = $_GET['back_id'];
$back_id = $_GET['id'];
include("./connectdb.php");
session_start();
$sql = "SELECT * FROM tb_member INNER JOIN question where questionid = $page_id and id = $back_id and  tb_member.member_code='" . $_SESSION['username'] . "'";
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
                        <img src="../../../images/technic1.png">
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
                        <a href="../addquestion.php?id=<?php echo $page_id;?>">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">ออก</span>
                        </a>
                    </li>
                </div>
        </div>
    </nav> 
      
    <div class="dashboard">
        <form action="check_editquestion.php?id=<?php echo $page_id?>&page_id=<?php echo $back_id?>" method="post" enctype="multipart/form-data">
        <?php $code = $row['member_code']; ?>
        <?php $id = $row['id']?>
            <input type="hidden" name="q_0name" value="<?php echo 'q_'.$page_id.$code;?>">
            <input type="hidden" name="q_1name" value="<?php echo 'ch1_'.$page_id.$code;?>">
            <input type="hidden" name="q_2name" value="<?php echo 'ch2_'.$page_id.$code;?>">
            <input type="hidden" name="q_3name" value="<?php echo 'ch3_'.$page_id.$code;?>">
            <input type="hidden" name="q_4name" value="<?php echo 'ch4_'.$page_id.$code;?>">
            <input type="hidden" name="q_5name" value="<?php echo 'ch5_'.$page_id.$code;?>">

            <div style="background-color: rgba(0, 0, 0, 0.2); border-radius: 5px; padding: 30px; margin: 10px; margin-top: -15px; display: flex; justify-content: center; ">
                <div>
                    <div style="display: flex; align-items: center;justify-content: center; margin: 15px;">
                        <label style="margin-right: 5px;">โจทย์ :</label>
                        <textarea name="questionname" cols="100" rows="8"><?php echo $row['questionname']?></textarea>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px;    padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <!-- <input type="text" name="picname" value="test"> -->
                        <input type="file" name="filUpload" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px;">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ก :</label>
                            <textarea name="c-1" cols="25" rows="7"><?php echo $row['choice1']?></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">ข :</label>
                            <textarea name="c-2" cols="25" rows="7"><?php echo $row['choice2']?></textarea>
                        </div>
                    </div>
                    <div style="display: flex;">
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $id ?>">
                        <input type="file" name="filUpload1" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $id ?>">
                        <input type="file" name="filUpload2" accept="image/gif , image/jepg, image/png">
                    </div>
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px;">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ค :</label>
                            <textarea name="c-3" cols="25" rows="7"><?php echo $row['choice3']?></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">ง :</label>
                            <textarea name="c-4" cols="25" rows="7"><?php echo $row['choice4']?></textarea>
                        </div>
                    </div>
                    <div style="display: flex;">
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $id ?>">
                        <input type="file" name="filUpload3" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px;margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $id ?>">
                        <input type="file" name="filUpload4" accept="image/gif , image/jepg, image/png">
                    </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px;">
                        <label for="" style="margin-right: 5px;">คำตอบ :</label>
                        <select name="answer">
                            <?php
                             $a = "ก";    
                             $b = "ข";    
                             $c = "ค";    
                             $d = "ง";  
                            ?>
                        <?php if ($row['answer'] == $a) { ?>
                            <option value="ก" selected>ก</option>
                            <option value="ข">ข</option>
                            <option value="ค">ค</option>
                            <option value="ง">ง</option>
                        <?php } ?>

                        <?php if ($row['answer'] == $b) { ?>
                            <option value="ก">ก</option>
                            <option value="ข" selected>ข</option>
                            <option value="ค">ค</option>
                            <option value="ง">ง</option>
                        <?php } ?>

                        <?php if ($row['answer'] == $c) { ?>
                            <option value="ก">ก</option>
                            <option value="ข">ข</option>
                            <option value="ค" selected>ค</option>
                            <option value="ง">ง</option>
                        <?php } ?>

                        <?php if ($row['answer'] == $d) { ?>
                            <option value="ก">ก</option>
                            <option value="ข">ข</option>
                            <option value="ค">ค</option>
                            <option value="ง" selected>ง</option>
                        <?php } ?>


                        </select>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button type="submit" name="submit" class="btn-submit">บันทึก</button>
                    </div>
                </div>
            </div>
         
        </form>
    </div>
    </div>
    <script src="../../../script.js"></script>
</body>

</html>