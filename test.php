<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>
<head>
<title>jfhfhf</title>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>
<script src="js/jquery.min.js"></script>

</head>

<body>


<a href="javascript:PopUpShow()">Show popup</a>

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

document.getElementById("popup1").onclick = function () {
PopUpHide();
}

</script>
<script type="text/javascript">
	
var moscow_map;

      ymaps.ready(function(){
        moscow_map = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 10
        });}
)
</script>
</body>

</html>