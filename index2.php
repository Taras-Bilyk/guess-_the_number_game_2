<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index4.php" method="POST">
        <?php

            $number = $_POST["number"];
            $b1 = $_POST["b1"];
            $b2 = $_POST["b2"];
            $b3 = $_POST["b3"];
            // var_dump($_POST["number"]);
            // var_dump($_POST["answer"]);
            // var_dump($_POST);

            $rangeStart = $_POST["answer"][0].$_POST["answer"][1];
            if($rangeStart == "1-"){
                $rangeStart = $_POST["answer"][0];

            }

            $rangeEnd = $rangeStart + 9;
            

            if($_POST["number"] >= $rangeStart && $_POST["number"] <= $rangeEnd){
                echo("<h3>Ви вгадали діапазон</h3>");
                echo("<h3>Виберіть число</h3>");
                $points = $_POST["points"];
                $b1 = 1;
            }else{
                echo("<h3>Ви не вгадали діапазон</h3>");
                echo("<h3>Виберіть число з правильного діпазона</h3>");
                $points = $_POST["points"] - 2;
            }

            $trueRangeStart = floor(($_POST["number"]-1)/10)*10+1;
            $trueRangeEnd = $trueRangeStart + 9;

            // echo("<h1>$rangeStart</h1>");
            // echo("<h3>$rangeEnd</h3>");
            // echo("<h5>$trueRangeStart</h5>");
            // echo("<h5>$trueRangeEnd</h5>");

            
            echo("<select name='answerNumber'>");

            for($i = $trueRangeStart; $i <= $trueRangeEnd; $i++){
                echo("<option value=$i>$i</option>");
            }

            echo("</select>");

            echo("<input type='hidden' name='number' value='$number'>");
            echo("<input type='hidden' name='trueRangeStart' value='$trueRangeStart'>");
            echo("<input type='hidden' name='trueRangeEnd' value='$trueRangeEnd'>");
            echo("<input type='hidden' name='points' value='$points'>");
            echo("<input type='hidden' name='b1' value='$b1'>");
            echo("<input type='hidden' name='b2' value='$b2'>");
            echo("<input type='hidden' name='b3' value='$b3'>");
            echo("<input type='submit' value='ok'>");
        ?>
    </form>
</body>
</html>
