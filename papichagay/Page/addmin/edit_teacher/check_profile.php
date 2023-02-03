<?php

include('../connectdb.php');
session_start();

    if(ISSET($_POST['submit'])){

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone_number = $_POST['phone-number'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $id = $_POST['id'];
                $page_id = $_POST['page_id'];
                
                if($firstname != "" && $lastname != "" && $phone_number != "" && $email != "" && $address != "")
                    $sql = "UPDATE tb_member SET member_firstname = '$firstname' , member_lastname = '$lastname' , member_mobile = '$phone_number' , member_email = '$email' , member_address = '$address' WHERE member_id = '$id'";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully"."<br>";
                    header("location:edit_list_teacher.php?id=$page_id");
                } else {    
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    $conn->close()
?>