<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $p = $_SESSION["sPoints"];
        echo("<p>Всього балів: $p</p>");
        echo("<a href='index.php'>Повернутися до гри</a>");
        echo("<p>1 бал = 5 мл води</p>");
    ?>
    <h1>Заварювання чаю</h1>
    <form action="tea.php" method="POST">
        <p>water (ml)</p>
        <input type="range" value="200" min="50" max="1000" step="50" oninput="this.nextElementSibling.value = this.value">
        <input name="water" id="p" type="text" value="50" oninput="this.previousElementSibling.value = this.value">
        <p>sugar (all water)</p>
        <input type="range" value="2" min="0" max="5" step="0.5" oninput="this.nextElementSibling.value = this.value">
        <input name="sugar" id="o1" type="text" value="2" oninput="this.previousElementSibling.value = this.value">
        <p><input type="submit" value="Зробити чай"></p>
    </form>
    <?php error_reporting(2);

        if($_POST){
            $inOneCup = 0;
            $water = $_POST["water"];
            $waterAll = $_POST["water"];
            $sugar = $_POST["sugar"];
            $waterInCups = 0;
            $cups = 1;
            
            if($_SESSION["sPoints"] >= $water/5){
                echo("<p>=============START=============</p>");
                
                echo(var_dump($_POST));
                
                echo("<p>чайник закипів</p>");
                while($water > 0){
                    while($inOneCup < 250 && $water > 0){
                        $inOneCup += 50;
                        $water -= 50;
                        
                        echo("<p>Налито $inOneCup мл води</p>");
                        
                    }
                    if($water == 0){
                        $_SESSION["sPoints"] = $_SESSION["sPoints"] - $inOneCup / 5;
                        echo("<p>вода закінчилась</p>");
                    }else{
                        echo("<p>кружка повна</p>");
                        $_SESSION["sPoints"] = $_SESSION["sPoints"] - $inOneCup / 5;
                    }
                    $sugarInCup = round(($sugar/$waterAll)*$inOneCup, 2);
                    // $sugarInCup = ($sugar/250)*$inOneCup;
                    $teaInCup = (2/250)*$inOneCup;
                    echo("<p>опусаємо чайний пакетик на $teaInCup хв</p>");
                    echo("<p>кидаємо $sugarInCup ч.л. цукру</p>");
                    echo("<p>розмішуємо</p>");
                    echo("$cups чашка чаю готова");
                    if($water > 0){
                        echo("<p>беремо наступну кружку</p>");
                    }
                    $inOneCup = 0;
                    $cups += 1;
                }
                // echo("<p>вода закінчилась</p>");
                echo("<p>смачного чаювання!</p>");
                // echo("<p>Всього балів: $p</p>");

                
                echo("<p>==============END==============</p>");
            }else{
                echo("<h2>Не вистачає грошей, виберіть менше води</h2>");
            }

        }

    ?>
</body>
</html>
