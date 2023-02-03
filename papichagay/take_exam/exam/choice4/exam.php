<?php
include('connectdb.php');
session_start();
$sql = "SELECT * FROM tb_member where member_code ='" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$student_id = $_SESSION['username'];
$title = $row['member_title'];
$firstname = $row['member_firstname'];
$lastname = $row['member_lastname'];
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="exam.css">
    <link rel="icon" href="../../images/technic1.png">
    <?php
    $id = $_GET['id'];
    include('connectdb.php');
    $sql = "SELECT COUNT('questionname') AS questioncount FROM question WHERE questionid = '$id' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $width = (int)$row['questioncount'] * 100;
    ?>
    <style>
        .pages {
        display: flex;
        width: <?php echo $width . "%"; ?>;
        box-sizing: border-box;
    }
    .nav-bar{   
        width: 100%;
        height: 10%;
        background: rgba(255, 255, 255);
        margin-bottom: 250px;
    }
    .grid-container {
        display: grid;
        padding: 5px;
        gap: 5px 5px;
        grid-template-columns: auto auto;
    }

    .button-label1{
        background-color: #e21b3c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label2{
        background-color: #1368ce;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label3{
        background-color: #ffa602;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label4{
        background-color: #26890c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    /******************************************************** */
    .button-label105{
        background-color: #e21b3c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label106{
        background-color: #1368ce;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label107{
        background-color: #ffa602;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label108{
        background-color: #26890c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    /********************************************************* */
    .button-label109{
        background-color: #e21b3c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label1010{
        background-color: #1368ce;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label1011{
        background-color: #ffa602;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .button-label1012{
        background-color: #26890c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    /********************************************************** */
    #choice101:checked + .button-label1 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice101:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice102:checked + .button-label2 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice102:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice103:checked + .button-label3 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice103:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice104:checked + .button-label4 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice104::backdrop + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    /******************************************* */
    #choice105:checked + .button-label105 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice105:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice106:checked + .button-label106 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice106:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice107:checked + .button-label107 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice107:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice108:checked + .button-label108 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice108::backdrop + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    /*********************************************************** */
    #choice109:checked + .button-label109 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice109:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice1010:checked + .button-label1010 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice1010:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice1011:checked + .button-label1011{
        background: #2ecc71;
        color: #efefef;
    }
    #choice1011:checked + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    #choice1012:checked + .button-label1012 {
        background: #2ecc71;
        color: #efefef;
    }
    #choice1012::backdrop + .button-label:hover {
        background: #29b765;
        color: #e2e2e2;
    }
    /************************************************************* */
    .hidden {
        display: none;
    }
    

    /* .grid-item1 {
        background-color: #e21b3c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    } 
    .grid-item2 {
        background-color: #1368ce;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .grid-item3 {
        background-color: #ffa602;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }
    .grid-item4 {
        background-color: #26890c;
        padding: 20px;
        font-size: 30px;
        text-align: center;
        border-radius: 5px;
    }*/
    @media only screen and (max-width: 600px){
        .grid-container {
        display: grid;
        gap: 3px 3px;
        grid-template-columns:auto;
    }
    }
    </style>
</head>
<body>
    <div class="container">
        <form action="check_answer.php" method="post">
            <div class="pages">
                <?php
                $id = $_GET['id'];
                $page_id = $_GET['page_id'];
                include('connectdb.php');
                $sql = "SELECT *  FROM question inner join ceate_quiz WHERE questionid = '$id' and ceate_quiz.id = '$id' ";
                $result = mysqli_query($conn, $sql);
                $order = 1;
                $by = 0;
                $count = mysqli_num_rows($result);

                // loop ข้อมูล
                while ($row = mysqli_fetch_assoc($result)) {
                    $by++ ?>
                    <?php if ($order == '1') { ?>
                        <div class="page">
                        <div class="nav-bar">
                            <div>
                                <p class="questionname"><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                            </div>
                                <div class="box-img">
                                    <div class="image-question">
                                        <?php if ($row['question_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['question_img'] != '') { ?>
                                            <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['question_img']; ?>" width='250px' height='150px'>
                                        <?php }?>
                                    </div>
                                </div>
                        </div>
                        <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                        <!-- <div class="testname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>  -->

                        <div>
                            <!-- <button onClick="slide('prev')">Previous</button> -->
                            <button onClick="slide('next')" type="button" class="button-next" style="border: none; color: #fff;">ถัดไป</button>
                        </div>

                        <div class="grid-container">
                            <div class="grid-item1">
                                <div class="bg">
                                <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice101" value="ก" required>
                                <label class="button-label1" for="choice101">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                        ก. <?php echo $row['choice1'] ?> </p> 
                                        <?php if ($row['choice1_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice1_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>
                                </label>                           
                                </div>
                            </div>
                            <div class="grid-item2">
                            <div class="bg">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice102" value="ข" required>
                                    <label class="button-label2" for="choice102">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>
                            <div class="grid-item3">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice103" value="ค" required>
                                    <label class="button-label3" for="choice103">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                            
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>  
                            <div class="grid-item4">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice104" value="ค" required>
                                    <label class="button-label4" for="choice104">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                      
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div> 
                        </div>

                        <!-- <footer>
                            <div class="question">
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                    <label for="">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 
                                        <?php if ($row['choice1_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice1_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>
                                    </label>                                   
                                </div>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for="">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>
                                <br>
                                <div style="display: flex; margin-top: -10px;" >
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for="">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                       
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                    
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for="">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                      
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>


                            </div>
                        </footer> -->
                            
                            
                        </div>
                    <?php } else if ($order < $count) { ?>
                        <div class="page">
                        <div class="nav-bar">
                            <div>
                                <p class="questionname"><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                            </div>
                                <div class="box-img">
                                    <div class="image-question">
                                        <?php if ($row['question_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['question_img'] != '') { ?>
                                            <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['question_img']; ?>" width='250px' height='150px'>
                                        <?php }?>
                                    </div>
                                </div>
                        </div>
                        <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                        <!-- <div class="testname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>  -->

                        <div>
                            <!-- <button onClick="slide('prev')">Previous</button> -->
                            <button onClick="slide('next')" type="button" class="button-next" style="border: none; color: #fff;">ถัดไป</button>
                        </div>

                        <div class="grid-container">
                            <div class="grid-item1">
                                <div class="bg">
                                <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice105" value="ก" required>
                                <label class="button-label105" for="choice105">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                        ก. <?php echo $row['choice1'] ?> </p> 
                                        <?php if ($row['choice1_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice1_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>
                                </label>                           
                                </div>
                            </div>
                            <div class="grid-item2">
                            <div class="bg">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice106" value="ข" required>
                                    <label class="button-label106" for="choice106">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>
                            <div class="grid-item3">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice107" value="ค" required>
                                    <label class="button-label107" for="choice107">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                            
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>  
                            <div class="grid-item4">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice108" value="ค" required>
                                    <label class="button-label108" for="choice108">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                      
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div> 
                        </div>
                        <!-- <div class="page two">
                        <div class="questionname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>
                            <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                            <div class="box-dun"></div>
                            <div class="question">
                                <div class="question-style">

                                 <?php if ($row['question_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['question_img'] != '') { ?>
                                        <p style="margin-bottom: 20px;"> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['question_img']; ?>" width='250px' height='150px'></p>
                                    <?php }?>
                                    
                                    <div style="display: flex; margin: 0px 10px; margin-bottom: -10px; ;margin-top: -20px;">
                                        <p style=""><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                                        <p ></p>
                                    </div>
                                    
                                
                                </div>
                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 
                                      
                                    <?php if ($row['choice1_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice1_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                    <?php }?>
                                    </label>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>

                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>
                                <br>
                                <div style="display: flex; margin-top: -10px;" >
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                    
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                        
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>
                            </div> -->

                            <div>
                                <button onClick="slide('prev')" type="button" class="button-Previous" style="border: none; color: #fff;">ก่อนหน้า</button>
                                <button onClick="slide('next')" type="button" class="button-next" style="border: none; color: #fff;">ถัดไป</button>
                            </div>
                        </div>
                    <?php } else if ($order = $count) { ?>
                        <div class="page">
                        <div class="nav-bar">
                            <div>
                                <p class="questionname"><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                            </div>
                                <div class="box-img">
                                    <div class="image-question">
                                        <?php if ($row['question_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['question_img'] != '') { ?>
                                            <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['question_img']; ?>" width='250px' height='150px'>
                                        <?php }?>
                                    </div>
                                </div>
                        </div>
                        <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                        <!-- <div class="testname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>  -->

                        <div>
                            <!-- <button onClick="slide('prev')">Previous</button> -->
                            <button onClick="slide('next')" type="button" class="button-next" style="border: none; color: #fff;">ถัดไป</button>
                        </div>

                        <div class="grid-container">
                            <div class="grid-item1">
                                <div class="bg">
                                <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice109" value="ก" required>
                                <label class="button-label109" for="choice109">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                        ก. <?php echo $row['choice1'] ?> </p> 
                                        <?php if ($row['choice1_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice1_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>
                                </label>                           
                                </div>
                            </div>
                            <div class="grid-item2">
                            <div class="bg">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice1010" value="ข" required>
                                    <label class="button-label1010" for="choice1010">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>
                            <div class="grid-item3">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice1011" value="ค" required>
                                    <label class="button-label1011" for="choice1011">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                            
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div>  
                            <div class="grid-item4">
                            <div class="bg" style="margin: 0px 10px;">
                                    <!-- <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for=""> -->
                                    <input class="hidden radio-label" type="radio" name="accept-offers ans<?php echo $by ?>" id="choice1012" value="ค" required>
                                    <label class="button-label1012" for="choice1012">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                      
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                            </div> 
                        </div>
                        <!-- <div class="page two">
                        <div class="questionname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>
                            <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                            <div class="box-dun"></div>
                            <div class="question">
                                <div class="question-style">
                                  
                                    <?php if ($row['question_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['question_img'] != '') { ?>
                                        <p style="margin-bottom: 20px;"> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['question_img']; ?>" width='250px' height='150px'></p>
                                    <?php }?>

                                           
                                    <div style="display: flex; margin: 0px 10px; margin-bottom: -10px; margin-top: -20px;">
                                        <p style=""><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                                        <p ></p>
                                    </div>


                                </div>
                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 
                                    
                                    <?php if ($row['choice1_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice1_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice1_img']; ?>" width='150px' height='80px'></p>
                                    <?php }?>

                                    </label>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label for="">
                                        <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                        
                                        <?php if ($row['choice2_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice2_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice2_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>
                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                        
                                        <?php if ($row['choice3_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice3_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice3_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label for="">
                                    <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                       
                                        <?php if ($row['choice4_img'] == '') { ?>
                                            <p> <img class='image'></p>
                                        <?php } ?>
                                        <?php if ($row['choice4_img'] != '') { ?>
                                            <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion4/uploads/' . $row['choice4_img']; ?>" width='150px' height='80px'></p>
                                        <?php }?>

                                    </label>
                                </div>
                                </div>
                            </div> -->
                            <div>
                                <button onClick="slide('prev')" type="button" class="button-Previous" style="border: none; color: #fff;">ก่อนหน้า</button>
                                <button type="submit" onclick="return confirm('คุณต้องการส่งคำตอบหรือไม่!?')" class="button-submit-score" style="border: none; color: #fff;">ส่งคำตอบ</button>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="anshidden<?php echo $by ?>" value="<?php echo $row['answer'] ?>">
                    <input type="hidden" value="<?php echo $id ?>" name="quiz_id">
                    <input type="hidden" value="<?php echo $student_id ?>" name="student_id">
                    <input type="hidden" value="<?php echo $title ?>" name="title">
                    <input type="hidden" value="<?php echo $firstname ?>" name="firstname">
                    <input type="hidden" value="<?php echo $lastname ?>" name="lastname">
                    <input type="hidden" value="<?php echo $page_id ?>" name="page_id">
                <?php } ?>
                <input type="hidden" value="<?php echo $by ?>" name="by">
            </div>
        </form>
    </div>

    <script>
        const pages = document.querySelectorAll(".page");
        const translateAmount = 100;
        let translate = 0;

        slide = (direction) => {

            direction === "next" ? translate -= translateAmount : translate += translateAmount;

            pages.forEach(
                pages => (pages.style.transform = `translateX(${translate}%)`)
            );
        }
    </script>

</body>

</html>