<?php
    require_once("functions.php");

 
   if (isset($_GET)) {
        if (isset($_GET["id"]))
        {
            $post = get_one_news($_GET["id"]);
            if (file_exists($post["image_path"])) {
                unlink($post["image_path"]);
                echo 'Файл удален успешно.';
            } else {
                echo 'Файл не найден.';
            }

            if (delete_news($_GET["id"]))
            {
                header('Location: ../index.php');
            }
            else{
                echo "Новость не удалена";
            }
        }
    }

?>