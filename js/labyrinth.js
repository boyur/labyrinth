var elem = document.getElementById('btn');
var map_y = document.querySelectorAll('tr');
//var counter = 0;
var direction = "up";
var x = 4;
var y = 19;

var map = [];
for (var i = 0; i < 20; i++)
    map[i] = map_y[i].querySelectorAll('td');

var map_bin = [[0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0],
    [0, 0, 1, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0],
    [0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0],
    [0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0],
    [0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0],
    [0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0],
    [0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0],
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0],
    [0, 0, 1, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0],
    [0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0],
    [0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0],
    [0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0],
    [0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0],
    [0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0],
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]];

console.log(elem);
console.log(map_y);
console.log(map);
console.log(map_bin);

/////////////////////////////////////////////
var speed = 100; // Скорость
map_bin[y][x] = "&uArr;";

elem.addEventListener('click', animation);

function animation() {
    var id = setInterval(frame, speed);
    function frame() {
    if (map_bin[0][4] == "&uArr;") { // Когда дойдем до выхода
      clearInterval(id); // Остоновка
    } else {
      search(); // Вполняем функцию
    }
  }
}

function search() {

    //////////////////////////
    switch (direction) {
        case "up":

            console.log("Вверх");

             console.log(map_bin[y][x]);
             console.log(!map_bin[y][x + 1]);
             console.log(!map_bin[y - 1][x + 1]);
             console.log(map_bin[y - 1][x]);

            if (!map_bin[y][x + 1] && !map_bin[y - 1][x + 1] && map_bin[y - 1][x]) {


                map_bin[y][x] = 1;

                y--;
                map_bin[y][x] = "&uArr;";

                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&uArr;";

                map[y + 1][x].style.backgroundColor = 'white';
                map[y + 1][x].innerHTML = " ";

            } else if (map_bin[y - 1][x + 1] && !map_bin[y][x + 1]) {

                direction = "right";
                map_bin[y][x] = 1;
                y--;
                map_bin[y][x] = "&rArr;";

                map_bin[y][x] = 1;
                x++;
                map_bin[y][x] = "&rArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&rArr;";

                map[y + 1][x - 1].style.backgroundColor = 'white';
                map[y + 1][x - 1].innerHTML = " ";
                

            } else if (map_bin[y][x + 1]) {

                direction = "right";
                map_bin[y][x] = "&rArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&rArr;";
                

            } else if (map_bin[y][x - 1]) {

                direction = "left";
                map_bin[y][x] = "&lArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&lArr;";
                

            } else {

                direction = "down";
                map_bin[y][x] = "&dArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&dArr;";
                
            }
            break;

        case "right":

            console.log("На право");
            console.log(map_bin[y + 1][x + 1]);
            console.log(map_bin[y + 1][x]);
            console.log(map_bin[y][x + 1]);
            if (!map_bin[y + 1][x + 1] && map_bin[y][x + 1]) {

                map_bin[y][x] = 1;
                x++;
                map_bin[y][x] = "&rArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&rArr;";

                map[y][x - 1].style.backgroundColor = 'white';
                map[y][x - 1].innerHTML = " ";
               

            }
            else if (map_bin[y + 1][x + 1] && !map_bin[y + 1][x] && map_bin[y][x + 1]) {

                direction = "down";
                map_bin[y][x] = 1;
                x++;
                map_bin[y][x] = "&dArr;";

                map_bin[y][x] = 1;
                y++;
                map_bin[y][x] = "&dArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&dArr;";

                map[y - 1][x - 1].style.backgroundColor = 'white';
                map[y - 1][x - 1].innerHTML = " ";
                

            }
            else if (map_bin[y - 1][x]) {

                direction = "up";
                map_bin[y][x] = "&uArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&uArr;";
                

            }
            else {

                direction = "left";
                map_bin[y][x] = "&lArr;";

                
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&lArr;";
                
            }
            break;
        case "down":
            console.log("Вниз");
           if(!map_bin[y][x-1] && !map_bin[y+1][x-1] && map_bin[y+1][x]){

               map_bin[y][x] = 1;
               y++;
               map_bin[y][x] = "&dArr;";

               
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&dArr;";

                map[y - 1][x].style.backgroundColor = 'white';
                map[y - 1][x].innerHTML = " ";
               

           }else if(map_bin[y+1][x-1] && map_bin[y+1][x]){
               map_bin[y][x] = 1;
               direction = "left";
               y++;
               map_bin[y][x] = "&lArr;";

               map_bin[y][x] = 1;
               x--;
               map_bin[y][x] = "&lArr;";

               
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&lArr;";

                map[y - 1][x+1].style.backgroundColor = 'white';
                map[y - 1][x+1].innerHTML = " ";
               

           }else if(!map_bin[y][x-1]){

               direction = "right";
               map_bin[y][x] = "&rArr;";

               
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&rArr;";
               

           }else{

               direction = "up";
               map_bin[y][x] = "&uArr;";

               
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&uArr;";
               

           }
           break;
        case "left":
           if(!map_bin[y-1][x] && !map_bin[y-1][x-1] && map_bin[y][x-1]){

               map_bin[y][x] = true;
               x--;
               map_bin[y][x] = "&lArr;";
               
               map[y][x].style.backgroundColor = 'yellow';
               map[y][x].innerHTML = "&lArr;";

               map[y][x+1].style.backgroundColor = 'white';
               map[y][x+1].innerHTML = " ";

           }else if(!map_bin[y-1][x] && map_bin[y-1][x-1] && map_bin[y][x-1]){

               direction = "right";
               map_bin[y][x] = true;
               x--;
               map_bin[y][x] = "&uArr;";
               //displayMap($map);
               //counter++;
               //echo "Шаг $counter";
               map_bin[y][x] = true;
               y--;
               map_bin[y][x] = "&uArr;";

               map[y][x].style.backgroundColor = 'yellow';
               map[y][x].innerHTML = "&uArr;";

               map[y + 1][x+1].style.backgroundColor = 'white';
               map[y + 1][x+1].innerHTML = " ";

           }else if(map_bin[y-1][x]){

               direction = "up";
               map_bin[y][x] = "&uArr;";

               
                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&uArr;";


           }else{

               direction = "down";
               map_bin[y][x] = "&dArr;";


                map[y][x].style.backgroundColor = 'yellow';
                map[y][x].innerHTML = "&dArr;";


           }
           break;
    }
    /////////////////////////////////////
}
