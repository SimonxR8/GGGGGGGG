<?php

  include('connectdb.php');
    $img = $_POST['filUpload'];
    $img1 = $_POST['filUpload1'];
    $img2 = $_POST['filUpload2'];
    $img3 = $_POST['filUpload3'];
    $img4 = $_POST['filUpload4'];
  
  if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"uploads/".$_FILES["filUpload"]["name"]))
  {
    
    include("connect_db.php");

    session_start();
    $sql = "SELECT * FROM  tb_member where member_code='".$_SESSION['username']."'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);

        $sql = "INSERT INTO question (question_img,choice1_img,choice2_img,choice3_img,choice4_img)
        VALUES ('$img','$img1','$img2','$img3','$img4')";
    
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location:teacher_page.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
  }else{
    header('location:change_img_profile_teacher.php?text=something');
    echo "ไฟล์รูปภาพของคุณขนาดใหญ่เกินไป";
  }
?>