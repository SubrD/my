<!DOCTYPE html>
<html>
<head>
<title>jfhfhf</title>
<script src="js/jquery.min.js"></script>

</head>

<body>

<div id="popup1">
	<p id='id1'>deedde</p>
</div>

</script>
<script type="text/javascript">
document.onclick = function () {
document.getElementById('id1').innerHTML = event.target.nodeName;
if( ev.target.nodeName === 'popup1' ){
        myMap.destroy();
        PopUpHide();
    }
}
</script>
</body>

</html>