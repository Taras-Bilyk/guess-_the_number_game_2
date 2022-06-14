<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guess the number game</title>
    </head>
    <body>
        <form action="index2.php" method="POST">
            <?php
                session_start();
                // session_unset();
                // $_SESSION["sPoints"] = 100;
                $sPoints = $_SESSION["sPoints"];
                // $answers = [];
                // $answersEncode = json_encode($answers);
                // $_SESSION["sAnswers"] = $answersEncode;
                // $sAnswers = $_SESSION["sAnswers"];
                $number = rand(1, 100);
                if($sPoints == ""){
                    $_SESSION["sPoints"] = 0;
                    echo("<h5>Всього балів: $sPoints</h5>");
                }else{
                    echo("<h5>Всього балів: $sPoints</h5>");
                }
                echo("<a href='tea.php'>купити чай</a>");
                $points = 10;
                $b1 = 0;
                $b2 = 0;
                $b3 = 0;
                // echo("<p>$number</p>");
                echo("<h4>Виберіть діапазон</h4>");
                echo("<select name='answer'>");
                $v = 1;
                for($i = 1; $i <= 10; $i++){
                    $r1 = $i * 10;
                    $p = "$v-$r1";
                    echo("<option value=$p>$v-$r1</option>");
                    $v += 10;
                }
                echo("</select>");

            
                echo("<input type='hidden' name='number' value='$number'>");
                echo("<input type='hidden' name='points' value='$points'>");
                echo("<input type='hidden' name='b1' value='$b1'>");
                echo("<input type='hidden' name='b2' value='$b2'>");
                echo("<input type='hidden' name='b3' value='$b3'>");
                echo("<input type='submit' value='ok'>");
            ?>
        </form>
    </body>
</html>
