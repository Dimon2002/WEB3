<?php

   // Если передан ID
   if (isset($_GET) && isset($_GET["id"])) {
      if ($post = get_one_news($_GET["id"])) {
?>

<!-- Отображение новости -->
<div class="container">

      <div id="post">
         <div class="p-4 mb-4 mt-86 rounded-4 background text-white"> <!-- Post -->
            <h1 class="text-center"><?=$post["title"]?></h1>
         </div>
         
         <div class="mb-4 text-white d-flex justify-content-center">
            <img class="img-fluid rounded-4 "  src="php/<?=$post["image_path"]?>" alt="Картиночка.">
         </div>

         <div class="mb-4 p-4 rounded-4 background text-white">
            <p><?=$post["text"]?></p>

            <h5 class=date><?=$post["date"]?></h5>
         
      <?php
         if (isset($_SESSION))
            if (isset($_SESSION['email']))
               if ($_SESSION['email'] == "admin@mail.ru") {
      ?>
            <!-- Редактировать новость -->
            <div>
               <form action="CreateNews.php" method="GET" style="display: inline-block; float: left; margin-right: 10px;">
                  <input required hidden type="text" name="id" value="<?=$post["id"]?>">
                  <button type="submit" class="btn btn-primary">Редактировать</button>
               </form>
               <form action="php/delete_news.php" method="GET" style="display: inline-block; ">
                  <input required hidden type="text" name="id" value="<?=$post["id"]?>">
                  <button type="submit" class="btn btn-danger">Удалить</button>
               </form>
            </div>
         </div>
      </div>
   </div>
             
      <?php
         }
            } else { ?>

      <!-- Отображение ошибки 1 -->
      <div id="error">
         <h1>Такой новости нет :(</h1>
      </div>

      <?php } } else { ?>

      <!-- Отображение ошибки 2 -->
      <div id="error">
         <h1>Не указан номер новости :(</h1>
      </div>

      <?php } ?>
   
</div>

