<?php

function upload2 ($arg)

{

$filename = $arg['filename']['tmp_name'];
$size = $arg["filename"]["size"];

$max_image_width  = 1800;
$max_image_height = 1800;
$max_image_size   = 1024*4*1024;

   if($size > $max_image_size)
   {
     echo ("Error: File size > 4mb");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($filename))
   {
     //$pxsize = GetImageSize($filename);
     // if (($pxsize) && ($pxsize[0] < $max_image_width) && ($pxsize[1] < $max_image_height))
     // {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную, где?

     if (@move_uploaded_file($filename, "../my/img/".$arg["filename"]["name"])) {
          
         $finalfile = $arg["filename"]["name"];

        } 
     else 
           {
           			echo 'Error: moving fie failed.';
          			exit();
           }
     //}
     //else {echo 'Максимальный размер картинки 380x600'; exit();}
                                                                       } 

     else {
       echo("Uploading error");
      exit();
   }
return $finalfile;
}

   ?>