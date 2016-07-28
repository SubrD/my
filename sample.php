\\примеры кода для разбора php JS
#########################
<body>
    <p>Карта Москвы</p>
    <div id="first_map" style="width:400px; height:300px"></div>
    <p>Карта Санкт-Петербурга</p>
    <p style="width:400px; height:200px"></p>
</body>

<script>
    var moscow_map,
        piter_map;
        
    ymaps.ready(function(){
        moscow_map = new ymaps.Map("first_map", {
            center: [55.76, 37.64],
            zoom: 10
        });
        piter_map = new ymaps.Map(document.getElementsByTagName('p')[2], {
            center: [59.94, 30.32],
            zoom: 9
        });
    });
 #####################




 // Пример определения региона пользователя
// и создания карты, показывающей этот регион
ymaps.geolocation.get().then(function (res) {
        // Предполагается, что на странице подключен jQuery
    var $container = $('YMapsID'),
        bounds = res.geoObjects.get(0).properties.get('boundedBy'),
        mapState = ymaps.util.bounds.getCenterAndZoom(
            bounds,
            [$container.width(), $container.height()]
        ),
        map = new ymaps.Map('YMapsID', mapState);
}, function (e) {
    console.log(e);
});
    

    </script>


    <?php

$_FILES['userfile']['name']
 Имя файла в файловой системе пользователя. После загрузки может меняться при некоторых услових. 
$_FILES['userfile']['type']
 mime/type файла. Например "image/jpeg" (изображение в формате jpeg), "application/x-shockwave-flash" (flash-ролик), "application/msword" (документ MS-WORD). Более полную информацию о mime-типах файлов можно получить, например, в файле mime.types сервера Apache. 
$_FILES['userfile']['size']
 Размер файла в байтах. 
$_FILES['userfile']['tmp_name']
 Путь к файлу во временной директории на диске. 
$_FILES['userfile']['error']
ошибка
 
upload_tmp_dir
 Эта директива в php.ini указывает директорию для временного хранения закачиваемых файлов. Имейте ввиду что она должна быть доступна для пользователя под которым запущен Apache, а также у нее должны быть выставлены права на запись для этого пользователя. 
upload_max_filesize
 Указывает максимальный размер закачиваемого единичного файла, по умолчанию равна "2M" (2 мегабайта). 
post_max_size
 Общий максимальный размер для всех данных поступаемых методом POST. Для одновременной закачки нескольких больших файлов нужно увеличить эту настройку. По умолчанию "8M" (8 мегабайт). 
file_uploads
 И, наконец, переключатель, запрещающий или разрешающий закачку файлов в общем. По умолчанию "On".
 

    ?>