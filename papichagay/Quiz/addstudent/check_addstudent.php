<?php
include('connectdb.php');
    if(isset($_POST['open'])){
        $C = $_POST['count_all'];

        for ($i=1; $i <= $C; $i++) { 
            if($_POST['idcheckbox'.$i] == 'on'){
                $id = $_POST['id'.$i];
                echo $_POST['id'.$i]." ".$_POST['idcheckbox'.$i].'<br>';
                $sql = "UPDATE tb_member SET member_approve = '2' WHERE member_code = '$id' ";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
        }

        $page_id = $_POST['page_id'];
        $edu = $_POST['edu'];
        $year = $_POST['year'];
        $group = $_POST['group'];

        header('location:search.php?id='.$page_id.'&edu='.$edu.'&year='.$year.'&group='.$group);   
            
    }

    if(isset($_POST['close'])){
  
        $C = $_POST['count_all'];

        for ($i=1; $i <= $C; $i++) { 
            if($_POST['idcheckbox'.$i] == 'on'){
                $id = $_POST['id'.$i];
                echo $_POST['id'.$i]." ".$_POST['idcheckbox'.$i].'<br>';
                $sql = "UPDATE tb_member SET member_approve = '1' WHERE member_code = '$id' ";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
        }

        $page_id = $_POST['page_id'];
        $edu = $_POST['edu'];
        $year = $_POST['year'];
        $group = $_POST['group'];

        header('location:search.php?id='.$page_id.'&edu='.$edu.'&year='.$year.'&group='.$group);   
       
    }

    $conn->close();

?>
