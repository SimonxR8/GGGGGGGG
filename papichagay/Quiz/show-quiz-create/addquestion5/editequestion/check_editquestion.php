<?php
$page_id = $_GET['id'];
$id = $_GET['page_id'];
include('connectdb.php');

if(isset($_POST['create'])){
    $sql = "SELECT * FROM question5 where id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $bruh = 1;

    $questionname = $_POST['questionname'];
    $choice1 = $_POST['c-1'];
    $choice2 = $_POST['c-2'];
    $choice3 = $_POST['c-3'];
    $choice4 = $_POST['c-4'];
    $choice5 = $_POST['c-5'];
    $answer  = $_POST['answer'];
    $questionid = $row['questionid'];
      
    $picname = $_POST["q_0name"];
    $choice1_name = $_POST['q_1name'];
    $choice2_name = $_POST['q_2name'];
    $choice3_name = $_POST['q_3name'];
    $choice4_name = $_POST['q_4name'];
    $choice5_name = $_POST['q_5name'];
    $order_P = $order+1;
    
    if($_FILES["filUpload"]["name"] != ''){
      $_FILES["filUpload"]["name"] = $picname.$order_P.".jpg";

      $url1 = $_FILES["filUpload"]["name"];

      echo "คำถาม"."<br>";

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' ,question_img = '$url1' WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../uploads/".$_FILES["filUpload"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    if($_FILES["filUpload1"]["name"] != ''){
      $_FILES["filUpload1"]["name"] = $choice1_name.$order_P."_".$bruh++.".jpg";
      
      $url2 = $_FILES["filUpload1"]["name"];

      echo "1"."<br>";

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' , choice1_img = '$url2' WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload1"]["tmp_name"],"../uploads/".$_FILES["filUpload1"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    if($_FILES["filUpload2"]["name"] != ''){
      $_FILES["filUpload2"]["name"] = $choice2_name.$order_P."_".$bruh++.".jpg";

      $url3 = $_FILES["filUpload2"]["name"];

      echo "2"."<br>";

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' , choice2_img = '$url3'WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload2"]["tmp_name"],"../uploads/".$_FILES["filUpload2"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    if($_FILES["filUpload3"]["name"] != ''){
      $_FILES["filUpload3"]["name"] = $choice3_name.$order_P."_".$bruh++.".jpg";

      $url4 = $_FILES["filUpload3"]["name"];

      echo "3"."<br>";

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' , choice3_img = '$url4' WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload3"]["tmp_name"],"../uploads/".$_FILES["filUpload3"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    if($_FILES["filUpload4"]["name"] != ''){
      $_FILES["filUpload4"]["name"] = $choice4_name.$order_P."_".$bruh++.".jpg";

      $url5 = $_FILES["filUpload4"]["name"];

      echo "4"."<br>";

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' , choice4_img = '$url5' WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload4"]["tmp_name"],"../uploads/".$_FILES["filUpload4"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    if($_FILES["filUpload5"]["name"] != ''){
      $_FILES["filUpload5"]["name"] = $choice5_name.$order_P."_".$bruh++.".jpg";

      $url6 = $_FILES["filUpload5"]["name"];

      echo "5"."<br>";  

      $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' , choice5_img = '$url6'  WHERE  id = '$id' ";
      move_uploaded_file($_FILES["filUpload5"]["tmp_name"],"../uploads/".$_FILES["filUpload5"]["name"]);

      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }


    // echo $url1."<br>";
    // echo $url2."<br>";
    // echo $url3."<br>";
    // echo $url4."<br>";
    // echo $url5;
    

    $sql = "UPDATE question5 SET questionname = '$questionname', choice1 = '$choice1', choice2 = '$choice2', choice3 = '$choice3', choice4 = '$choice4', choice5 = '$choice5', answer = '$answer' WHERE  id = '$id' ";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    }
    header('location:../addquestion.php?id='.$page_id);
    $conn->close();

?>