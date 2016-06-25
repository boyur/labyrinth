<?php
$map = [[0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
        [0,0,1,1,1,0,1,0,0,0,0,0,1,1,1,0,1,0,0,0],
        [0,0,1,0,0,1,1,0,1,0,0,0,1,0,0,1,1,0,1,0],
        [0,1,1,1,1,1,0,0,1,1,1,1,1,1,1,0,0,1,0,0],
        [0,0,0,0,1,0,1,1,1,0,0,1,0,1,1,1,1,0,0,0],
        [0,1,0,1,1,1,1,0,0,0,1,0,1,1,1,1,0,0,0,0],
        [0,1,1,1,0,0,1,1,1,0,1,1,1,0,0,1,1,1,0,0],
        [0,1,0,0,0,0,1,0,1,1,1,0,0,0,0,1,0,1,0,0],
        [0,1,1,1,1,1,1,0,1,0,0,1,1,1,1,1,1,0,1,0],
        [0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0],
        [0,0,0,0,1,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0],
        [0,0,1,1,1,0,1,0,0,0,0,0,1,1,1,0,1,0,0,0],
        [0,0,1,0,0,1,1,0,1,0,0,0,1,0,0,1,1,0,1,0],
        [0,1,1,1,1,1,0,0,1,0,1,1,1,1,1,0,0,1,0,0],
        [0,0,0,0,1,0,1,1,1,0,0,1,0,1,1,1,1,0,0,0],
        [0,1,0,1,1,1,1,0,0,0,1,0,1,1,1,1,0,0,0,0],
        [0,1,1,1,0,0,1,1,1,1,1,1,1,0,0,1,1,1,0,0],
        [0,1,0,0,0,0,1,0,1,0,1,0,0,0,0,1,0,1,0,0],
        [0,1,1,1,1,1,1,0,1,0,0,1,1,1,1,1,1,0,1,0],
        [0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]];

$x = 4;
$y = 19;
$map[$y][$x] = "&uArr;";
$direction = "up";
$counter = 0;

//while ($map[0][4] !== "&uArr;"){
//    $counter++;
//    echo "Шаг $counter";
//
//    switch ($direction){
//        case "up":
//            if(!$map[$y][$x+1] && !$map[$y-1][$x+1] && $map[$y-1][$x]){
//
//                $map[$y][$x] = true;
//                $y--;
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//
//            }elseif($map[$y-1][$x+1] && !$map[$y][$x+1]){
//
//                $direction = "right";
//                $map[$y][$x] = true;
//                $y--;
//                $map[$y][$x] = "&rArr;";
//                displayMap($map);
//                $counter++;
//                echo "Шаг $counter";
//                $map[$y][$x] = true;
//                $x++;
//                $map[$y][$x] = "&rArr;";
//                displayMap($map);
//
//            }elseif($map[$y][$x+1]){
//
//                $direction = "right";
//                $map[$y][$x] = "&rArr;";
//                displayMap($map);
//
//            }elseif($map[$y][$x-1]){
//
//                $direction = "left";
//                $map[$y][$x] = "&lArr;";
//                displayMap($map);
//
//            }else{
//
//                $direction = "down";
//                $map[$y][$x] = "&dArr;";
//                displayMap($map);
//
//            }
//            break;
//        case "right":
//            if(!$map[$y+1][$x+1] && !$map[$y+1][$x] && $map[$y][$x+1]){
//
//                $map[$y][$x] = true;
//                $x++;
//                $map[$y][$x] = "&rArr;";
//                displayMap($map);
//
//            }elseif($map[$y+1][$x+1] && !$map[$y+1][$x] && $map[$y][$x+1]){
//
//                $direction = "down";
//                $map[$y][$x] = true;
//                $x++;
//                $map[$y][$x] = "&dArr;";
//                displayMap($map);
//                $counter++;
//                echo "Шаг $counter";
//                $map[$y][$x] = true;
//                $y++;
//                $map[$y][$x] = "&dArr;";
//                displayMap($map);
//
//            }elseif($map[$y-1][$x]){
//
//                $direction = "up";
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//
//            }else{
//
//                $direction = "left";
//                $map[$y][$x] = "&lArr;";
//                displayMap($map);
//
//            }
//            break;
//        case "down":
//            if(!$map[$y][$x-1] && !$map[$y+1][$x-1] && $map[$y+1][$x]){
//
//                $map[$y][$x] = true;
//                $y++;
//                $map[$y][$x] = "&dArr;";
//                displayMap($map);
//
//            }elseif(!$map[$y][$x-1] && $map[$y+1][$x-1] && $map[$y+1][$x]){
//                $map[$y][$x] = true;
//                $direction = "left";
//                $y++;
//                $map[$y][$x] = "&lArr;";
//                displayMap($map);
//                $counter++;
//                echo "Шаг $counter";
//                $map[$y][$x] = true;
//                $x--;
//                $map[$y][$x] = "&lArr;";
//                displayMap($map);
//
//            }elseif(!$map[$y][$x-1]){
//
//                $direction = "right";
//                $map[$y][$x] = "&rArr;";
//                displayMap($map);
//
//            }else{
//
//                $direction = "up";
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//
//            }
//            break;
//        case "left":
//            if(!$map[$y-1][$x] && !$map[$y-1][$x-1] && $map[$y][$x-1]){
//
//                $map[$y][$x] = true;
//                $x--;
//                $map[$y][$x] = "&lArr;";
//                displayMap($map);
//
//            }elseif(!$map[$y-1][$x] && $map[$y-1][$x-1] && $map[$y][$x-1]){
//
//                $direction = "right";
//                $map[$y][$x] = true;
//                $x--;
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//                $counter++;
//                echo "Шаг $counter";
//                $map[$y][$x] = true;
//                $y--;
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//
//            }elseif($map[$y-1][$x]){
//
//                $direction = "up";
//                $map[$y][$x] = "&uArr;";
//                displayMap($map);
//
//            }else{
//
//                $direction = "down";
//                $map[$y][$x] = "&dArr;";
//                displayMap($map);
//
//            }
//            break;
//    }
//}

function displayMap($map){
    echo "<table cellspacing=\"1\" >";
    for ($i = 0; $i < 20; $i++){
        echo "<tr>";
        foreach ($map[$i] as $value){
            if ($value === "&uArr;" || $value === "&dArr;" || $value === "&rArr;" || $value === "&lArr;"){
                echo "<td id=\"hero\" bgcolor=\"yellow\">". $value . "</td>";
            }elseif ($value)
                echo "<td>&nbsp;</td>";
            else
                echo "<td bgcolor=\"red\">&nbsp;</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабиринт на JS - Артем Боюр</title>
    <script src="labyrinth.js" defer></script>
    <style type="text/css">
        TD {
            padding: 3px; /* Поля вокруг содержимого таблицы */
            border: 1px solid black; /* Параметры рамки */
            width: 20px;
            height: 10px;
            text-align: center;
            transition: 1s;
        }
    </style>
</head>
<body>
    <b>Лабиринт на JS - Артем Боюр</b>
    <div class="map">
        <?php displayMap($map); ?>
    </div>
    <button id="btn" class="btn" value="Шаг">Шаг</button>

</body>
</html>