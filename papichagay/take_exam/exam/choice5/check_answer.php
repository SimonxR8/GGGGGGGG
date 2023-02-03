<?php
include('connectdb.php');
$by = $_POST['by'];
$student_id = $_POST['student_id'];
$quiz_id = $_POST['quiz_id'];
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$test = 'คะแนน';
$page_id = $_POST['page_id'];

for ($i=1; $i <= $by ; $i++) { 
    $answer = $_POST["anshidden".$i];
     $ans = $_POST["ans".$i];
     if($answer == $ans){
         $score++;
     }
 }

 $sql = "SELECT * FROM ceate_quiz where id = $quiz_id";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);

 $quantity = $row['quantity'];
 $point = $row['points'];

 $total = ($point / $quantity)*$score; 

echo "<script>window.alert('คุณได้ $total คะแนน'); window.location = '../../index_exam/index_exam.php?id=$page_id';</script>";

 $sql = "INSERT INTO score (score,student_id,quiz_id,title,firstname,lastname) values ('$total','$student_id','$quiz_id','$title','$firstname','$lastname')";
 if ($conn->query($sql) === TRUE) {
    echo "โดนเกย์เรียบร้อย";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
