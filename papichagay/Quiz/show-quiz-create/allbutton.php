<?php
include('connectdb.php');
session_start();

    $choice = $_GET['choice'];
    echo $choice;

    $id = $_GET['id'];
    echo $id;

    $member_id = $_POST['member_id'];
    $id_post = $_POST['post_id'];

    if($choice == "4 ตัวเลือก"){
        header('location:./addquestion4/addquestion.php?id='.$id);
    }else if ($choice == "5 ตัวเลือก"){
        header('location:./addquestion5/addquestion.php?id='.$id);
    }

    if(ISSET($_POST['edit'])){
        header('location:../show-quiz-create/editquiz/editquestion.php');
    }

    if(ISSET($_POST['delete'])){
        $sql = "SELECT * FROM ceate_quiz";
        $result = $conn->query($sql);
        $row=mysqli_fetch_assoc($result);

            echo $id_post;
            echo $member_id;

            $sql = "DELETE FROM ceate_quiz WHERE id=$id_post";
            	if ($conn->query($sql) === TRUE) {
            	// echo "New record created successfully"."<br>";
                // header('location:show-quiz.php');
                echo "<script>window.alert('ลบข้อสอบเรียบร้อยแล้ว'); window.location = 'show-quiz.php?id=$member_id';</script>";
            	} else {
            	echo "Error: " . $sql . "<br>" . $conn->error;
            	}
        }

    $conn->close();
?>