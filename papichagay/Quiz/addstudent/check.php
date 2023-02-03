<?php

include('connectdb.php');
$page_id = $_POST['page_id'];
$edu = $_POST['edu'];
$year = $_POST['year'];
$group = $_POST['group'];

header('location:search.php?id='.$page_id.'&edu='.$edu.'&year='.$year.'&group='.$group);
?>