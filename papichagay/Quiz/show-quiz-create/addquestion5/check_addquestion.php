<?php
include('connectdb.php');
session_start();

if (isset($_POST['create'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM ceate_quiz WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['quantity'];
    $bruh = 1;
    $order = $_POST['order'];

    // echo $order;

    // echo $count;
    // echo "<br>";
    // echo $order;

    $questionname = $_POST['questionname'];
    $choice1 = $_POST['c-1'];
    $choice2 = $_POST['c-2'];
    $choice3 = $_POST['c-3'];
    $choice4 = $_POST['c-4'];
    $choice5 = $_POST['c-5'];
    $answer = $_POST['answer'];
    
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
    }

    if($_FILES["filUpload1"]["name"] != ''){
        $_FILES["filUpload1"]["name"] = $choice1_name.$order_P."_".$bruh++.".jpg";

        $url2 = $_FILES["filUpload1"]["name"];
    }

    if($_FILES["filUpload2"]["name"] != ''){
        $_FILES["filUpload2"]["name"] = $choice2_name.$order_P."_".$bruh++.".jpg";

        $url3 = $_FILES["filUpload2"]["name"];
    }

    if($_FILES["filUpload3"]["name"] != ''){
        $_FILES["filUpload3"]["name"] = $choice3_name.$order_P."_".$bruh++.".jpg";

        $url4 = $_FILES["filUpload3"]["name"];
    }

    if($_FILES["filUpload4"]["name"] != ''){
        $_FILES["filUpload4"]["name"] = $choice4_name.$order_P."_".$bruh++.".jpg";

        $url5 = $_FILES["filUpload4"]["name"];
    }

    if($_FILES["filUpload5"]["name"] != ''){
        $_FILES["filUpload5"]["name"] = $choice5_name.$order_P."_".$bruh++.".jpg";

        $url6 = $_FILES["filUpload5"]["name"];
    }


    if ($order < $count) {
        // echo '1'."<br>";
        // echo $order." "."<"." ".$count;
        $sql = "INSERT INTO question5 (questionname,choice1,choice2,choice3,choice4,choice5,answer,questionid,question_img,choice1_img,choice2_img,choice3_img,choice4_img,choice5_img) VALUES ('$questionname','$choice1','$choice2','$choice3','$choice4','$choice5','$answer','$id','$url1','$url2','$url3','$url4','$url5','$url6')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.alert('เพิ่มคำถามเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$id';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        move_uploaded_file($_FILES["filUpload"]["tmp_name"],"uploads/".$_FILES["filUpload"]["name"]);
        move_uploaded_file($_FILES["filUpload1"]["tmp_name"],"uploads/".$_FILES["filUpload1"]["name"]);
        move_uploaded_file($_FILES["filUpload2"]["tmp_name"],"uploads/".$_FILES["filUpload2"]["name"]);
        move_uploaded_file($_FILES["filUpload3"]["tmp_name"],"uploads/".$_FILES["filUpload3"]["name"]);
        move_uploaded_file($_FILES["filUpload4"]["tmp_name"],"uploads/".$_FILES["filUpload4"]["name"]);
        move_uploaded_file($_FILES["filUpload5"]["tmp_name"],"uploads/".$_FILES["filUpload5"]["name"]);

    } else {
        // echo "2"."<br>";
        // echo $order." "." < "." ".$count;
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('เพิ่มคำถามไม่ได้แล้ว')
                     window.location.href='addquestion.php?id=$id';
                     </SCRIPT>");
    }
}

if (isset($_POST['edit'])) {
    header('location:./editequestion/editequestion.php');
}

if (isset($_POST['delete'])) {
    $sql = "SELECT * FROM question5";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    $id = $_POST['id2'];
    $questionid = $row['questionid'];
    $id2 = $_POST['id'];

    $sql = "DELETE FROM question5 WHERE id=$id";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.alert('ลบคำถามเรียบร้อยแล้ว'); window.location = 'addquestion.php?id=$id2';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
