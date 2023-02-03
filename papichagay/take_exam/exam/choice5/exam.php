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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <?php
    $id = $_GET['id'];
    $page_id = $_GET['page_id'];
    include('connectdb.php');
    $sql = "SELECT COUNT('questionname') AS questioncount FROM question5 WHERE questionid = '$id' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $width = (int)$row['questioncount'] * 100;
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Sarabun&display=swap');
        .pages {
            display: flex;
            width: <?php echo $width . "%"; ?>;
            box-sizing: border-box;
        }

        .question {
            padding: 25px;
            border-radius: 5px;
            font-size: 20px;
            background-color: rgba(0, 0, 0, 0.9);
            width: auto;
            margin-top: -50px;
        }

        input[type=radio] {
            position: absolute;
            width: 1.5rem;
            height: 2rem;
            accent-color: red;
            cursor: pointer;
            margin: 0px 0px 0px 20px;
        }

        label{
            width: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            border: 2px solid #fff;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            padding-left: 50px;
            transition: 250ms;
        }

        input[type=radio]:checked + label{
            border: 2px solid red;
            background-color: #000;
        }
    
        .bg {
            position: relative;
            display: flex;
            align-items: center;
            margin-top: -10px;
            width: 400px;
            
        }

        .two {
            background: linear-gradient(to bottom, #e4ebe4, #e8f1ef, #eff5f7, #f8fafc, #ffffff);
        }

        .num_count {
            background: black;
            width: 45px;
            height: 35px;
            margin-left: 97.7vw;
            margin-right: 50px;
            margin-top: -42vw;
            font-size: 1.4rem;
            text-align: center;
            position: fixed;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .box-dun {
            width: 100%;
            height: 45px;
        }

        .question-style {
            text-align: center;
        }

        .questionname{
            font-family: 'Poppins', sans-serif;
            width: auto;
            background-color: rgba(0, 0, 0, 0.15);
            text-align: center;
            padding: 10px;
            font-size: 3rem;
            border-radius: 10px;
            color: #000;
            /* -webkit-text-stroke: 2px #000; */
        }

    </style>
</head>

<body>
    <div class="container">
        <form action="check_answer.php" method="post">
            <div class="pages">
                <?php
                $id = $_GET['id'];
                include('connectdb.php');
                $sql = "SELECT * FROM question5 inner join ceate_quiz WHERE questionid = '$id' and ceate_quiz.id = '$id'  ";
                $result = mysqli_query($conn, $sql);
                $order = 1;
                $by = 0;
                $count = mysqli_num_rows($result);

                // loop ข้อมูล
                while ($row = mysqli_fetch_assoc($result)) {
                    $by++ ?>
                    <?php if ($order == '1') { ?>
                        <div class="page two">
                        <div class="questionname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>
                            <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                            <div class="box-dun"></div>
                            <div class="question" style="text-align: center;">
                                
                                <?php if ($row['question_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['question_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['question_img']; ?>" width='250px' height='150px'></p>
                                <?php }?>

                                <div style="display: flex; margin: 0px 10px; margin-bottom: -10px; ; margin-top: -20px;">
                                        <p style="margin-right: 5px;"><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                                        <p ></p>
                                </div>
                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required width="100px" height="100px">
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 

                                    <?php if ($row['choice1_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice1_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice1_img']; ?>" width='150px' height='50px'></p>
                                    <?php }?>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>

                                    <?php if ($row['choice2_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice2_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice2_img']; ?>" width='150px' height='50px'></p>
                                    <?php }?>

                                </div>
                                </div>
                                <br>
                                <div style="display: flex;margin-top: -10px;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                       
                                    <?php if ($row['choice3_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice3_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice3_img']; ?>" width='150px' height='50px'></p>
                                    <?php }?>

                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>

                                    <?php if ($row['choice4_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice4_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice4_img']; ?>" width='150px' height='50px'></p>
                                    <?php }?>

                                </div>
                                </div>
                                <br>
                                <div class="bg" style="margin: 0px 10px; width: 98%; margin-top: -10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="จ" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            จ. <?php echo $row['choice5'] ?> 
                                        </p>
                                       
                                    <?php if ($row['choice5_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                    <?php } ?>
                                    <?php if ($row['choice5_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice5_img']; ?>" width='150px' height='50px'></p>
                                    <?php }?>

                                </div>
                            </div>
                            <div>
                                <!-- <button onClick="slide('prev')">Previous</button> -->
                                <button onClick="slide('next')" type="button" class="button-next">ถัดไป</button>
                            </div>
                        </div>
                    <?php } else if ($order < $count) { ?>
                        <div class="page two">
                        <div class="questionname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>
                            <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                            <div class="box-dun"></div>
                            <div class="question" style="text-align: center;">

                                <?php if ($row['question_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['question_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['question_img']; ?>" width='250px' height='150px'></p>
                                <?php }?>

                                <div style="display: flex; margin: 0px 10px; margin-bottom: -10px; ; margin-top: -20px;">
                                        <p style=""><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                                        <p ></p>
                                </div>

                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required width="100px" height="100px">
                                    <label> <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 
                                    
                                <?php if ($row['choice1_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice1_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice1_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
 
                                <?php if ($row['choice2_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice2_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice2_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                </div>
                                <br>
                                <div style="display: flex; margin-top: -10px;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                
                                <?php if ($row['choice3_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice3_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice3_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>

                                <?php if ($row['choice4_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice4_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice4_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px; width: 98%; margin-top: -10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="จ" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            จ. <?php echo $row['choice5'] ?> 
                                        </p>

                                <?php if ($row['choice5_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice5_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice5_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                            </div>
                            <div>
                                <button onClick="slide('prev')" type="button" class="button-Previous">ก่อนหน้า</button>
                                <button onClick="slide('next')" type="button" class="button-next">ถัดไป</button>
                            </div>
                        </div>
                    <?php } else if ($order = $count) { ?>
                        <div class="page two">
                        <div class="questionname">ชื่อแบบทดสอบ : <?php echo $row['quizname']?></div>
                            <div class="num_count"><?php echo $by ?>/<?php echo $count ?></div>
                            <div class="box-dun"></div>
                            <div class="question" style="text-align: center;">
                            
                                <?php if ($row['question_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['question_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['question_img']; ?>" width='250px' height='150px'></p>
                                <?php }?>

                                <div style="display: flex; margin: 0px 10px; margin-bottom: -10px; ; margin-top: -20px;">
                                        <p style=""><?php echo $order++; ?>. <?php echo $row['questionname']; ?></p>
                                        <p ></p>
                                </div> 

                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ก" required width="100px" height="100px">
                                    <label> <p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">ก. <?php echo $row['choice1'] ?> </p> 
                                     
                                <?php if ($row['choice1_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice1_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice1_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ข. <?php echo $row['choice2'] ?> 
                                        </p>
                                     
                                <?php if ($row['choice2_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice2_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice2_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                </div>
                                <br>
                                <div style="display: flex;">
                                <div class="bg" style="margin: 0px 10px; margin-top: -10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ค. <?php echo $row['choice3'] ?> 
                                        </p>
                                     
                                <?php if ($row['choice3_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice3_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice3_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px;">
                                    <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            ง. <?php echo $row['choice4'] ?> 
                                        </p>
                                        
                                <?php if ($row['choice4_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice4_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice4_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>

                                </div>
                                </div>
                                <br>
                                
                                <div class="bg" style="margin: 0px 10px; width: 98%; margin-top: -10px;" >
                                    <input type="radio" name="ans<?php echo $by ?>" value="จ" required>
                                    <label><p style="display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                            จ. <?php echo $row['choice5'] ?> 
                                        </p>
                                     
                                <?php if ($row['choice5_img'] == '') { ?>
                                        <p> <img class='image'></p>
                                <?php } ?>
                                <?php if ($row['choice5_img'] != '') { ?>
                                        <p> <img class='image' src="<?php echo '../../../Quiz/show-quiz-create/addquestion5/uploads/' . $row['choice5_img']; ?>" width='150px' height='50px'></p>
                                <?php }?>
                                    
                                </div>
                            </div>
                            <div>
                                <button onClick="slide('prev')" type="button" class="button-Previous">ก่อนหน้า</button>
                                <button type="submit" onclick="return confirm('คุณต้องการส่งคำตอบหรือไม่!?')" class="button-submit-score">ส่งคำตอบ</button>
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