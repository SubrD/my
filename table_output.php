<script src="js/jquery.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>

<?php

// Выводим данные
function myoutput ($arg1, $arg2, $arg3)
{

echo ("
<!DOCTYPE html>
 
<head>
 
    <title>Вывод данных из MySQL</title>
 

 
</head>
 
<body>
<div class=$arg3>
<h3 align=center>$arg2</h3>
 
<table border=\"1\">
  <td align=\"center\"><b>#</b></td>
  <td align=\"center\"><b>img</b></td>
  <td align=\"center\"><b>Дата</b></td>
  <td align=\"center\"><b>Имя</b></td>
  <td align=\"center\"><b>Сообщение</b></td>
  <td align=\"center\"><b>Координаты</b></td>
 </tr>
");
 
while ($row = mysqli_fetch_array($arg1)) {
    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    printf ("<td><img src='img/%s' width=200px\></td>\n",$row['img']);
    echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['message']."</td>\n";
    printf ("<td><a href=\"javascript:showme('%s')\">Координты</a></td>\n</tr>\n",$row['geo']);
}


echo ("</table></div>\n");

}

?>


<a href="javascript:showme('54.30418764786716,48.384635671874975')">Show popup</a>

<div class="b-popup" id="popup1">

<div class="b-popup-content" id="map" >
    </div>
</div>

<script>



$(document).ready(function(){
    PopUpHide();
});
function PopUpShow(){
    $("#popup1").show();
}
function PopUpHide(){
    $("#popup1").hide();
}



function showme(str_arg) {
var arr = str_arg.split(',');
var tempvar = parseFloat(arr[0]);
var tempvar2 = parseFloat(arr[1]);


      ymaps.ready(function(){
        var myMap = new ymaps.Map("map", {
            center: [tempvar,tempvar2],
            zoom: 10
        });
            var myPlacemark = new  ymaps.Placemark([tempvar, tempvar2]);
            myMap.geoObjects.add(myPlacemark);

            document.onclick = function () {
if(event.target.nodeName !== 'YMAPS'){
        myMap.destroy();
        PopUpHide();
    }


}

      }
)
PopUpShow();

}

</script>

</body>