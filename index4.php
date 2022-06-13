<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the number of 5</title>
</head>
<body>
    <?php
        // var_dump($_POST);
        $number = $_POST["number"];
        $answerNumber = $_POST["answerNumber"];
        $trueRangeStart = $_POST["trueRangeStart"];
        $trueRangeEnd = $_POST["trueRangeEnd"];
        $b1 = $_POST["b1"];
        $b2 = $_POST["b2"];
        $b3 = $_POST["b3"];
        if($number == $answerNumber){
            $b2 = 2;

            $bb1 = 0;
            $bb2 = 0;
            $bb3 = 0;


            if($b1 == 1){
                $bb1 = 10;
            }else{
                $bb1 = 0;
            }
            if($b2 == 2){
                $bb2 = 50;
            }else{
                $bb2 = 0;
            }

            $bbT = $bb1 + $bb2;
            echo("<h3>Ви вгадали число!</h3>");
            echo("<h4>Число: $number</h4>");
            // echo("<h5>b1: $b1</h5>");
            // echo("<h5>b2: $b2</h5>");
            // echo("<h5>b3: $b3</h5>");
            echo("<h4>Ви набрали $bbT балів (з максимально можливих 60-и балів)</h4>");
            session_start();
            $_SESSION["sPoints"] += $bbT;
            echo("<a href='index.php'>Play again</a>");
        }else{
            echo("<h4>Ви не вгадали число</h4>");
            echo("<h4>Виберіть число</h4>");
            echo('<form action="index3.php" method="POST">');
            // $action = "index3.php";
            $number = $_POST["number"];
            $trueRangeStart = $_POST["trueRangeStart"];
            $trueRangeEnd = $_POST["trueRangeEnd"];
            $trueRangeM = $trueRangeStart + 4;
            $answerNumberOf5 = $_POST["answerNumberOf5P"];
            if($_POST["number"] <= $trueRangeM && $_POST["answerNumber"] <= $trueRangeM){
                $b2 = 1;
            }else if($_POST["number"] >= $trueRangeM && $_POST["answerNumber"] >= $trueRangeM){
                $b2 = 1;
            }
            

            if(isset($_POST["ok3"])){
                if($answerNumberOf5 > $number){
                    echo("<h4>Число менше ніж $answerNumberOf5</h4>");
                }else if ($answerNumberOf5 < $number){
                    echo("<h4>Число більше ніж $answerNumberOf5</h4>");
                }else if ($answerNumberOf5 = $number){
                    echo("<h4>Ви вгадали число!</h4>");
                    echo("<h4>Число: $answerNumberOf5</h4>");
                    echo("<a href='index.php'>Play again</a>");
                }
            }


            if($answerNumberOf5 != $number){
                echo("<select name='answerNumberOf5P'>");
                if($_POST["number"] <= $trueRangeM){
                    for($i = $trueRangeStart; $i <= $trueRangeM; $i++){
                            echo("<option value=$i>$i</option>");
                    }
                }else{
                    for($i = $trueRangeM+1; $i <= $trueRangeEnd; $i++){
                            echo("<option value=$i>$i</option>");
                    }
                }
                echo("</select>");
            }
    
            echo("<input type='hidden' name='number' value='$number'>");
            echo("<input type='hidden' name='trueRangeStart' value='$trueRangeStart'>");
            echo("<input type='hidden' name='trueRangeEnd' value='$trueRangeEnd'>");
            echo("<input type='hidden' name='b1' value='$b1'>");
            echo("<input type='hidden' name='b2' value='$b2'>");
            echo("<input type='hidden' name='b3' value='$b3'>");
            if($answerNumberOf5 != $number){
                echo("<input type='submit' value='ok' name='ok3'>");
            }
            echo("</form>");
        }
    ?>
</body>
</html>
