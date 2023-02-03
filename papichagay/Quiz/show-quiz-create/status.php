<?php
include('connectdb.php');
session_start();
        
    $id = $_GET['id'];
    $status = $_GET['status'];
    $member_id = $_GET['ids'];

    // echo $id;
    // echo $status;
        $sql = "UPDATE ceate_quiz SET statuss='$status' WHERE id=$id";
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
        header('location:show-quiz.php?id='.$member_id);
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


$conn->close();


?>