<!DOCTYPE html>
<html>

<head>
  <title>CSGONews</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styles.css">

  
</head>


<body>

  <?php require "blocks/navbar.php" ?>

  <main class="container">
    <div class="p-4 mb-4 mt-86 rounded-4 background ">
      <h1 class="text-white text-center">Добро пожаловать на новостной портал CSGO</h1>
    </div>

    <?php require "blocks/news_block.php" ?>
    

    
  </main>
  
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>