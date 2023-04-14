<!DOCTYPE html>
<html>

<head>
  <title>CreateNews</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">
  
  <link rel="stylesheet" href="css/createnews.css">
  
</head>


<body>

    <?php require "blocks/navbar.php" ?>

    <main class="container">
        <div class="p-4 mb-4 mt-86 rounded-4 background text-white">
            <?php if (isset($_GET["id"]))
            { $post = get_one_news($_GET["id"]); ?>
                <div class="container text-center">
                    <p class="fs-4">Редактирование новости</p>
                </div>

                <form action="php/add_news.php" method="post" enctype="multipart/form-data">
                    <label class="form-label">Заголовок</label>
                    <input type="text" class="form-control" name="title" 
                        value="<?php echo $post["title"] ?>" required>

                    <label class="form-label">Анонс</label>
                    <textarea class="form-control" name="preview" rows="2" 
                        required><?php echo $post["preview"] ?></textarea>

                    <label class="form-label">Текст</label>
                    <textarea class="form-control" name="text" rows="6" 
                        required><?php echo $post["text"] ?></textarea>

                    <label class="form-label" for="formFile">Изображение</label>
                    <input class="form-control" name="image" type="file" id="formFile" required>

                    <label class="form-label">Дата</label>
                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d") ?>" readonly>

                    <br>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="col-2 btn btn-primary">
                            Изменить
                            <input required hidden type="text" name="id" value="<?=$post["id"]?>">
                        </button>
                        <?php if (isset($_SESSION["success_message"])): ?>
                            <div class="col-3 me-2 ms-4">
                                <div >
                                    <?php echo "<div id='success-message'>" . $_SESSION["success_message"] . "</div>"; ?>
                                </div>
                            </div>
                            <?php unset($_SESSION["success_message"]); ?>
                        <?php endif; ?>                        
                    </div>
                </form>
            <?php } 
            else 
            { ?>
                <div class="container text-center">
                    <p class="fs-4">Добавление новости</p>
                </div>

                <form action="php/add_news.php" method="post" enctype="multipart/form-data">               
                    <label class="form-label">Заголовок</label>
                    <input type="text" class="form-control" name="title" required>

                    <label class="form-label">Анонс</label>
                    <textarea class="form-control" name="preview" rows="2" required></textarea>

                    <label class="form-label">Текст</label>
                    <textarea class="form-control" name="text" rows="6" required></textarea>

                    <label class="form-label" for="formFile">Изображение</label>
                    <input class="form-control" name="image" type="file" id="formFile" required>

                    <label class="form-label">Дата</label>
                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d") ?>" readonly>
                    
                    <br>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="col-2 btn btn-primary">
                            Добавить
                        </button>
                        <?php if (isset($_SESSION["success_message"])): ?>
                            <div class="col-3 me-2 ms-4">
                                <div >
                                    <?php echo "<div id='success-message'>" . $_SESSION["success_message"] . "</div>"; ?>
                                </div>
                            </div>
                            <?php unset($_SESSION["success_message"]); ?>
                        <?php endif; ?> 
                    </div>


                </form>   
            <?php } ?>

        </div>
    </main>

    <script>
        setTimeout(function(){
            document.getElementById("success-message").style.display = "none";
        }, 10000);
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>