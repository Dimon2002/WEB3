<?php
    require_once("functions.php");

 
   if (isset($_POST)) {
        if (isset($_POST["id"]))
        {
            if(isset($_FILES['image'])) {

                // Получаем информацию о загруженном файле
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
              
                // Проверяем, является ли загруженный файл изображением
                $valid_image_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if(!in_array($file_ext, $valid_image_types)) {
                  echo "Ошибка: Файл не является изображением.";
                  exit;
                }
              
                $upload_path = "images/" . $file_name;                
                move_uploaded_file($file_tmp, $upload_path);

                if (edit_news($_POST["id"], $_POST["title"], $_POST["preview"], 
                    $_POST["text"], $upload_path, $_POST["date"]))
                {
                    $_SESSION["success_message"] = "Новость успешно обновлена";
                    header('Location: ../CreateNews.php');
                }
                else
                    echo "Новость не обновлена";
                return;
            }
            else{
                echo "Изображение не отправлено";
            }
                
            
        }
        else
        {  
            if(isset($_FILES['image'])) {

                // Получаем информацию о загруженном файле
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
              
                // Проверяем, является ли загруженный файл изображением
                $valid_image_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if(!in_array($file_ext, $valid_image_types)) {
                  echo "Ошибка: Файл не является изображением.";
                  exit;
                }
              
                $upload_path = "images/" . $file_name;
                $counter = 1;
                
                while (file_exists($upload_path)) {
                    $info = pathinfo($upload_path);
                    $ext = $info['extension'];
                    $basename = $info['filename'];
                
                    // проверяем, есть ли уже число в скобках в имени файла
                    preg_match('/\((\d+)\)$/', $basename, $matches);
                
                    if (count($matches) > 0) {
                        // если число в скобках уже есть в имени файла
                        $number = intval($matches[1]);
                        $basename = str_replace($matches[0], '', $basename);
                        $filename = $basename . '(' . $counter . ').' . $ext;
                    } else {
                        // если числа в скобках в имени файла еще нет
                        if ($counter > 1) {
                            $filename = $basename . '(' . ($counter-1) . ').' . $ext;
                        } else {
                            $filename = $basename . '.' . $ext;
                        }
                        $filename = $basename . '(' . $counter . ').' . $ext;
                    }
                
                    $upload_path = "images/" . $filename;
                    $counter++;
                }
                
                move_uploaded_file($file_tmp, $upload_path);
                
                if (add_news($_POST["title"], $_POST["preview"], $_POST["text"], $upload_path, $_POST["date"])){
                    $_SESSION["success_message"] = "Новость успешно добавлена";
                    header('Location: ../CreateNews.php');
                } 
                else
                    echo "Новость не добавленаS";
        
                return;

            }

        }


    }

?>