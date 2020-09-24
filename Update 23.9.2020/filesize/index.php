<?php
    function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}

  $folder_name = "videos";
  echo folderSize($folder_name);

?>