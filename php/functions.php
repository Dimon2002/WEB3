<?php
    require_once("init.php");
    function add_user($email, $nickname, $password)
    {
        global $mysqli;
        if ($stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `email` = ?")) {
            // Связываем параметры
            $stmt->bind_param("s", $email);
            // Выполняем запрос
            $stmt->execute();
            // Связываем результаты

            if ($user = $stmt->get_result())
                if ($user = $user->fetch_assoc())
                {
                    if ($email == $user["email"])
                        return 0;
                }
        }

        // Формируем запрос
        $password = md5($password."NegriPodori");
        if ($stmt = $mysqli->prepare("INSERT INTO `users` 
        (`email`, `nickname`, `password`) VALUES(?, ?, ?)")) {
            // Связываем параметры
            $stmt->bind_param("sss", $email, $nickname, $password);

            // Выполняем запрос
            if (!$stmt->execute()) {
                return 0;
            }
            return 1;
        }
        return 0;
    }

    function get_user($email, $password)
    {
        global $mysqli;

        $password = md5($password."NegriPodori");
        // Формируем запрос
        if ($stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `email` = ?")) {
            // Связываем параметры
            $stmt->bind_param("s", $email);
            // Выполняем запрос
            $stmt->execute();
            // Связываем результаты

            if ($user = $stmt->get_result())
                if ($user = $user->fetch_assoc())
                {
                    //TODO заменить на password_verify
                    if ($password == $user["password"])
                    {
                        return $user;
                    }
                        
                }
            // Возвращаем результат
            return 0;
        }
        return 0;
    }

    function get_nickname($email) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT `nickname` FROM `users` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return false;
        } else {
            $row = $result->fetch_assoc();
            return $row['nickname'];
        }
    }

    function add_news($title, $preview, $text, $upload_path, $date)
    {
        global $mysqli;
        
        // Формируем запрос
        if ($stmt = $mysqli->prepare("INSERT INTO news(title, preview, text, image_path, date) VALUES (?, ?, ?, ?, ?)")) {
            // Связываем параметры
            $stmt->bind_param("sssss", $title, $preview, $text, $upload_path,  $date);
            
            // Выполняем запрос
            if(!$stmt->execute()) {
                return 0;
            }
            return 1;
        }
        return 0;
    }
 
    function edit_news($id, $title, $preview, $text, $upload_path, $date)
    {
       global $mysqli;
 
       // Формируем запрос
       if ($stmt = $mysqli->prepare("UPDATE news SET title=?, preview=?, text=?, image_path=?, date=? WHERE id=?")) {
          // Связываем параметры
          $stmt->bind_param("sssssi", $title, $preview, $text, $upload_path, $date, $id);
 
          // Выполняем запрос
          if(!$stmt->execute())
             return 0; 
          return 1;
       }
       return 0;
    }

    function get_all_news()
    {
       global $mysqli;
       return $mysqli->query("SELECT * FROM news");
    }
 
    function get_one_news($id)
    {
       global $mysqli;
 
       // Формируем запрос
       if ($stmt = $mysqli->prepare("SELECT * FROM news WHERE id = ?")) {
          // Связываем параметры
          $stmt->bind_param("i", $id);
 
          // Выполняем запрос
          $stmt->execute();
 
          // Возвращаем результат
          return $stmt->get_result()->fetch_assoc();
       }
 
       return 0;
    }

    function delete_news($id)
    {
        global $mysqli;
        if ($stmt = $mysqli->prepare(("DELETE FROM news WHERE id = ?"))) {
            // Связываем параметры
            $stmt->bind_param("i", $id);
   
            // Выполняем запрос
            $stmt->execute();
   
            // Возвращаем результат
            return 1;
        }
        return 0;
    }


?>
