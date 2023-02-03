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
        <form action="check_addquestion.php" method="post" enctype="multipart/form-data">
            <div style="background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 30px; margin: 10px; margin-top: -15px; display: flex; justify-content: center; ">
                <div>
                    <div style="display: flex; align-items: center;justify-content: center; margin: 15px;">
                        <label for="" style="margin-right: 5px;">โจทย์ :</label>
                        <textarea required name="questionname" cols="25" rows="8"></textarea>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px;    padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <?php $code = $row['member_code']; 
                        ?>
                        <input type="hidden" name="q_0name" value="<?php echo 'q_'.$id.$code;?>">
                        <input type="hidden" name="q_1name" value="<?php echo 'ch1_'.$id.$code;?>">
                        <input type="hidden" name="q_2name" value="<?php echo 'ch2_'.$id.$code;?>">
                        <input type="hidden" name="q_3name" value="<?php echo 'ch3_'.$id.$code;?>">
                        <input type="hidden" name="q_4name" value="<?php echo 'ch4_'.$id.$code;?>">
                        <input type="hidden" name="q_5name" value="<?php echo 'ch5_'.$id.$code;?>">
                        <input type="file" name="filUpload" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px;">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ก :</label>
                            <textarea name="c-1" cols="25" rows="7"></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">ข :</label>
                            <textarea name="c-2" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-around; margin-top: -5px;">
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload1" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px; margin-top: -15px; padding: 10px; padding-left: 90px;">
                        <label for="img" style="margin-right: 5px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload2" accept="image/gif , image/jepg, image/png">
                    </div>
                    </div>
                    <div style="display: flex; justify-content: space-around; margin: 15px; ">
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ค :</label>
                            <textarea name="c-3" cols="25" rows="7"></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center; margin-right: 30px;">
                            <label for="" style="margin-right: 5px;">ง :</label>
                            <textarea name="c-4" cols="25" rows="7"></textarea>
                        </div>
                        <div style="display: flex; align-items: center;justify-content: center;">
                            <label for="" style="margin-right: 5px;">จ :</label>
                            <textarea name="c-5" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-around; align-items: center; margin-top: -10px;">
                    <div style="display: flex;">
                        <label for="img" style="margin-right: -10px; width: 100px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload3" style="width: 175px;" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex;">
                        <label for="img"style="margin-right: -10px; width: 100px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload4" style="width: 175px;" accept="image/gif , image/jepg, image/png">
                    </div>
                    <div style="display: flex;">
                        <label for="img" style="margin-right: -10px; width: 100px;">เพิ่มรูปภาพ :</label>
                        <input type="hidden" name="picname" value="<?php echo $row['id'] ?>">
                        <input type="file" name="filUpload5" style="width: 175px;" accept="image/gif , image/jepg, image/png">
                    </div>

                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin: 10px;">
                        <label for="" style="margin-right: 5px;">คำตอบ :</label>
                        <select name="answer">
                            <option value="ก">ก</option>
                            <option value="ข">ข</option>
                            <option value="ค">ค</option>
                            <option value="ง">ง</option>
                            <option value="จ">จ</option>
                        </select>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px;">
                        <button type="submit" name="create" class="btn-submit">เพิ่ม</button>
                    </div>
                </div>
            </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="idreal" value="<?php echo $row['id'] ?>">
       
            <div>
                <table>
                    <tr>
                        <th>ข้อที่</th>
                        <th>โจทย์</th>
                        <th>ดูรูปภาพ</th>
                        <th>เฉลย</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                    <form action="check_addquestion.php?order=<?php echo $order - 1?>" method="post">
                        <?php
                        $id = $_GET['id'];
                        include('connectdb.php');
                        $sql = "SELECT * FROM question5 WHERE questionid = '$id' ";
                        $result = mysqli_query($conn, $sql);
                        $order = 1;

                        // loop ข้อมูล
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $order++ ?></td>
                                <td>
                                    <div style="text-align: center;">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id2">
                                        <?php echo $row['questionname'] . "<br>"; ?>
                                        <?php echo "..." . "ก. " . $row['choice1'] . "<br>"; ?>
                                        <?php echo "..." . "ข. " . $row['choice2'] . "<br>"; ?>
                                        <?php echo "..." . "ค. " . $row['choice3'] . "<br>"; ?>
                                        <?php echo "..." . "ง. " . $row['choice4'] . "<br>"; ?>
                                        <?php echo "..." . "จ. " . $row['choice5']; ?>
                                    </div>
                                </td>
                                <td><a href="show_pic.php?id=<?php echo $id ?>&q_id=<?php echo $row['id']?>" class="edit">ดูรูปภาพ</a></td>
                                <td><?php echo $row['answer']; ?></td>
                                <td><a href="./editequestion/editequestion.php?id=<?php echo $row['id'] ?>&back_id=<?php echo $id?>" name="edit" class="edit">แก้ไข<i class="far fa-edit fontawesome"></a></td>
                                <td>
                                    <input type="hidden" name="order" value="<?php echo $order - 1?>">
                                    </form> 
                                    <form action="check_addquestion.php" method="post">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id2">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button type="submit" name="delete" class="remove" onclick="return confirm('คุณต้องการลบหรือไม่');">ลบ<i class="fa-regular fa-trash-can  fontawesome"></button></td>
                                    </form>
                            </tr>
                            <?php } ?>
                        </table>   
                    </form>                      
    </div>
    </div>
    <script src="../../script.js"></script>
</body>
</html>