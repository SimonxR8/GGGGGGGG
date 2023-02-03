<?php

include('connectdb.php');

$id = $_POST['id'];
$name = $_POST['name'];
$id2 = $_GET['id'];
$q_id = $_GET['q_id'];

// $sql = "DELETE FROM question where id = $id and question_img = $name ";
if($conn->query($sql) == true){ 
    echo "success";
    echo "<script>window.alert('เพิ่มคำถามเรียบร้อยแล้ว'); window.location = 'show_pic.php?id=$id2&q_id=$q_id';</script>";
}else{
    echo "error" . $conn->error;
}


?>