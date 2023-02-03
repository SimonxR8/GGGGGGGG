<?php

include('connectdb.php');
$member_id = $_GET['id'];
echo $member_id;

$sql = "DELETE FROM tb_member WHERE member_id = $member_id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('location:search.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>