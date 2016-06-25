 <style type="text/css">
   TD {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid black; /* Параметры рамки */
    width: 20px; 
    height: 10px;
   }
  </style>
<?php
$map1 = [[false,false,false,false,true,false,false,false,false,false],
        [false,false,true,true,true,false,true,false,false,false],
        [false,false,true,false,false,true,true,false,true,false],
        [false,true,true,true,true,true,false,false,true,false],
        [false,false,false,false,true,false,true,true,true,false],
        [false,true,false,true,true,false,true,false,false,false],
        [false,true,true,true,false,false,true,true,true,false],
        [false,true,false,false,false,false,true,false,true,false],
        [false,true,true,true,true,true,true,false,true,false],
        [false,false,false,false,true,false,false,false,false,false]];

$map2 = [[0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
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

$map = &$map2;
$x = 4;
$y = 19;
$map[$y][$x] = "&uArr;";
$direction = "up";
$counter = 0;
$time = microtime();

echo "<b>Лабиринт - Артем Боюр</b><br>";

displayMap($map);

while ($map[0][4] !== "&uArr;"){
    $counter++;
    echo "Шаг $counter";
    
    switch ($direction){
        case "up":
            if(!$map[$y][$x+1] && !$map[$y-1][$x+1] && $map[$y-1][$x]){
                
                $map[$y][$x] = true;
                $y--;
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                
            }elseif($map[$y-1][$x+1] && !$map[$y][$x+1]){
                
                $direction = "right";
                $map[$y][$x] = true;
                $y--;
                $map[$y][$x] = "&rArr;";
                displayMap($map);
                $counter++;
                echo "Шаг $counter";
                $map[$y][$x] = true;
                $x++;
                $map[$y][$x] = "&rArr;";
                displayMap($map);
                
            }elseif($map[$y][$x+1]){
                
                $direction = "right";
                $map[$y][$x] = "&rArr;";
                displayMap($map);
                
            }elseif($map[$y][$x-1]){
                
                $direction = "left";
                $map[$y][$x] = "&lArr;";
                displayMap($map);
                
            }else{
                
                $direction = "down";
                $map[$y][$x] = "&dArr;";
                displayMap($map);
                
            }
            break;
        case "right":
            if(!$map[$y+1][$x+1] && !$map[$y+1][$x] && $map[$y][$x+1]){
                
                $map[$y][$x] = true;
                $x++;
                $map[$y][$x] = "&rArr;";
                displayMap($map);
                
            }elseif($map[$y+1][$x+1] && !$map[$y+1][$x] && $map[$y][$x+1]){
                
                $direction = "down";
                $map[$y][$x] = true;
                $x++;
                $map[$y][$x] = "&dArr;";
                displayMap($map);
                $counter++;
                echo "Шаг $counter";
                $map[$y][$x] = true;
                $y++;
                $map[$y][$x] = "&dArr;";
                displayMap($map);
                
            }elseif($map[$y-1][$x]){
                
                $direction = "up";
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                
            }else{
                
                $direction = "left";
                $map[$y][$x] = "&lArr;";
                displayMap($map);
                
            }
            break;
        case "down":
            if(!$map[$y][$x-1] && !$map[$y+1][$x-1] && $map[$y+1][$x]){
                
                $map[$y][$x] = true;
                $y++;
                $map[$y][$x] = "&dArr;";
                displayMap($map);
                
            }elseif(!$map[$y][$x-1] && $map[$y+1][$x-1] && $map[$y+1][$x]){
                $map[$y][$x] = true;
                $direction = "left";
                $y++;
                $map[$y][$x] = "&lArr;";
                displayMap($map);
                $counter++;
                echo "Шаг $counter";
                $map[$y][$x] = true;
                $x--;
                $map[$y][$x] = "&lArr;";
                displayMap($map);
                
            }elseif(!$map[$y][$x-1]){
                
                $direction = "right";
                $map[$y][$x] = "&rArr;";
                displayMap($map);
                
            }else{
                
                $direction = "up";
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                
            }
            break;
        case "left":
            if(!$map[$y-1][$x] && !$map[$y-1][$x-1] && $map[$y][$x-1]){
                
                $map[$y][$x] = true;
                $x--;
                $map[$y][$x] = "&lArr;";
                displayMap($map);
                
            }elseif(!$map[$y-1][$x] && $map[$y-1][$x-1] && $map[$y][$x-1]){
                
                $direction = "right";
                $map[$y][$x] = true;
                $x--;
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                $counter++;
                echo "Шаг $counter";
                $map[$y][$x] = true;
                $y--;
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                
            }elseif($map[$y-1][$x]){
                
                $direction = "up";
                $map[$y][$x] = "&uArr;";
                displayMap($map);
                
            }else{
                
                $direction = "down";
                $map[$y][$x] = "&dArr;";
                displayMap($map);
                
            }
            break;
    }
}
$time = microtime() - $time;
echo "<br> Ура!! Я нашел выход!<br>Кол-во шагов: $counter <br>";
echo "Время выполнения скрипта $time секунд";


function displayMapOld($map){
    echo "<pre>";
    for ($i = 0; $i < 10; $i++){
        foreach ($map[$i] as $value){
            if ($value === "&uArr;" || $value === "&dArr;" || $value === "&rArr;" || $value === "&lArr;"){
                echo $value . " ";
            }elseif ($value)
                echo " " . " ";
            else
                echo "X" . "|";
        }
        echo "<br>";
    }
    echo "</pre>";
}

background: #b0e0e6;

function displayMap($map){
    echo "<table cellspacing=\"1\" >";
    for ($i = 0; $i < 20; $i++){
        echo "<tr>";
        foreach ($map[$i] as $value){
            if ($value === "&uArr;" || $value === "&dArr;" || $value === "&rArr;" || $value === "&lArr;"){
                echo "<td align=\"center\" bgcolor=\"yellow\">". $value . "</td>";
            }elseif ($value)
                echo "<td>&nbsp;</td>";
            else
                echo "<td bgcolor=\"red\">&nbsp;</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}