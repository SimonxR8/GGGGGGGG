<?php
include('connectdb.php');

    $choice = $_GET['choice'];
    echo $choice;

    $id = $_GET['id'];
    echo $id;

    $page_id = $_GET['page_id'];

    if($choice == "4 ตัวเลือก"){
        header('location:../exam/choice4/exam.php?id='.$id."&page_id=".$page_id);
    }else if ($choice == "5 ตัวเลือก"){
        header('location:../exam/choice5/exam.php?id='.$id."&page_id=".$page_id);
    }


    if(isset($_POST['back'])){
     header('location:../../Page/student/student_page.php');
    }

?>