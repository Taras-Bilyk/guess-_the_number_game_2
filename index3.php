<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the number</title>
</head>
<body>
    <?php
        session_start();
        echo('<form action="index3.php" method="POST">');
        $number = $_POST["number"];
        $trueRangeStart = $_POST["trueRangeStart"];
        $trueRangeEnd = $_POST["trueRangeEnd"];
        $trueRangeM = $trueRangeStart + 4;
        $answerNumberOf5 = $_POST["answerNumberOf5P"];
        $b1 = $_POST["b1"];
        $b2 = $_POST["b2"];
        $b3 = $_POST["b3"];
        $answers = $_POST["answers"];
        $answersDecode = json_decode($answers);
        array_push($answersDecode, $_POST["answerNumberOf5P"]);

        
        var_dump($_POST);

        // $answersDecode = json_decode($_SESSION["sAnswers"]);

        // $a = $answersDecode[count($answersDecode)-1];
        // echo("<h1>$a</h1>");
        

        if($b3 < 20){
            if(isset($_POST["ok3"])){
                if($answerNumberOf5 > $number){
                    echo("<h4>Число менше ніж $answerNumberOf5</h4>");
                    $b3 += 1;
                }else if ($answerNumberOf5 < $number){
                    echo("<h4>Число більше ніж $answerNumberOf5</h4>");
                    $b3 += 1;
                }else if ($answerNumberOf5 = $number){

                    $bb1 = 0;
                    $bb2 = 0;
                    $bb3 = 0;


                    if($b1 == 1){
                        $bb1 = 10;
                    }else{
                        $bb1 = 0;
                    }
                    if($b2 == 1){
                        $bb2 = 10;
                    }else{
                        $bb2 = 0;
                    }
                    if($b3 == 0){
                        $bb3 = 10;
                    }else if($b3 < 5){
                        $bb3 = 10 - $b3;
                    }else{
                        $bb3 = -20;
                    }

                    $bbT = $bb1 + $bb2 + $bb3;

                    if($bbT < 0){
                        $bbT = 0;
                    }




                    echo("<h4>Ви вгадали число!</h4>");
                    echo("<h4>Число: $answerNumberOf5</h4>");
                    // $b2 = 2;
                    // echo("<h5>b1: $b1</h5>");
                    // echo("<h5>b2: $b2</h5>");
                    // echo("<h5>b3: $b3</h5>");
                    // session_start();
                    $_SESSION["sPoints"] += $bbT;
                    echo("<h4>Ви набрали $bbT балів (з максимально можливих 60-и балів)</h4>");
                    echo("<a href='index.php'>Play again</a>");
                }
                // $answersDecode = json_decode($_POST["answers"]);
                // array_push($answersDecode, $_POST["answerNumberOf5P"]);
                // $answersEncode = json_encode($answersDecode);
            }
    
            if($answerNumberOf5 != $number){
                echo("<select name='answerNumberOf5P'>");

                if($_POST["number"] <= $trueRangeM){
                    for($i = $trueRangeStart; $i <= $trueRangeM; $i++){
                        $eqv = 0;
                        $j = 0;
                        while($j <= count($answersDecode)){
                            if($i == $answersDecode[$j]){
                                $eqv = 1;
                                $j = count($answersDecode) + 1;
                            }
                            $j++;
                        }
                        if($eqv == 1){
                            echo("<option value='$i' disabled>$i</option>");
                        }else{
                            echo("<option value='$i'>$i</option>");
                        }
                    }
                }else{
                    for($i = $trueRangeM+1; $i <= $trueRangeEnd; $i++){
                        $eqv = 0;
                        $j = 0;
                        while($j <= count($answersDecode)){
                            if($i == $answersDecode[$j]){
                                $eqv = 1;
                                $j = count($answersDecode) + 1;
                            }
                            $j++;
                        }
                        if($eqv == 1){
                            echo("<option value='$i' disabled>$i</option>");
                        }else{
                            echo("<option value='$i'>$i</option>");
                        }
                    }
                }
                echo("</select>");
            }

            
            
            // if($_POST["number"] <= $trueRangeM){
            //     for($i = $trueRangeStart; $i <= $trueRangeM; $i++){
            //             echo("<option value=$i>$i</option>");
            //     }
            // }else{
            //     for($i = $trueRangeM+1; $i <= $trueRangeEnd; $i++){
            //         echo("<option value=$i>$i</option>");
            //     }
            // }
            
        }else{
            echo("<h4>Ви не вгадали число</h4>");
            echo("<h4>Спроби закінчились ($b3)</h4>");
            // echo("<h5>b1: $b1</h5>");
            // echo("<h5>b2: $b2</h5>");
            // echo("<h5>b3: $b3</h5>");
            echo("<h4>Ви набрали 0 балів (з максимально можливих 60-и балів)</h4>");
            echo("<a href='index.php'>Play again</a>");
            $b3 += 1;
        }

        $answersEncode = json_encode($answersDecode);

 
        echo("<input type='hidden' name='number' value='$number'>");
        echo("<input type='hidden' name='trueRangeStart' value='$trueRangeStart'>");
        echo("<input type='hidden' name='trueRangeEnd' value='$trueRangeEnd'>");
        echo("<input type='hidden' name='b1' value='$b1'>");
        echo("<input type='hidden' name='b2' value='$b2'>");
        echo("<input type='hidden' name='b3' value='$b3'>");
        echo("<input type='hidden' name='answers' value='$answersEncode'>");
        if($b3 < 21){
            if($answerNumberOf5 != $number){
                echo("<input type='submit' value='ok' name='ok3'>");
            }
        }
        echo("</form>");
    ?>
</body>
</html>
