
<?php require_once("php/functions.php");
require_once("php/init.php"); ?>
<div class="container-fluid fixed-top bg-purple">
  <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
    <a href="index.php" class="navbar-brand">
      <img src="img/pngwing.com.png" alt="Logo" width="90" height="48" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="index.php" class="nav-link px-2">CSGONews</a>
        </li>
        <li class="nav-item">
          <a href="AboutUs.php" class="nav-link px-2">О нас</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php if (isset($_SESSION['email'])): ?>
        <div class="text-end me-3">
          <?php if ($_SESSION['email'] == "admin@mail.ru"): ?>
          <a href="CreateNews.php" type="button" class="btn btn-outline-light">Добавить новость</a>
          <?php endif; ?>
        </div>
        <div class="text-end">
          <a href="php/logout.php" type="button" class="btn btn-outline-light">Выйти из аккаунта: <?php echo get_nickname($_SESSION['email']); ?></a>
        </div>
        <?php else: ?>
        <div class="text-end">
          <a href="Login.php" type="button" class="btn btn-outline-light me-2">Войти</a>
          <a href="Signin.php" type="button" class="btn btn-outline-light">Зарегистрироваться</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</div>